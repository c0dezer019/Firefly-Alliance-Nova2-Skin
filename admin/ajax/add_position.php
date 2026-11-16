<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('manage/positions/'. $g_dept .'/add');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>

		<kbd class="fn-set-label"><?php echo $label['dept'];?></kbd>
		<?php echo form_dropdown('pos_dept', $values['depts'], '', 'class="hud"');?>

		<kbd class="fn-set-label"><?php echo $label['type'];?></kbd>
		<?php echo form_dropdown('pos_type', $values['type'], '', 'class="hud"');?>

		<kbd class="fn-set-label"><?php echo $label['open'];?></kbd>
		<?php echo form_input($inputs['open']);?>

		<kbd class="fn-set-label"><?php echo $label['top'];?></kbd>
		<div class="fn-modal-radios">
			<?php echo form_radio($inputs['top_y']) .' '. form_label($label['yes'], 'top_y');?>
			<?php echo form_radio($inputs['top_n']) .' '. form_label($label['no'], 'top_n');?>
		</div>

		<kbd class="fn-set-label"><?php echo $label['order'];?></kbd>
		<?php echo form_input($inputs['order']);?>

		<kbd class="fn-set-label"><?php echo $label['display'];?></kbd>
		<div class="fn-modal-radios">
			<?php echo form_radio($inputs['display_y']) .' '. form_label($label['on'], 'display_y');?>
			<?php echo form_radio($inputs['display_n']) .' '. form_label($label['off'], 'display_n');?>
		</div>

		<kbd class="fn-set-label"><?php echo $label['desc'];?></kbd>
		<?php echo form_textarea($inputs['desc']);?>
	</div>
