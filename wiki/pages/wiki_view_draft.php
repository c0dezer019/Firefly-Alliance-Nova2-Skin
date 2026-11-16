<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<?php if (isset($draft)): ?>
	<div class="fn-section-head">
		<span class="glyph">&#9153;</span>
		<h3><?php echo $header;?></h3>
		<div class="fn-title-rule"></div>
		<span class="lbl">草稿 · DRAFT</span>
	</div>

	<p class="fn-per-back"><?php echo anchor('wiki/view/page/'. $draft['page'], $label['back_page']);?></p>

	<p class="fn-wiki-created"><?php echo $label['draft'] .' '. $label['created'] .' '. $label['by'] .' '. $draft['created'] .' '. $label['on'] .' '. $draft['created_date'];?></p>

	<?php echo text_output($draft['content'], 'div', 'prose', false);?>

	<div class="fn-wiki-created"><?php echo text_output($label['categories'], 'strong') .' '. $draft['categories'];?></div>
<?php else: ?>
	<div class="fn-flash fn-flash-error"><?php echo $label['nodraft'];?></div>
<?php endif;?>
