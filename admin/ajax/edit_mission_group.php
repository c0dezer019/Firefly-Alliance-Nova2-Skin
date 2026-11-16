<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('manage/missiongroups/edit');?>
	<?php echo form_hidden('id', $id);?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>

		<?php if ($inputs['parent'] !== false): ?>
			<kbd class="fn-set-label"><?php echo $label['parent'];?></kbd>
			<?php echo form_dropdown('misgroup_parent', $inputs['parent'], $inputs['parent_value'], 'class="hud"');?>
		<?php endif;?>

		<kbd class="fn-set-label"><?php echo $label['order'];?></kbd>
		<?php echo form_input($inputs['order']);?>

		<kbd class="fn-set-label"><?php echo $label['desc'];?></kbd>
		<?php echo form_textarea($inputs['desc']);?>
	</div>
