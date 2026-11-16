<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('site/manifests/edit');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>
		<kbd class="fn-set-label"><?php echo $label['order'];?></kbd>
		<?php echo form_input($inputs['order']);?>
		<kbd class="fn-set-label"><?php echo $label['display'];?></kbd>
		<span class="fn-set-radios"><?php echo form_radio($inputs['display_y']) .' '. form_label($label['on'], 'display_y');?> <?php echo form_radio($inputs['display_n']) .' '. form_label($label['off'], 'display_n');?></span>
		<kbd class="fn-set-label"><?php echo $label['default'];?></kbd>
		<span class="fn-set-radios"><?php echo form_radio($inputs['default_y']) .' '. form_label($label['yes'], 'default_y');?> <?php echo form_radio($inputs['default_n']) .' '. form_label($label['no'], 'default_n');?></span>
		<kbd class="fn-set-label"><?php echo $label['desc'];?></kbd>
		<?php echo form_textarea($inputs['desc']);?>
		<kbd class="fn-set-label"><?php echo $label['header'];?></kbd>
		<?php echo form_textarea($inputs['header']);?>
		<kbd class="fn-set-label"><?php echo $label['view'];?></kbd>
		<?php echo form_dropdown('manifest_view', $values['manifest'], $inputs['view']);?>
		<kbd class="fn-set-label"><?php echo $label['manifest_metadata'];?></kbd>
		<?php echo form_input($inputs['metadata']);?>
		<div class="fn-modal-full fn-modal-hint"><?php echo $label['metadata_explain'];?></div>
	</div>
	<?php echo form_hidden('id', $id);?>