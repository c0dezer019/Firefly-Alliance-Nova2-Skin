<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('site/catalogueranks/edit');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>
		<kbd class="fn-set-label"><?php echo $label['genre'];?></kbd>
		<?php echo form_input($inputs['genre']);?>
		<kbd class="fn-set-label"><?php echo $label['location'];?></kbd>
		<div class="fn-modal-field"><span class="fn-modal-hint"><?php echo APPFOLDER .'/assets/common/'. GENRE .'/ranks/';?></span>
					<?php echo form_input($inputs['location']);?></div>
		<kbd class="fn-set-label"><?php echo $label['preview'];?></kbd>
		<?php echo form_input($inputs['preview']);?>
		<kbd class="fn-set-label"><?php echo $label['blank'];?></kbd>
		<?php echo form_input($inputs['blank']);?>
		<kbd class="fn-set-label"><?php echo $label['extension'];?></kbd>
		<?php echo form_input($inputs['extension']);?>
		<kbd class="fn-set-label"><?php echo $label['status'];?></kbd>
		<?php echo form_dropdown('rank_status', $values['status'], $default['status'], 'class="hud"');?>
		<kbd class="fn-set-label"><?php echo $label['credits'];?></kbd>
		<?php echo form_textarea($inputs['credits']);?>
		<kbd class="fn-set-label"><?php echo $label['default_rank'];?></kbd>
		<span class="fn-set-radios"><?php echo form_radio($inputs['default_y']);?> <?php echo form_label($label['yes'], 'rank_default_y');?> <?php echo form_radio($inputs['default_n']);?> <?php echo form_label($label['no'], 'rank_default_n');?></span>
	</div>
	<?php echo form_hidden('id', $id);?>