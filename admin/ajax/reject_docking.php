<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open($form);?>
	<div class="fn-modal-field">
		<kbd class="fn-set-label"><?php echo $label['email'];?></kbd>
		<?php echo form_textarea($values['email']);?>
	</div>
	<?php echo form_hidden('id', $id);?>
	<?php echo form_hidden('action', 'reject');?>
