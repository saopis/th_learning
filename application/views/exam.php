<?php $this->load->view('header'); ?>
<style>
	.hidden{
		display: none !important;
	}
	.answer{
		cursor: pointer;
		border:1px solid #ccc;
	}
	.answer:hover{
		background: #ffbb05;
		border:1px solid #ffbb05;
	}
	.answer.checked{
		background: #ffbb05;
		border:1px solid #ffbb05;
	}
	.true{
		background: #40e0d0 !important;
		border:1px solid #40e0d0 !important;
	}
</style>
<section class="bg-grey">
	<div class="container note border-primary">
		<h1 class="w-100 text-center pb-3">ข้อสอบ<?php echo $q_type; ?></h1>
		<h2 class="w-100 text-center pb-3"><?php echo $ch['ch_subject']; ?></h2>
		<form  name="myForm" action="" onsubmit="false" method="post">
			<?php 
			foreach ($q as $key=> $value) {
				echo '<p class="pt-4 question">'.($key+1).'. '.$value['q_question'];
				$required='';
				 // onsubmit="return validateForm()"
				foreach ($value['answer'] as $key1=> $a) {
					switch ($key1) {
						case 1:
						$key1='ข';
						$required='';
						break;
						case 2:
						$key1='ค';
						$required='';
						break;
						case 3:
						$key1='ง';
						$required='';
						break;
						default:
						$key1='ก';
									//$required='required';
						break;
					}
					echo '
					<br><label class="w-100 p-2 answer '.$a['a_id'].'" style="border:1px solid #ccc;"><input type="radio" name="q'.($key+1).'" '.$required.' class="hidden" value="'.$a['a_id'].'">'.$key1.'. '.$a['a_answer'].'</label>';
				}

				echo	'
				</p>';
			}
			?>
			<div class="w-100 text-center"><button type="submit" class="submit btn btn-primary">บันทึก</button></div>
		</form>
	</div>
</section>
<?php $this->load->view('footer'); ?>
<script>
	function validateForm() {
		var q = $('.question');
		var answer =[];
		for (var i = 1; i <= q.length; i++) {
			var x = document.forms["myForm"]["q"+i].value;
			if (x == "") {
				alert("กรุณาตอบข้อที่ "+i);
				return false;
			}else {
				answer.push(x);
			}
		}
		return answer;
	}
	
	// $('.answer').click(function(event) {
	// 	$(this).closest('.question').find('.answer').removeClass('checked');
	// 		$(this).addClass('checked');
	// });
	$(document).on('change', 'input[type="radio"]', function(event) {
			event.preventDefault();
			if ($('.sended').length>0) {
				return;
			}
			$(this).closest('.question').find('.answer').removeClass('checked');
			$(this).closest('.answer').addClass('checked');
			
		});
	$('.submit').on('click', function(event) {
		event.preventDefault();
		
		var a =validateForm()
		var ch='<?php echo $ch['ch_id'] ?>';
		var base='<?php echo base_url(); ?>'
		if (a.length>0) {
			$.ajax({
				url: '<?php echo base_url('auth/check_exam'); ?>',
				type: 'POST',
				dataType: 'json',
				data: {answer: a,ch:ch},
			})
			.done(function(data) {
				console.log("success");
				console.log(a);
				console.log(data);
				var e = $('input[type="radio"]');
				$('.checked').css('background', '#ff4040');
				for (var i = 0; i < data.true.length; i++) {
					$('.'+data.true[i]).addClass('true');
				}
				$('.submit').closest('div').html('<h3>คุณได้คะแนน</h3><h1>'+data.get+'/'+data.full+'</h1><a href="'+base+'auth/learn/'+ch+'"><button type="button" class="btn btn-primary">เรียนบทนี้</button><a href="'+base+'auth/score/'+ch+'"><button type="button" class="btn btn-primary">ดูอันดับคะแนนบที่</button></a>');
				// alert('คุณได้คะแนน '+data.get);
				$('.answer').removeClass('answer');
				$('form').addClass('sended');
			})
			.fail(function(data) {
				console.log("error");
			})
			.always(function(data) {
				console.log("complete");
			});			
			
		}
	});
	function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}

</script> 