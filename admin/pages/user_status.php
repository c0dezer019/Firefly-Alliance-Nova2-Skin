<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-usr">
	<div class="fn-set-intro"><?php echo text_output($label['text']);?></div>

	<?php echo form_open('user/status');?>
		<div class="fn-usr-grid">
			<kbd class="fn-set-label"><?php echo $label['status'];?></kbd>
			<?php echo form_dropdown('status', $values['loa'], $inputs['loa']);?>

			<kbd class="fn-set-label"><?php echo $label['duration'];?></kbd>
			<?php echo form_textarea($inputs['duration']);?>

			<kbd class="fn-set-label"><?php echo $label['reason'];?></kbd>
			<?php echo form_textarea($inputs['reason']);?>
		</div>

		<div class="fn-set-actions fn-usr-act"><?php echo form_button($buttons['submit']);?></div>
	<?php echo form_close();?>
</div>
