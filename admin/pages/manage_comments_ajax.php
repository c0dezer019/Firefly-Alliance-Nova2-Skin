<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<?php echo text_output($label[$subheader], 'h2', 'page-subhead');?>

<?php if (isset($entries)): ?>
	<div class="fn-log-panel">
		<?php foreach ($entries as $e): ?>
			<div class="fn-log-row fn-manage-row fn-mc-row-comment">
				<div class="fn-log-title-cell">
					<span class="fn-log-title"><?php echo $e['author'];?></span>
					<div class="fn-log-date"><?php echo $e['source'];?></div>
					<div class="fn-log-date"><?php echo $label['on'] .' '. $e['date'];?></div>
				</div>
				<div class="fn-mc-comment-body"><?php echo $e['content'];?></div>
				<div class="fn-manage-actions">
					<?php if ($e['status'] == 'pending'): ?>
						<a href="#" rel="facebox" class="image" myAction="approve" myID="<?php echo $e['id'];?>" myType="<?php echo $type;?>_comment"><?php echo img($images['approve']);?></a>
					<?php endif;?>
					<a href="#" rel="facebox" class="image" myAction="delete" myID="<?php echo $e['id'];?>" myType="<?php echo $type;?>" myStatus="<?php echo $status;?>" myPage="<?php echo $page;?>">
						<?php echo img($images['delete']);?>
					</a>
					<a href="#" rel="facebox" class="image" myAction="edit" myID="<?php echo $e['id'];?>" myType="<?php echo $type;?>" myStatus="<?php echo $status;?>" myPage="<?php echo $page;?>">
						<?php echo img($images['edit']);?>
					</a>
				</div>
			</div>
		<?php endforeach;?>
	</div>

	<?php if ($pagination): ?>
		<div class="fn-log-pagination fn-manage-pagination"><?php echo $pagination;?></div>
	<?php endif;?>
<?php else: ?>
	<div class="fn-log-empty"><?php echo text_output($label['error'], 'h3', 'orange');?></div>
<?php endif;?>
