<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">任务日志 · POSTS</span>
</div>

<div class="fn-post-panel">
	<div class="fn-post-caption"><?php echo $display;?></div>

	<?php if (isset($posts)): ?>
		<div class="fn-post-row fn-post-row-head">
			<div><?php echo $label['title'];?></div>
			<div><?php echo $label['timeline'];?></div>
			<div><?php echo $label['location'];?></div>
			<div><?php echo $label['date'];?></div>
		</div>
		<?php foreach ($posts as $post): ?>
			<div class="fn-post-row">
				<div>
					<?php echo anchor('sim/viewpost/'.$post['id'], $post['title'], array('class' => 'fn-post-title'));?>
					<span class="fn-post-by">
						<?php echo $label['by'].' '.$post['author'];?> &middot;
						<?php echo $label['mission'];?> <?php echo anchor('sim/missions/id/'.$post['mission_id'], $post['mission']);?>
					</span>
				</div>
				<div class="fn-post-cell"><?php echo $post['timline'];?></div>
				<div class="fn-post-cell"><?php echo $post['location'];?></div>
				<div class="fn-post-cell"><?php echo $post['date'];?></div>
			</div>
		<?php endforeach;?>
	<?php else: ?>
		<div class="fn-post-empty"><p class="fn-card-excerpt"><?php echo $label['noposts'];?></p></div>
	<?php endif;?>
</div>

<?php if (isset($posts)): ?>
	<div class="fn-post-pagination"><?php echo $pagination;?></div>
<?php endif;?>
