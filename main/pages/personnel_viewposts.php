<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">任务日志 · POSTS</span>
</div>

<?php if (isset($msg_error)): ?>
	<p class="fn-card-excerpt"><?php echo $msg_error;?></p>
<?php endif;?>

<?php if (isset($posts)): ?>
	<p class="fn-per-back"><?php echo anchor('personnel/character/'.$charid, $label['backchar']);?></p>
	<p class="fn-post-caption"><?php echo $display;?></p>
	<div class="fn-post-pagination"><?php echo $pagination;?></div>
	<div class="fn-post-panel">
		<div class="fn-post-row fn-post-row-head"><div><?php echo $label['title'];?></div><div><?php echo $label['mission'];?></div><div></div><div></div></div>
		<?php foreach ($posts as $post): ?>
			<div class="fn-post-row">
				<div><?php echo anchor('sim/viewpost/'.$post['id'], $post['title'], array('class' => 'fn-post-title'));?><span class="fn-post-by"><?php echo $label['on'].' '.$post['date'];?></span></div>
				<div class="fn-post-cell"><?php echo anchor('sim/missions/id/'.$post['mission_id'], $post['mission']);?></div>
				<div></div>
				<div></div>
			</div>
		<?php endforeach;?>
	</div>
	<div class="fn-post-pagination"><?php echo $pagination;?></div>
<?php elseif (isset($char)): ?>
	<p class="fn-per-back"><?php echo anchor('personnel/user/'.$user.'/4', $label['backuser']);?></p>
	<?php foreach ($char as $c): ?>
		<div class="fn-per-subhead"><?php echo $c['character'];?></div>
		<?php if (isset($c['posts'])): ?>
			<div class="fn-post-panel">
				<?php foreach ($c['posts'] as $post): ?>
					<div class="fn-post-row">
						<div><?php echo anchor('sim/viewpost/'.$post['id'], $post['title'], array('class' => 'fn-post-title'));?><span class="fn-post-by"><?php echo $label['on'].' '.$post['date'];?></span></div>
						<div class="fn-post-cell"><?php echo anchor('sim/missions/id/'.$post['mission_id'], $post['mission']);?></div>
						<div></div>
						<div></div>
					</div>
				<?php endforeach;?>
			</div>
		<?php else: ?>
			<p class="fn-card-excerpt"><?php echo $label['noposts'];?></p>
		<?php endif;?>
	<?php endforeach;?>
<?php endif;?>
