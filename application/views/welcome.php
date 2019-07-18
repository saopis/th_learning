<?php $this->load->view('header'); ?>
<section class="bg-grey">
	<div class="container note border-primary">
		<h1 class="w-100 text-center p-2">PROFILE</h1>
		<div class="row">
			<div class="col-md-6 bg-warning text-center p-5" >
				<div class="middle2 text-center" style=" padding-top: 20%;">
					<i class="fa fa-user-circle" style="font-size: 150px;"></i><br><br><br>
					<h2 class=""><?php echo $f_name.' '.$l_name; ?></h2>
				</div>
			</div>
			<div class="col-md-6 border-primary" style="border: 2px solid;">
				<h3 class="w-100 text-center p-2">คะแนนสอบ</h3><hr>
				<?php foreach ($score as $value) {?>
				<div>
					<h5 class="w-100 text-center"><?php echo $value['ch']['ch_subject']; ?></h5>
					<div class="row">
						<div class="col-md-6 text-center">
							<p><h1><?php echo $value['b_score']['s_get'].'/'.$value['b_score']['s_full']; ?></h1>ก่อนเรียน</p>
						</div>
						<div class="col-md-6 text-center">
							<p><h1><?php echo $value['a_score']['s_get'].'/'.$value['a_score']['s_full']; ?></h1>หลังเรียน</p>
						</div>
					</div>
					<hr>
				</div>
				<?php } ?>				
			</div>
		</div>
	</div>
</section>
<?php $this->load->view('footer'); ?>
