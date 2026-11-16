<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('site/menucats/edit');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>
		<kbd class="fn-set-label"><?php echo $label['order'];?></kbd>
		<?php echo form_input($inputs['order']);?>
		<kbd class="fn-set-label"><?php echo $label['category'];?></kbd>
		<?php echo form_dropdown('menucat_menu_cat', $cats, $default['cat'], 'class="hud"');?>
		<kbd class="fn-set-label"><?php echo $label['type'];?></kbd>
		<?php echo form_dropdown('menucat_type', $types, $default['type'], 'class="hud"');?>
	</div>
	<?php echo form_hidden('id', $id);?>