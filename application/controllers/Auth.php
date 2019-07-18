<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	private $ses;
	public function __construct()
	{
		parent::__construct();
		$this->ses=$this->session->userdata('ses_user');
		if (!isset($this->ses['u_name'])) {
			redirect(base_url('home/login'),'refresh');
		}
		
	}

	public function welcome()
	{
		$data=$this->ses;
		$this->load->view('welcome',$data);
	}
	public function logout()
	{
		$this->session->unset_userdata('ses_user');
		redirect(base_url(),'refresh');
	}
	public function learn($ch_id)
	{
		$where=['u_id'=>$this->ses['u_id'],
				'ch_id'=>$ch_id,
				's_type'=>'b'
				];
		$before_exam=$this->db->where($where)->get('score')->result_array();
		// print_r($before_exam);
		if (count($before_exam)>0) {
			$data['ch']=$this->db->where('ch_id',$ch_id)->get('chapter')->result_array();
			$data['ch']=$data['ch'][0];
			$data['content']=$this->db->where('ch_id',$ch_id)->get('content')->result_array();
			
			$this->load->view('learn', $data);	
		}else {
			echo '<script>alert("ท่านยังไม่ได้ทำการสอบก่อนเรียนบทนี้ กรุณาทำข้อสอบก่อน");</script>';
			redirect(base_url('auth/exam/'.$ch_id),'refresh');
		}
	}
	public function score($ch_id)
	{
		$before=$this->db
						->where(['score.ch_id'=>$ch_id,'score.s_type'=>'b'])
						->group_by('score.u_id')
						// ->order_by('score.s_get','DESC')
						->order_by('score.s_id','DESC')
						->from('score')
						->join('user','user.u_id = score.u_id','LEFT')
						->get()
						->result_array();
		$after=$this->db
						->where(['score.ch_id'=>$ch_id,'score.s_type'=>'a'])
						->group_by('score.u_id')
						// ->order_by('score.s_get','DESC')
						->order_by('score.s_id','DESC')
						->from('score')
						->join('user','user.u_id = score.u_id','LEFT')
						->get()
						->result_array();
		$ch=$this->db->where('ch_id',$ch_id)->get('chapter')->result_array();
		$data['before']=$before;
		$data['after']=$after;
		$data['ch']=$ch[0];
		$data['user']=$this->ses;
		$this->load->view('score', $data);
	}
	public function profile($u_id='')
	{
		$data=$this->ses;
		if ($u_id!='') {
			if ($data['u_status']!=1) {
				echo '<script>alert("คุณไม่มีสิทธิเข้าถึงข้อมูลนี้");window.history.back();</script>';
				
			}
			$data=$this->db->where('u_id',$u_id)->get('user')->result_array();
			$data=$data[0];
		}
		$ch=$this->db->get('chapter')->result_array();
		$score=[];
		foreach ($ch as $value) {

			$b_where=[
						'u_id'=>$data['u_id'],
						'ch_id'=>$value['ch_id'],
						's_type'=>'b'
					];
			$a_where=[
						'u_id'=>$data['u_id'],
						'ch_id'=>$value['ch_id'],
						's_type'=>'a'
					];
			$b_score=$this->db->where($b_where)->order_by('s_id')->get('score',1)->result_array();
			$a_score=$this->db->where($a_where)->order_by('s_id')->get('score',1)->result_array();
			if (count($b_score)<1) {
				$score[]=[
							'ch'=>$value,
							'b_score'=>['s_full'=>'-','s_get'=>'-'],
							'a_score'=>['s_full'=>'-','s_get'=>'-'],
						];
						
			}elseif (count($a_score)<1) {
				$score[]=[
							'ch'=>$value,
							'b_score'=>$b_score[0],
							'a_score'=>['s_full'=>'-','s_get'=>'-'],
						];
			}else {
				$score[]=[
							'ch'=>$value,
							'b_score'=>$b_score[0],
							'a_score'=>$a_score[0],
						];
			}
			
		}
		$data['score']=$score;
		$this->load->view('profile', $data);
	}
	public function exam($ch_id)
	{
		$q=$this->db->where('ch_id',$ch_id)->order_by('q_id','RANDOM')->get('question')->result_array();
		foreach ($q as $key=> $value) {
			$q[$key]['answer']=$this->db->where('q_id',$value['q_id'])->order_by('a_id','RANDOM')->get('answer')->result_array();
		}
		$ch=$this->db->where('ch_id',$ch_id)->get('chapter')->result_array();
		$data['q']=$q;
		$data['ch']=$ch[0];

		$where=['u_id'=>$this->ses['u_id'],
				'ch_id'=>$ch_id,
				's_type'=>'b'
				];
		$before_exam=$this->db->where($where)->get('score')->result_array();
		// print_r($before_exam);
		if (count($before_exam)>0) {
			$data['q_type']='หลังเรียน';
		}else {
			$data['q_type']='ก่อนเรียน';
		}
		$this->load->view('exam', $data);
	}
	public function check_exam()
	{
		$answer=$this->input->post('answer');
		$ch_id=$this->input->post('ch');
		$q=$this->db->select('q_id')->where('ch_id',$ch_id)->get('question')->result_array();
		$t=[];
		$get=0;
		foreach (@$answer as $value) {
			$where=[
				'a_id'=>$value,
				'a_status'=>'t'
				];
			$check=$this->db->where($where)->get('answer')->result_array();
			if (count($check)>0) {
				$get++;
			}
		}
		foreach ($q as $value) {
			$where=[
				'q_id'=>$value['q_id'],
				'a_status'=>'t'
				];
			$data=$this->db->select('a_id')->where($where)->get('answer')->result_array();
			$t[]=$data[0]['a_id'];
		}
		$where1=['u_id'=>$this->ses['u_id'],
				'ch_id'=>$ch_id,
				's_type'=>'b'
				];
		@$before_exam=$this->db->where($where1)->get('score')->result_array();
		// print_r($before_exam);
		$s_type='';
		if (count($before_exam)>0) {
			$s_type='a';
		}else {
			$s_type='b';
		}
		$object=[
					'u_id'=>$this->ses['u_id'],
					's_full'=>count($answer),
					's_get'=>$get,
					's_type'=>$s_type,
					'ch_id'=>$ch_id
				];
		if (!$this->db->insert('score', $object)) {
			die('can not save score');
		}
		$data['full']=count($answer);
		$data['get']=$get;
		$data['true']=$t;
		print_r(json_encode($data));
	}
}
