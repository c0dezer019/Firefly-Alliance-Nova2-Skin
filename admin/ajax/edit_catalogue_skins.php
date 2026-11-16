<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('site/catalogueskins/skin/edit');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>
		<kbd class="fn-set-label"><?php echo $label['location'];?></kbd>
		<div class="fn-modal-field"><span class="fn-modal-hint"><?php echo APPFOLDER .'/views/';?></span>
					<?php echo form_input($inputs['location']);?></div>
		<kbd class="fn-set-label"><?php echo $label['credits'];?></kbd>
		<?php echo form_textarea($inputs['credits']);?>
	</div>
	<?php echo form_hidden('id', $id);?>