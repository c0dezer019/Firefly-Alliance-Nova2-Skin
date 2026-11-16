<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('site/rolepages/add');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>

		<kbd class="fn-set-label"><?php echo $label['url'];?></kbd>
		<?php echo form_input($inputs['url']);?>

		<kbd class="fn-set-label"><?php echo $label['level'];?></kbd>
		<?php echo form_input($inputs['level']);?>

		<kbd class="fn-set-label"><?php echo $label['group'];?></kbd>
		<?php echo form_dropdown('page_group', $groups, '', 'class="hud"');?>

		<kbd class="fn-set-label"><?php echo $label['desc'];?></kbd>
		<?php echo form_textarea($inputs['desc']);?>
	</div>
