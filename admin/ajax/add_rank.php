<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('manage/ranks/'. $set .'/'. $class .'/add');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>

		<kbd class="fn-set-label"><?php echo $label['shortname'];?></kbd>
		<?php echo form_input($inputs['shortname']);?>

		<kbd class="fn-set-label"><?php echo $label['order'];?></kbd>
		<?php echo form_input($inputs['order']);?>

		<kbd class="fn-set-label"><?php echo $label['class'];?></kbd>
		<?php echo form_input($inputs['class']);?>

		<kbd class="fn-set-label"><?php echo $label['display'];?></kbd>
		<div class="fn-modal-radios">
			<?php echo form_radio($inputs['display_y']) .' '. form_label($label['on'], 'display_y');?>
			<?php echo form_radio($inputs['display_n']) .' '. form_label($label['off'], 'display_n');?>
		</div>

		<kbd class="fn-set-label"><?php echo $label['image'];?></kbd>
		<div><?php echo form_input($inputs['image']) . text_output($ext, 'span', 'fn-st-ext');?></div>
	</div>
