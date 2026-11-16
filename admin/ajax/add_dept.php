<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('manage/depts/add');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>

		<kbd class="fn-set-label"><?php echo $label['order'];?></kbd>
		<?php echo form_input($inputs['order']);?>

		<kbd class="fn-set-label"><?php echo $label['type'];?></kbd>
		<?php echo form_dropdown('dept_type', $values['type'], '', 'class="hud"');?>

		<kbd class="fn-set-label"><?php echo $label['parent'];?></kbd>
		<?php echo form_dropdown('dept_parent', $values['depts'], '0', 'class="hud"');?>

		<kbd class="fn-set-label"><?php echo $label['manifest'];?></kbd>
		<?php echo form_dropdown('dept_manifest', $values['manifest'], '0', 'class="hud"');?>

		<kbd class="fn-set-label"><?php echo $label['display'];?></kbd>
		<div class="fn-modal-radios">
			<?php echo form_radio($inputs['display_y']) .' '. form_label($label['on'], 'display_y');?>
			<?php echo form_radio($inputs['display_n']) .' '. form_label($label['off'], 'display_n');?>
		</div>

		<kbd class="fn-set-label"><?php echo $label['desc'];?></kbd>
		<?php echo form_textarea($inputs['desc']);?>
	</div>
