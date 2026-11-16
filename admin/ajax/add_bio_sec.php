<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('site/biosections/add');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>
		<kbd class="fn-set-label"><?php echo $label['order'];?></kbd>
		<?php echo form_input($inputs['order']);?>
		<kbd class="fn-set-label"><?php echo $label['tab'];?></kbd>
		<?php echo form_dropdown('section_tab', $values['tabs'], '', 'class="hud"');?>
	</div>