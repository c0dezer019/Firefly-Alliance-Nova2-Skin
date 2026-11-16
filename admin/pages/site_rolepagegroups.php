<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-usr">
	<div class="fn-set-intro"><?php echo text_output($text);?></div>

	<div class="fn-usr-links">
		<p><?php echo anchor('site/roles', img($images['roles']) .' '. $label['roles'], array('class' => 'fn-usr-link image'));?></p>
		<p><?php echo anchor('site/rolepages', img($images['pages']) .' '. $label['pages'], array('class' => 'fn-usr-link image'));?></p>
		<p>
			<a href="#" rel="facebox" class="fn-usr-link image" myAction="add">
				<?php echo img($images['add']) .' '. $label['add'];?>
			</a>
		</p>
	</div>

	<?php if (isset($groups)): ?>
		<div class="fn-usr-list">
			<div class="fn-usr-row fn-usr-row-head fn-usr-row-simple">
				<div><?php echo $label['group'];?></div>
				<div></div>
			</div>
			<?php foreach ($groups as $group): ?>
				<div class="fn-usr-row fn-usr-row-simple">
					<div class="fn-usr-main"><?php echo $group['name'];?></div>
					<div class="fn-usr-actions">
						<a href="#" rel="facebox" class="delete image" title="<?php echo $label['delete'];?>" myID="<?php echo $group['id'];?>" myAction="delete"><?php echo img($images['delete']);?></a>
						<a href="#" rel="facebox" class="edit image" title="<?php echo $label['edit'];?>" myID="<?php echo $group['id'];?>" myAction="edit"><?php echo img($images['edit']);?></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>
