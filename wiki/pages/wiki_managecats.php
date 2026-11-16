<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">百科 · WIKI</span>
</div>

<p><a href="#" class="addtoggle image"><?php echo img($images['add']).' '.$label['add'];?></a></p>

<div class="addcat info-full hidden">
	<?php echo form_open('wiki/managecategories/add');?>
		<div class="fn-form-panel">
			<div class="fn-form-fields">
				<div class="fn-field"><label><?php echo $label['name'];?></label><?php echo form_input($inputs['name']);?></div>
				<div class="fn-field"><label><?php echo $label['desc'];?></label><?php echo form_textarea($inputs['desc']);?></div>
				<div class="fn-form-actions"><?php echo form_button($buttons['add']);?></div>
			</div>
		</div>
	<?php echo form_close();?>
</div>

<?php if (isset($categories)): ?>
	<table class="zebra table100">
		<thead><tr><th><?php echo $label['catname'];?></th><th><?php echo $label['catdesc'];?></th><th></th></tr></thead>
		<tbody>
		<?php foreach ($categories as $c): ?>
			<tr>
				<td><?php echo text_output($c['name'], 'strong');?></td>
				<td class="fontSmall gray"><?php echo $c['desc'];?></td>
				<td class="align_right">
					<a href="#" rel="facebox" myAction="delete" myID="<?php echo $c['id'];?>" class="image delete"><?php echo img($images['delete']);?></a>
					&nbsp;
					<a href="#" rel="facebox" myAction="edit" myID="<?php echo $c['id'];?>" class="image edit"><?php echo img($images['edit']);?></a>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['nocats'];?></p>
<?php endif;?>
