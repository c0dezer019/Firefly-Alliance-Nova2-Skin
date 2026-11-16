<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#outbox_check_all').click(function(){
			$("input.outbox").prop('checked', $('#outbox_check_all').is(':checked'));
		});

		$('#loading').hide();
		$('#loaded').removeClass('hidden');
	});
</script>
