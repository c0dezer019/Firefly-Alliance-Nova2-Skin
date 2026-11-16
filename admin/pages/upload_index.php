<?php defined('BASEPATH') or exit('No direct script access allowed');?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<div class="fn-rpt-intro"><?php echo text_output($text);?></div>

	<p class="fn-up-manage">
		<?php echo link_to_if(Auth::can('upload/manage', false), 'upload/manage', $label['manage_uploads'], array('class' => 'fn-rpt-btn'));?>
	</p>

	<div class="fn-rpt-panel">
		<?php echo form_open_multipart('upload/index', array('class' => 'fn-up-form'));?>
			<div class="fn-up-field">
				<kbd class="fn-up-label"><?php echo $label['type'];?></kbd>
				<?php echo form_dropdown('type', $values['type']);?>
			</div>
			<div class="fn-up-field">
				<kbd class="fn-up-label"><?php echo $label['name'];?></kbd>
				<?php echo form_upload($inputs['file']);?>
			</div>

			<div class="fn-up-actions"><?php echo form_button($button['upload']);?></div>
		<?php echo form_close();?>
	</div>
</div>
