<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open($form);?>
	<div class="fn-modal-grid">
		<?php if ($values['user_status'] != 'active'): ?>
			<kbd class="fn-set-label"><?php echo $label['role'];?></kbd>
			<div><?php echo form_dropdown('role', $roles, '', 'class="hud"');?></div>
		<?php endif;?>

		<kbd class="fn-set-label"><?php echo $label['position'];?></kbd>
		<div><?php echo form_dropdown_position('position', $values['position'], 'class="hud"');?></div>

		<kbd class="fn-set-label"><?php echo $label['rank'];?></kbd>
		<div><?php echo form_dropdown_rank('rank', $values['rank'], 'class="hud"');?></div>

		<kbd class="fn-set-label"><?php echo $label['email'];?></kbd>
		<?php echo form_textarea($values['email']);?>
	</div>
	<?php echo form_hidden('id', $id);?>
	<?php echo form_hidden('action', 'approve');?>
