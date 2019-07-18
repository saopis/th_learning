<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>th_learning</title>
	<link rel="stylesheet" href="">
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/fonts.googleapis.Material+Icons.css'); ?>" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
	<!-- bootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url('node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
	<!-- main -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
	<!-- jquery -->
	<script src="<?php echo base_url('node_modules/jquery/dist/jquery.min.js'); ?>"></script>
	<!-- popper -->
	<script src="<?php echo base_url('node_modules/popper.js/dist/umd/popper.min.js'); ?>"></script>
	<!-- bootstrap 4 -->
	<script src="<?php echo base_url('node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url(); ?>/plugins/pace.min.js"></script>
	<style>	
		

	</style>
</head>
<?php $ch=$this->db->get('chapter')->result_array(); ?>
<body class="yellow">

	<section class="top-part">
		<div class="paralex">
			<video controls autoplay loop >
				<source src="<?php echo base_url('assets'); ?>/videos/video.mp4" type="video/mp4">
					<source src="<?php echo base_url('assets'); ?>/videos/video.ogg" type="video/ogg">
						Your browser does not support the video tag.
					</video>
					<div class="overlay">
						<div class="middle">	
							<div class="menubar">
								<a href="<?php echo base_url('auth/profile'); ?>">	
									<div>							
										<i class="bg-primary icon fa fa-user"></i>
										<p  class="color-primary">โปรไฟล์</p>
									</div>
								</a>
								<a>	
									<div class="submenu">							
										<i class="bg-primary icon fa fa-book"></i>
										<p>บทเรียน</p>
										<ul class="bg-primary">
											<?php foreach ($ch as $value) {
												echo '<a href="'.base_url('auth/learn/'.$value['ch_id']).'"><li>'.$value['ch_subject'].'</li></a>';
											} ?>
										</ul>
									</div>
								</a>
								<a >	
									<div class="submenu">							
										<i class="bg-primary icon fa fa-puzzle-piece"></i>
										<p>ทำข้อสอบ</p>
										<ul class="bg-primary">
											<?php foreach ($ch as $value) {
												echo '<a href="'.base_url('auth/exam/'.$value['ch_id']).'"><li>'.$value['ch_subject'].'</li></a>';
											} ?>
										</ul>
									</div>
								</a>
								<a>	
									<div class="submenu">							
										<i class="bg-primary icon fa fa-sitemap"></i>
										<p>คะแนน</p>
										<ul class="bg-primary">
											<?php foreach ($ch as $value) {
												echo '<a href="'.base_url('auth/score/'.$value['ch_id']).'"><li>'.$value['ch_subject'].'</li></a>';
											} ?>
										</ul>
									</div>
								</a>
								<a href="<?php echo base_url('auth/logout'); ?>">	
									<div>							
										<i class="bg-primary icon fa fa-sign-out"></i>
										<p>ออกจากระบบ</p>
									</div>
								</a>
							</div>
						</div>
					</div>

				</div>
			</section>