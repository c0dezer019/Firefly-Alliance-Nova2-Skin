<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $title;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">任务日志 · POST</span>
</div>

<div class="fn-article">
	<?php if (isset($next) || isset($prev)): ?>
		<div class="fn-article-nav">
			<?php if (isset($prev)): ?>
				<?php echo anchor('sim/viewpost/'.$prev, img($images['prev']), array('class' => 'image'));?>
			<?php endif;?>
			<?php if (isset($next)): ?>
				<?php echo anchor('sim/viewpost/'.$next, img($images['next']), array('class' => 'image'));?>
			<?php endif;?>
		</div>
	<?php endif;?>

	<?php if ($status != 'activated'): ?>
		<p class="fn-article-notice"><?php echo $label['nonactivepost'];?></p>
	<?php endif;?>

	<?php if (in_array(true, $valid)): ?>
		<p class="fn-article-edit"><?php echo link_to_if(in_array(true, $valid), 'manage/posts/edit/'.$post_id, $label['edit']);?></p>
	<?php endif;?>

	<div class="fn-article-meta">
		<?php echo $label['posted'];?> <?php echo $date;?> <?php echo $label['by'];?> <?php echo $author;?>
		<?php if (isset($update)): ?>
			<br /><?php echo $label['edited'].' '.$label['on'].' '.$update;?>
		<?php endif;?>
		<br /><?php echo $label['reading_time'];?>
		<br /><strong><?php echo $label['mission'];?></strong> <?php echo anchor('sim/missions/id/'.$mission_id, $mission);?>
		<?php if (! empty($location)): ?><br /><strong><?php echo $label['location'];?></strong> <?php echo $location;?><?php endif;?>
		<?php if (! empty($timeline)): ?><br /><strong><?php echo $label['timeline'];?></strong> <?php echo $timeline;?><?php endif;?>
		<?php if (! empty($tags)): ?><br /><strong><?php echo $label['tags'];?></strong> <?php echo $tags;?><?php endif;?>
	</div>

	<div class="fn-article-body"><?php echo text_output($content);?></div>

	<div class="fn-article-tools">
		<?php echo anchor('feed/posts', img($images['feed']).' '.$label['rss_feed'], array('class' => 'image'));?>
		<?php if (Auth::is_logged_in()): ?>
			<a href="#" id="add_comment" myID="<?php echo $post_id;?>" rel="facebox" class="image"><?php echo $label['addcomment'];?></a>
		<?php endif;?>
	</div>

	<?php if (isset($comments) and is_array($comments)): ?>
		<div class="fn-comments">
			<a name="comments"></a>
			<h2 class="fn-comments-head"><?php echo $label['comments'].' ('.$comment_count.')';?></h2>
			<div id="comments">
				<?php foreach ($comments as $value): ?>
					<div class="fn-comment">
						<div class="fn-comment-by"><?php echo ucfirst($label['by']).' '.$value['author'].' '.$label['on'].' '.$value['date'];?></div>
						<div class="fn-comment-body"><?php echo nl2br($value['content']);?></div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	<?php endif;?>
</div>
