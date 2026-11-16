<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<?php if ($private == 'y' and Auth::is_logged_in() === false): ?>
	<div class="fn-section-head">
		<span class="glyph">&#9153;</span>
		<h3><?php echo $label['error_pagetitle'];?></h3>
		<div class="fn-title-rule"></div>
		<span class="lbl">新闻 · NEWS</span>
	</div>
	<p class="fn-card-excerpt"><?php echo $label['error_private_news'];?></p>
<?php else: ?>
	<div class="fn-section-head">
		<span class="glyph">&#9153;</span>
		<h3><?php echo $title;?></h3>
		<div class="fn-title-rule"></div>
		<span class="lbl">新闻 · NEWS</span>
	</div>

	<div class="fn-article">
		<?php if (isset($next) || isset($prev)): ?>
			<div class="fn-article-nav">
				<?php if (isset($prev)): ?><?php echo anchor('main/viewnews/'.$prev, img($images['prev']), array('class' => 'image'));?><?php endif;?>
				<?php if (isset($next)): ?><?php echo anchor('main/viewnews/'.$next, img($images['next']), array('class' => 'image'));?><?php endif;?>
			</div>
		<?php endif;?>

		<?php if ($status != 'activated'): ?>
			<p class="fn-article-notice"><?php echo $label['nonactivenews'];?></p>
		<?php endif;?>

		<?php if ($edit_valid): ?>
			<p class="fn-article-edit"><?php echo link_to_if($edit_valid, 'manage/news/edit/'.$id, $label['edit']);?></p>
		<?php endif;?>

		<div class="fn-article-meta">
			<?php echo $label['posted'].' '.$date.' '.$label['by'].' '.$author;?>
			<?php if (isset($update)): ?><br /><?php echo $label['edited'].' '.$label['on'].' '.$update;?><?php endif;?>
			<br /><strong><?php echo $label['category'];?></strong> <?php echo $category;?>
			<?php if (isset($tags) && $tags !== ''): ?><br /><strong><?php echo $label['tags'];?></strong> <?php echo $tags;?><?php endif;?>
		</div>

		<div class="fn-article-body"><?php echo text_output($content);?></div>

		<div class="fn-article-tools">
			<?php echo anchor('feed/news', img($images['feed']).' '.$label['rss_feed'], array('class' => 'image'));?>
			<?php if (Auth::is_logged_in()): ?>
				<a href="#" id="add_comment" rel="facebox" myID="<?php echo $news_id;?>" class="image"><?php echo $label['addcomment'];?></a>
			<?php endif;?>
		</div>

		<?php if (isset($comments) && is_array($comments)): ?>
			<div class="fn-comments">
				<a name="comments"></a>
				<h2 class="fn-comments-head"><?php echo $label['comments'].' ('.$comment_count.')';?></h2>
				<div id="comments">
					<?php foreach ($comments as $value): ?>
						<div class="fn-comment">
							<div class="fn-comment-by"><?php echo $label['by'].' '.$value['author'].' '.$label['on'].' '.$value['date'];?></div>
							<div class="fn-comment-body"><?php echo nl2br($value['content']);?></div>
						</div>
					<?php endforeach;?>
				</div>
			</div>
		<?php endif;?>
	</div>
<?php endif;?>
