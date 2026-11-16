<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">百科 · WIKI</span>
</div>

<?php echo $syspage;?>

<?php if (isset($pages)): ?>
	<ul class="square cat_search">
		<?php foreach ($pages as $p): ?>
			<li>
				<?php echo anchor('wiki/view/page/'.$p['id'], $p['title']);?>
				<?php if (! empty($p['summary'])): ?><em><?php echo text_output($p['summary'], '');?></em><?php endif;?>
			</li>
		<?php endforeach;?>
	</ul>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['nopages'];?></p>
<?php endif;?>
