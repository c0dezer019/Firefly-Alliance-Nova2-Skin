<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<?php echo text_output($label['header_posts'], 'h2', 'page-subhead');?>

<?php if (isset($entries)): ?>
	<?php if ($pagination): ?>
		<div class="fn-log-pagination fn-manage-pagination"><?php echo $pagination;?></div>
	<?php endif;?>

	<div class="fn-log-panel">
		<?php foreach ($entries as $e): ?>
			<div class="fn-log-row fn-manage-row">
				<div class="fn-log-title-cell">
					<span class="fn-log-title"><?php echo $e['title'];?></span>
					<div class="fn-log-date"><?php echo $label['by'] .' '. $e['author'];?></div>
					<div class="fn-log-date"><?php echo $label['mission'];?>: <?php echo $e['mission'];?></div>
					<div class="fn-log-date"><?php echo $label['date'];?>: <?php echo $e['date'];?></div>
				</div>
				<div class="fn-manage-actions">
					<?php echo anchor('sim/viewpost/'. $e['id'], img($images['view']), array('class' => 'image'));?>
					<?php if ($e['status'] == 'pending'): ?>
						<a href="#" rel="facebox" class="image" myAction="approve" myID="<?php echo $e['id'];?>" myPage="<?php echo $page;?>" myStatus="<?php echo $status;?>">
							<?php echo img($images['approve']);?>
						</a>
					<?php endif;?>
					<a href="#" rel="facebox" class="image" myAction="delete" myID="<?php echo $e['id'];?>" myPage="<?php echo $page;?>" myStatus="<?php echo $status;?>">
						<?php echo img($images['delete']);?>
					</a>
					<?php echo anchor('manage/posts/edit/'. $e['id'], img($images['edit']), array('class' => 'image'));?>
				</div>
			</div>
		<?php endforeach;?>
	</div>

	<?php if ($pagination): ?>
		<div class="fn-log-pagination fn-manage-pagination"><?php echo $pagination;?></div>
	<?php endif;?>
<?php else: ?>
	<div class="fn-log-empty"><?php echo text_output($label['error_posts'], 'h3', 'orange');?></div>
<?php endif;?>
