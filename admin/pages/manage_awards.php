<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<p class="fn-mg-add"><?php echo anchor('manage/awards/add', $label['addaward'], array('class' => 'fn-mg-btn fn-mg-btn-add'));?></p>

	<?php if (isset($awards)): ?>
		<div class="fn-log-panel">
			<?php foreach ($awards as $a): ?>
				<div class="fn-log-row fn-manage-row fn-mc-row-thumb">
					<div class="fn-mc-thumb"><?php echo img($a['img']);?></div>
					<div class="fn-log-title-cell">
						<span class="fn-log-title"><?php echo $a['name'];?></span>
						<div class="fn-mc-desc"><?php echo text_output($a['desc']);?></div>
					</div>
					<div class="fn-manage-actions">
						<a href="#" myAction="delete" myID="<?php echo $a['id'];?>" rel="facebox" class="image"><?php echo img($images['delete']);?></a>
						<?php echo anchor('manage/awards/edit/'. $a['id'], img($images['edit']), array('class' => 'image'));?>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	<?php else: ?>
		<div class="fn-log-empty"><?php echo text_output($label['noawards'], 'h3', 'orange');?></div>
	<?php endif;?>
</div>
