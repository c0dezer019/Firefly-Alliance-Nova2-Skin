<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('manage/decks/'.$inputs['item']);?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>

		<kbd class="fn-set-label"><?php echo $label['item'];?></kbd>
		<?php echo form_dropdown('deck_item', $values['specs'], $inputs['item'], 'class="hud"');?>

		<kbd class="fn-set-label"><?php echo $label['content'];?></kbd>
		<?php echo form_textarea($inputs['content']);?>
	</div>
	<?php echo form_hidden('id', $id);?>
