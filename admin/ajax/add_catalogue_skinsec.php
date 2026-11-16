<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('site/catalogueskins/section/add');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['section'];?></kbd>
		<?php echo form_dropdown('section', $values['section'], '', 'class="hud"');?>
		<kbd class="fn-set-label"><?php echo $label['skin'];?></kbd>
		<?php echo form_dropdown('skin', $skins, '', 'class="hud"');?>
		<kbd class="fn-set-label"><?php echo $label['preview'];?></kbd>
		<?php echo form_input($inputs['preview']);?>
		<kbd class="fn-set-label"><?php echo $label['status'];?></kbd>
		<?php echo form_dropdown('status', $values['status'], '', 'class="hud"');?>
		<kbd class="fn-set-label"><?php echo $label['default_theme'];?></kbd>
		<span class="fn-set-radios"><?php echo form_radio($inputs['default_y']);?> <?php echo form_label($label['yes'], 'skin_default_y');?> <?php echo form_radio($inputs['default_n']);?> <?php echo form_label($label['no'], 'skin_default_n');?></span>
	</div>