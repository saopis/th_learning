<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}
	public function login()
	{
		$isLogin=$this->session->userdata('ses_user');
		if (isset($isLogin['u_name'])) {
			redirect(base_url('auth/welcome'),'refresh');
		}
		if ($this->input->post('action')=='login') {
			$data=$this->input->post();
			unset($data['action']);
			$userdata=$this->db->where($data)->get('user')->result_array();
			if (count($userdata)<1) {
				$this->session->set_flashdata('msg', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
				redirect(base_url('home/login'),'refresh');
			}else {
				$ses['ses_user']=$userdata[0];
				$this->session->set_userdata($ses);
				redirect(base_url('auth/profile'),'refresh');
			}
		}elseif ($this->input->post('action')=='register') {
			$data=$this->input->post();
			unset($data['action']);
			if ($this->db->insert('user', $data)) {
				$this->session->set_flashdata('msg', 'สมัครเรียบร้อยแล้ว!! กรุณาลองล็อกอินเข้าสู่ระบบ');
				redirect(base_url('home/login'),'refresh');
			}
		}else{
			$senddata['msg']=$this->session->userdata('msg');
			$this->load->view('login',$senddata);
		}
	}
	public function contact()
	{
		$this->load->view('contact');
	}
}
