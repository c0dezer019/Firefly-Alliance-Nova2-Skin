<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-st-popover">
	<div class="float_right fn-st-popover-close"><a href="#" class="close-popover">Close</a></div>

	<div class="fn-st-field">
		<kbd><?php echo $label['order'];?></kbd>
		<?php echo form_input($order);?>
	</div>
	<div class="fn-st-field">
		<kbd><?php echo $label['display'];?></kbd>
		<?php echo form_dropdown('display', $display_options, $display, "id='".$id."_display'");?>
	</div>
	<div class="fn-st-field">
		<kbd><?php echo $label['type'];?></kbd>
		<?php echo form_dropdown('type', $type_options, $type, "id='".$id."_type'");?>
	</div>
	<div class="fn-st-field">
		<kbd><?php echo $label['dept'];?></kbd>
		<?php echo form_dropdown_dept('dept', $dept, "id='".$id."_dept'");?>
	</div>
	<div class="fn-st-field">
		<kbd><?php echo $label['desc'];?></kbd>
		<?php echo form_textarea($desc);?>
	</div>
	<div class="fn-st-actions">
		<?php echo form_hidden('id', $id);?>
		<?php echo form_button($submit);?>
	</div>
</div>
