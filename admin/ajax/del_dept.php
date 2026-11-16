<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('manage/depts/delete');?>
	<div class="fn-modal-block">
		<h3 class="fn-modal-sub"><?php echo $label['positions'];?></h3>

		<div class="fn-modal-check">
			<?php echo form_label($label['delete'], 'delete_y');?>
			<?php echo form_checkbox($inputs['delete']);?>
		</div>

		<?php if ($dept_count > 1): ?>
			<p class="fn-modal-subtext"><?php echo $label['reassign'];?></p>
			<div class="fn-modal-field"><?php echo form_dropdown_dept('dept', '', 'class="hud"', 'main', '', $id);?></div>
		<?php endif;?>
	</div>

	<?php if ($sub_count > 0): ?>
		<div class="fn-modal-block">
			<h3 class="fn-modal-sub"><?php echo $label['subdepts'];?></h3>

			<p class="fn-modal-subtext"><?php echo $label['reassign_sub'];?></p>
			<p class="fn-modal-note"><?php echo $reassign_text;?></p>
			<div class="fn-modal-field"><?php echo form_dropdown_dept('subdept', '', 'class="hud"', 'main', '', $id, true);?></div>
		</div>
	<?php endif;?>
	<?php echo form_hidden('id', $id);?>
