<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">舰船规格 · SPECS</span>
</div>

<?php if ($edit_valid === true || $edit_valid_form === true): ?>
	<p class="fn-specs-edit">
		<?php echo link_to_if($edit_valid, 'manage/specs', $label['edit']);?>
		<?php echo link_to_if($edit_valid_form, 'site/specsform', $label['edit_form']);?>
	</p>
<?php endif;?>

<?php if (isset($items)): ?>
	<div class="fn-specs-list">
		<?php foreach ($items as $item): ?>
			<div class="fn-specs-list-row">
				<?php echo anchor('sim/specs/'.$item['id'], $item['name'], array('class' => 'name'));?>
				<span class="summary"><?php echo text_output($item['summary'], '');?></span>
			</div>
		<?php endforeach;?>
	</div>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['nospecs_all'];?></p>
<?php endif;?>
