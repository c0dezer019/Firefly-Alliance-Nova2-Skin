<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('site/dockingsections/delete');?>
	<div class="fn-modal-select">
	<?php echo form_dropdown('new_sec', $values['sections'], '', 'class="hud"');?>
	</div>
	<?php echo form_hidden('id', $id);?>