<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('characters/bio/'.$id.'/makenpc');?>
	<?php echo form_hidden('id', $id);?>

	<div class="fn-modal-stack">
		<div class="fn-modal-check">
			<?php echo form_checkbox('remove_user', 1, false, 'class="hud" id="remove_user"');?>
			<?php echo form_label($label['remove_user'], 'remove_user');?>
		</div>

		<?php if ( ! $has_characters): ?>
			<div class="fn-modal-check">
				<?php echo form_checkbox('deactivate_user', 1, true, 'class="hud" id="deactivate_user"');?>
				<?php echo form_label($label['deactivate_user'], 'deactivate_user');?>
			</div>
		<?php endif;?>

		<?php if (isset($characters) and $is_main_character): ?>
			<div><?php echo form_dropdown('main_character', $characters, null, 'class="hud"');?></div>
		<?php endif;?>
	</div>
