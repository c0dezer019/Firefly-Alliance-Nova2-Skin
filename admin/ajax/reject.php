<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open($form);?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['email'];?></kbd>
		<?php echo form_textarea($inputs['email']);?>
	</div>
	<?php echo form_hidden('id', $id);?>
	<?php echo form_hidden('action', 'reject');?>
