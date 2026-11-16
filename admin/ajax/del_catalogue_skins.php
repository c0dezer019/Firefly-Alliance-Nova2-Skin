<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('site/catalogueskins/skin/delete');?>
	<?php echo form_hidden('id', $id);?>
	<?php echo form_hidden('old_skin', $old_skin);?>
	
	<?php if (isset($sections)): ?>
		<?php foreach ($sections as $section => $s): ?>
			<div class="fn-modal-sub"><?php echo ucfirst($section);?></div>
			<?php echo form_dropdown('change_'.$section, $skins[$section], $default[$section], 'class="hud"');?>
		<?php endforeach;?>
	<?php endif;?>