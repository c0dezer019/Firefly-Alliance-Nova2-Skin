<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('manage/comments/'. $type .'/'. $status .'/'. $page .'/edit');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['author'];?></kbd>
		<div class="fn-mc-modal-value"><?php echo $inputs['author'];?></div>

		<kbd class="fn-set-label"><?php echo $label['content'];?></kbd>
		<?php echo form_textarea($inputs['content']);?>
	</div>
	<?php echo form_hidden('id', $id);?>
