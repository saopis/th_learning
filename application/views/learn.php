<?php $this->load->view('header'); ?>
<section class="bg-grey">
	<div class="container note border-primary">
		<h1 class="w-100 text-center pb-3"><?php echo $ch['ch_subject']; ?></h1>
		<?php 
			foreach ($content as $value) {
				echo $value['c_content'].'<br>';
			}
		 ?>
	</div>
</section>
<?php $this->load->view('footer'); ?>
