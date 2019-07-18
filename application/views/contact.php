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
								<a href="<?php echo base_url(''); ?>">	
									<div>							
										<i class="bg-primary icon fa fa-home"></i>
										<p>หน้าหลัก</p>
									</div>
								</a>
								<a href="<?php echo base_url('home/contact'); ?>">	
									<div>							
										<i class="bg-primary icon fa fa-phone"></i>
										<p class="color-primary">ติดต่อเรา</p>
									</div>
								</a>
								<a href="<?php echo base_url('home/login'); ?>">	
									<div>							
										<i class="bg-primary icon fa fa-user"></i>
										<p>เข้าสู่ระบบ</p>
									</div>
								</a>
							</div>
							
						</div>
					</div>

				</div>
			</section>
			<section class="bg-grey">
				<div class="container note border-primary">
					<h1 class="w-100 text-center pb-3">ติดต่อเรา</h1><hr>
					<div class="row">
						<div class="col-md-12">
							<div class="fivth-content">
								<form id="contact" action="" method="post">
									<div class="row">
										<div class="col-md-6">
											<fieldset>
												<input name="name" type="text" class="form-control" id="name" placeholder="ชื่อของท่าน" required>
											</fieldset>
										</div>
										<div class="col-md-6">
											<fieldset>
												<input name="email" type="email" class="form-control" id="email" placeholder="อีเมล" required>
											</fieldset>
										</div>
										<div class="col-md-12">
											<fieldset>
												<textarea name="message" rows="6" class="form-control" id="message" placeholder="ข้อความ" required></textarea>
											</fieldset>
										</div>
										<div class="col-md-12 text-center">
											<fieldset>
												<button type="submit"class="btn btn-primary mt-3">ส่งข้อความ</button>
											</fieldset>
										</div>
									</div>
								</form><br><hr><br>
								<div class="row">
									<div class="col-md-4 pb-4">
										<div class="card" style="width:100%;">
											<img class="card-img-top" src="<?php echo base_url('assets/img/p1.jpg'); ?>" alt="Card image" style="width:100%">
											<div class="card-body">
												<h4 class="card-title text-center">สูฮายลา อาบู</h4>
												<p class="card-text">
													<hr>
													โทร : 0843965875 <br>
													Email : Sula.Abu11@gmail.com
												</p>
												<p class="card-text">
													
												</p>
											</div>
										</div>
									</div>
									<div class="col-md-4 pb-4">
										<div class="card" style="width:100%;">
											<img class="card-img-top" src="<?php echo base_url('assets/img/p2.jpg'); ?>" alt="Card image" style="width:100%">
											<div class="card-body">
												<h4 class="card-title text-center">ซอลาฮุดดีน  สามะ</h4>
												<p class="card-text">
													<hr>
													โทร :  0936089258 <br>
													Email :  Atiqohyahya@gmail.com
												</p>
												<p class="card-text">
													
												</p>
											</div>
										</div>
									</div>
									<div class="col-md-4 pb-4">
										<div class="card" style="width:100%;">
											<img class="card-img-top" src="<?php echo base_url('assets/img/p3.jpg'); ?>" alt="Card image" style="width:100%">
											<div class="card-body">
												<h4 class="card-title text-center">รอยยาน มาหะ</h4>
												<p class="card-text">
													<hr>
													โทร : 0937853119 <br>
													Email : Fahmee.ry@gmail.com
												</p>
												<p class="card-text">
													
												</p>
											</div>
										</div>
									</div>
									<div class="col-md-4 pb-4">
										<div class="card" style="width:100%;">
											<img class="card-img-top" src="<?php echo base_url('assets/img/p4.jpg'); ?>" alt="Card image" style="width:100%">
											<div class="card-body">
												<h4 class="card-title text-center">อานีซะห์ อาลีฮา</h4>
												<p class="card-text">
													<hr>
													โทร : 0849084798 <br>
													Email : Kksah.aleeha05@gmail.com
												</p>
												<p class="card-text">
													
												</p>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>   
				</div>
			</section>
			
		</body>
		</html>