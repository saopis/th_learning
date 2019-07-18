<section></section>
</body>
</html>
<script>
	$(document).ready(function() {
		$('.submenu').click(function(event) {
			$('.submenu').each(function(index, el) {
				$(this).removeClass('isClick');
			});
				    // $(this).closest('.submenu').siblings().removeClass('isClick');
				    $(this).toggleClass('isClick');
				});
	});
	
</script>