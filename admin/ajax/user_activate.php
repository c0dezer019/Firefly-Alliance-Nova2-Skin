<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('user/account/'.$id.'/activate');?>
	<?php echo form_hidden('id', $id);?>

	<?php if (isset($characters)): ?>
		<div class="fn-modal-checks">
		<?php foreach ($characters as $charid => $name): ?>
			<p class="fn-modal-check">
				<?php $checked = ($charid == $primarychar) ? true : false;?>
				<?php echo form_checkbox('characters[]', $charid, $checked, 'id="'.$charid.'"');?>
				<?php echo form_label($name, $charid);?>
			</p>
		<?php endforeach;?>
		</div>
	<?php endif;?>
