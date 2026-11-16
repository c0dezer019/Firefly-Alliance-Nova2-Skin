<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo $text;?></div>

<?php echo form_open('site/messages/edit');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['label'];?></kbd>
		<?php echo form_input($inputs['label']);?>
		<kbd class="fn-set-label"><?php echo $label['key'];?></kbd>
		<?php echo form_input($inputs['key']);?>
		<kbd class="fn-set-label"><?php echo $label['type'];?></kbd>
		<?php echo form_dropdown('message_type', $type, $value['type'], 'class="hud"');?>
		<kbd class="fn-set-label"><?php echo $label['content'];?></kbd>
		<?php echo form_textarea($inputs['content']);?>
	</div>
	<?php echo form_hidden('old_key', $old_key);?>