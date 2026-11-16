<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('admin/index');?>
	<div class="fn-modal-grid">
		<?php echo form_password($inputs['password']);?>
	</div>
	<?php echo form_hidden('user', $user);?>
	<?php echo form_hidden('action', 'password_change');?>
