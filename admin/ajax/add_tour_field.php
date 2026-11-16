<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('site/tourform/add');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['type'];?></kbd>
		<?php echo form_dropdown('field_type', $values['type'], '', 'class="hud"');?>
		<kbd class="fn-set-label"><?php echo $label['label'];?></kbd>
		<?php echo form_input($inputs['label']);?>
		<kbd class="fn-set-label"><?php echo $label['order'];?></kbd>
		<?php echo form_input($inputs['order']);?>
		<kbd class="fn-set-label"><?php echo $label['display'];?></kbd>
		<span class="fn-set-radios"><?php echo form_radio($inputs['display_y']);?> <?php echo form_label($label['yes'], 'field_display_y');?> <?php echo form_radio($inputs['display_n']);?> <?php echo form_label($label['no'], 'field_display_n');?></span>
		<div class="fn-modal-full"><?php echo text_output($label['html'], 'div', 'fn-modal-sub');?></div>
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>
		<kbd class="fn-set-label"><?php echo $label['id'];?></kbd>
		<?php echo form_input($inputs['id']);?>
		<kbd class="fn-set-label"><?php echo $label['class'];?></kbd>
		<?php echo form_input($inputs['class']);?>
		<kbd class="fn-set-label"><?php echo $label['rows'];?></kbd>
		<?php echo form_input($inputs['rows']);?>
		<div class="fn-modal-full"><?php echo text_output($label['select'], 'div', 'fn-modal-sub');?></div>
		<div class="fn-modal-full"><?php echo text_output($label['dropdown_select'], 'div', 'fn-modal-hint');?></div>
		<div class="fn-modal-full"><div class="fn-modal-wide"><?php echo form_textarea($inputs['select']);?></div></div>
	</div>