<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('characters/bio/'.$id.'/activate');?>
	<?php echo form_hidden('id', $id);?>

	<?php if (isset($users)): ?>
		<div class="fn-modal-stack">
			<?php if ( ! $active_user): ?>
				<div class="fn-modal-check">
					<?php echo form_checkbox('activate_user', 1, true, 'class="hud" id="activate_user"');?>
					<?php echo form_label($label['activate_user'], 'activate_user');?>
				</div>
			<?php endif;?>

			<div><?php echo form_dropdown('user', $users, $current_user, 'class="hud"');?></div>

			<div class="fn-modal-check">
				<?php echo form_checkbox('primary', 1, $maincharacter, 'class="hud" id="primary"');?>
				<?php echo form_label($label['make_primary'], 'primary');?>
			</div>
		</div>
	<?php endif;?>
