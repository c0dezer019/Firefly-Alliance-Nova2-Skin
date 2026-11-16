<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">搜索 · SEARCH</span>
</div>

<?php if (isset($msg)): ?>
	<p class="fn-search-intro"><?php echo $msg;?></p>
<?php endif;?>

<p class="fn-search-again"><?php echo anchor('search/index', '&laquo; '.$label['search']);?></p>

<?php if (isset($results)): ?>
	<div class="fn-search-results">
		<?php foreach ($results as $result): ?>
			<div class="fn-search-result">
				<strong><?php echo $result['link'];?></strong>
				<?php if (filled($result['content'])): ?>
					<p class="fn-search-excerpt"><?php echo strip_tags(word_limiter($result['content'], 100));?></p>
				<?php endif;?>
			</div>
		<?php endforeach;?>
	</div>
<?php else: ?>
	<div class="fn-search-empty">
		<div class="head"><?php echo $label['noresult'];?></div>
	</div>
<?php endif;?>
