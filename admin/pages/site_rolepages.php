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
		<p><?php echo anchor('site/rolepagegroups', img($images['groups']) .' '. $label['groups'], array('class' => 'fn-usr-link image'));?></p>
		<p>
			<a href="#" rel="facebox" class="fn-usr-link image" myAction="add">
				<?php echo img($images['add']) .' '. $label['add'];?>
			</a>
		</p>
	</div>

	<?php if (isset($pages)): ?>
		<?php foreach ($pages['groups'] as $group): ?>
			<?php echo text_output($group['name'], 'h3', 'fn-set-sub');?>

			<div class="fn-usr-list">
				<div class="fn-usr-row fn-usr-row-head">
					<div><?php echo $label['name'];?></div>
					<div><?php echo $label['url'];?></div>
					<div></div>
				</div>
				<?php foreach ($group['pages'] as $page): ?>
					<div class="fn-usr-row">
						<div class="fn-usr-main">
							<span class="fn-usr-name"><?php echo $page['name'];?></span>
							<?php if (!empty($page['desc'])): ?>
								<span class="fn-usr-sub">
									<a href="#" rel="tooltip" title="<?php echo $page['desc'];?>">[?]</a>
								</span>
							<?php endif;?>
						</div>
						<div class="fn-usr-aux"><?php echo $page['url'];?></div>
						<div class="fn-usr-actions">
							<a href="#" rel="facebox" class="delete image" title="<?php echo $label['delete'];?>" myID="<?php echo $page['id'];?>" myAction="delete"><?php echo img($images['delete']);?></a>
							<a href="#" rel="facebox" class="edit image" title="<?php echo $label['edit'];?>" myID="<?php echo $page['id'];?>" myAction="edit"><?php echo img($images['edit']);?></a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach;?>
	<?php endif; ?>
</div>
