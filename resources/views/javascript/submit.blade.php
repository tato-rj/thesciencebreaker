<script type="text/javascript">

$('select[name="position"]').on('change', function() {
	$option = $(this).children(':selected').attr('id');
	$input = $('input[name="other"]');
	if ($option == 'other') {
		$input.fadeIn();
	} else {
		$input.val('');
		$input.hide();
	}
});

</script>