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
	<ul class="fn-depts-list">
		<?php foreach ($depts as $d): ?>
			<li class="fn-depts-block">
				<h2 class="fn-depts-name"><?php echo $d['name'];?></h2>
				<div class="fn-depts-desc"><?php echo $d['desc'];?></div>
			</li>
		<?php endforeach;?>
	</ul>
<?php endif;?>
