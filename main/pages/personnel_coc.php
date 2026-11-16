<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">指挥链 · CHAIN OF COMMAND</span>
</div>

<?php if ($edit_valid): ?>
	<p class="fn-doc-edit"><?php echo link_to_if($edit_valid, 'characters/coc', $label['edit']);?></p>
<?php endif;?>

<?php if (isset($coc)): ?>
	<div class="fn-log-panel">
		<?php foreach ($coc as $v): ?>
			<div class="fn-coc-row">
				<div class="fn-coc-name">
					<?php echo $v['name'];?>
					<span class="fn-log-date"><?php echo $v['position'];?></span>
				</div>
				<div class="fn-coc-rank"><?php echo img($v['img_rank']);?></div>
				<div class="fn-coc-bio"><?php echo anchor('personnel/character/'. $v['id'], img($v['img_bio']), array('class' => 'image'));?></div>
			</div>
		<?php endforeach;?>
	</div>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $error;?></p>
<?php endif;?>
