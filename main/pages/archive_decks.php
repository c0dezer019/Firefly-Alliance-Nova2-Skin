<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">档案 · ARCHIVE</span>
</div>

<p class="fn-per-back"><?php echo anchor('archive/index', LARROW .' Back to Archive Index');?></p>

<?php if (isset($decks)): ?>
	<div class="fn-specs-panel">
		<?php foreach ($decks as $key => $value): ?>
			<div class="fn-arch-row">
				<div class="fn-arch-key"><?php echo $key;?></div>
				<div class="fn-arch-val"><?php echo $value;?></div>
			</div>
		<?php endforeach;?>
	</div>
<?php else: ?>
	<p class="fn-card-excerpt">No deck listing found</p>
<?php endif;?>
