<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('site/bioform/editval/'. $field);?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['value'];?></kbd>
		<div class="fn-modal-field"><?php echo text_output($label['insert'], 'span', 'fn-modal-hint');?>
					<?php echo form_input($inputs['value']);?></div>
		<kbd class="fn-set-label"><?php echo $label['content'];?></kbd>
		<div class="fn-modal-field"><?php echo text_output($label['dropdown'], 'span', 'fn-modal-hint');?>
					<?php echo form_input($inputs['content']);?></div>
		<kbd class="fn-set-label"><?php echo $label['field'];?></kbd>
		<?php echo form_dropdown('value_field', $values['fields'], $selected_field, 'class="hud"');?>
	</div>
	<?php echo form_hidden('id', $id);?>