<?php $this->load->view('header'); ?>
<style>
	.sort{
		font-size: 80px;
		font-weight: bold;
	}
	.a{
		color: black;
	}
</style>
<section class="bg-grey">
	<div class="container note border-primary">
		<h1 class="w-100 text-center p-2">อันดับคะแนน</h1>
		<h3 class="w-100 text-center p-2"><?php echo $ch['ch_subject']; ?></h3>
		
		<div>

			<div class="row">
				<div class="col-md-6 text-center">
					<?php for($i=0;$i<10;$i++) {
						$index=$i+1;
						$get=(isset($before[$i]['s_get']))? $before[$i]['s_get']:'-';
						$full=(isset($before[$i]['s_full']))? $before[$i]['s_full']:'-';
						$name=(isset($before[$i]['f_name']))? $before[$i]['f_name'].' '.$before[$i]['l_name']:'-';
						?>
						<div class="row m-2">
							<div class="col-md-6 bg-warning text-center p-2">
								<?php 
								if ($index==1) {
									echo '<span class="sort"><img class="w-75" src="'.base_url('assets/img/'.$index.'.png').'" alt=""></span>'; 
								}elseif ($index==2) {
									echo '<span class="sort"><img class="w-75" src="'.base_url('assets/img/'.$index.'.png').'" alt=""></span>'; 
								}elseif ($index==3) {
									echo '<span class="sort"><img class="w-75" src="'.base_url('assets/img/'.$index.'.png').'" alt=""></span>'; 
								}else{
									echo '<span class="sort">'.$index.'</span>'; 
								}
								?>
							</div>
							<div class="col-md-6 border-primary p-2" style="border: 1px solid;">
								<?php 

								if ($user['u_status']==1&&$name!='-') {
									echo '<a class="a" href="'.base_url('auth/profile/'.$before[$i]['u_id']).'"><h5 class="w-100 text-center">'.$name.'</h5></a>';
								}else{
									echo '<h5 class="w-100 text-center">'.$name.'</h5>';
								}
								?>
								
								<p><h1><?php echo $get.'/'.$full; ?></h1>ก่อนเรียน</p>
							</div>
						</div>
						<hr>
					<?php } ?>	
				</div>
				<div class="col-md-6 text-center ">
					<?php for($i=0;$i<10;$i++) {
						$index=$i+1;
						$get=(isset($after[$i]['s_get']))? $after[$i]['s_get']:'-';
						$full=(isset($after[$i]['s_full']))? $after[$i]['s_full']:'-';
						$name=(isset($after[$i]['f_name']))? $before[$i]['f_name'].' '.$before[$i]['l_name']:'-';
						?>
						<div class="row m-2">
							<div class="col-md-6 bg-warning text-center p-2">
								<?php 
								if ($index==1) {
									echo '<span class="sort"><img class="w-75" src="'.base_url('assets/img/'.$index.'.png').'" alt=""></span>'; 
								}elseif ($index==2) {
									echo '<span class="sort"><img class="w-75" src="'.base_url('assets/img/'.$index.'.png').'" alt=""></span>'; 
								}elseif ($index==3) {
									echo '<span class="sort"><img class="w-75" src="'.base_url('assets/img/'.$index.'.png').'" alt=""></span>'; 
								}else{
									echo '<span class="sort">'.$index.'</span>'; 
								}
								?>
							</div>
							<div class="col-md-6 border-primary p-2" style="border: 1px solid;">
								<?php 

								if ($user['u_status']==1&&$name!='-') {
									echo '<a class="a" href="'.base_url('auth/profile/'.$after[$i]['u_id']).'"><h5 class="w-100 text-center">'.$name.'</h5></a>';
								}else{
									echo '<h5 class="w-100 text-center">'.$name.'</h5>';
								}
								?>
								
								<p><h1><?php echo $get.'/'.$full; ?></h1>หลังเรียน</p>
							</div>
						</div>
						<hr>
					<?php } ?>	
				</div>

			</div>

		</div>

	</div>
</section>
<?php $this->load->view('footer'); ?>
