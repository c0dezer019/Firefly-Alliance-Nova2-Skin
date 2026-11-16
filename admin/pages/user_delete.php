<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-usr">
	<?php echo form_open('user/delete');?>
		<div class="fn-set-intro"><?php echo text_output($labels['confirm'], 'p');?></div>

		<div class="fn-set-actions fn-usr-act"><?php echo form_button($buttons['confirm']);?></div>
	<?php echo form_close();?>
</div>
