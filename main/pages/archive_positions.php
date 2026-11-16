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

<?php if (isset($depts)): ?>
	<div class="fn-doc-stack fn-arch-gap">
		<div class="fn-doc-panel"><?php echo $depts;?></div>
	</div>
<?php endif;?>

<?php if (isset($positions)): ?>
	<div class="fn-specs-panel fn-arch-flush">
		<?php foreach ($positions as $p): ?>
			<div class="fn-pos-row fn-arch-pos">
				<div class="fn-pos-name"><?php echo $p['name'];?></div>
				<div class="fn-pos-desc"><?php echo $p['desc'];?></div>
				<div class="fn-arch-open"><?php echo $p['open'];?></div>
			</div>
		<?php endforeach;?>
	</div>
<?php endif;?>
