<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('characters/bio/'.$id.'/makeplaying');?>
	<?php echo form_hidden('id', $id);?>

	<div class="fn-modal-stack">
		<?php if (isset($users)): ?>
			<div><?php echo form_dropdown('user', $users, $user, 'class="hud"');?></div>
		<?php endif;?>

		<div class="fn-modal-check">
			<?php echo form_checkbox('main_character', 1, false, 'class="hud" id="main_character"');?>
			<?php echo form_label($label['main_character'], 'main_character');?>
		</div>
	</div>
