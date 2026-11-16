<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('site/usersettings/add');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['label'];?></kbd>
		<?php echo form_input($inputs['label']);?>

		<kbd class="fn-set-label"><?php echo $label['key'];?></kbd>
		<?php echo form_input($inputs['key']);?>

		<kbd class="fn-set-label"><?php echo $label['value'];?></kbd>
		<?php echo form_textarea($inputs['value']);?>
	</div>
