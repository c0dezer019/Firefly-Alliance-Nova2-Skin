<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<script type="text/javascript">
	$(document).ready(function(){
		var $btn = $('#mark_read');

		// the button reads "Mark Unread" only when every checked message is already read
		function syncMarkButton() {
			var $checked = $('input.inbox:checked');
			var allRead = $checked.length > 0 && $checked.closest('.fn-inbox-row.unread').length === 0;

			$btn.data('unread', allRead ? 'y' : 'n').text($btn.data(allRead ? 'label-unread' : 'label-read'));
		}

		$('#inbox_check_all').click(function(){
			$("input.inbox").prop('checked', $('#inbox_check_all').is(':checked'));
			syncMarkButton();
		});

		$('input.inbox').change(syncMarkButton);

		// set the state of only the checked messages
		$btn.click(function(){
			var ids = $('input.inbox:checked').map(function(){ return $(this).val(); }).get();

			if (ids.length === 0) {
				return false;
			}

			$.ajax({
				type: "POST",
				data: {
					'nova_csrf_token': $('input[name=nova_csrf_token]').val(),
					'ids': ids,
					'unread': $btn.data('unread') || 'n'
				},
				url: "<?php echo site_url('ajax/update_mark_selected_messages');?>/<?php echo random_string('alnum', 8);?>",
				success: function(){
					window.location.reload(true);
				}
			});

			return false;
		});

		syncMarkButton();

		$('#loading').hide();
		$('#loaded').removeClass('hidden');
	});
</script>
