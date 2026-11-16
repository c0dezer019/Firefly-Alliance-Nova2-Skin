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
		<p><?php echo anchor('site/rolepages', img($images['pages']) .' '. $label['manage_pages'], array('class' => 'fn-usr-link image'));?></p>
		<p><?php echo anchor('site/roles/add', img($images['add']) .' '. $label['add'], array('class' => 'fn-usr-link image'));?></p>
		<p><a href="#" rel="facebox" class="fn-usr-link image" title="<?php echo $label['duplicate'];?>" myAction="duplicate"><?php echo img($images['add']) .' '. $label['duplicate_role'];?></a></p>
	</div>

	<?php if (isset($roles)): ?>
		<div class="fn-usr-list">
			<div class="fn-usr-row fn-usr-row-head">
				<div><?php echo $label['name'];?></div>
				<div><?php echo $label['desc'];?></div>
				<div></div>
			</div>
			<?php foreach ($roles as $key => $value): ?>
				<div class="fn-usr-row">
					<div class="fn-usr-main"><strong class="fn-usr-name"><?php echo $value['name'];?></strong></div>
					<div class="fn-usr-aux"><?php echo $value['desc'];?></div>
					<div class="fn-usr-actions">
						<a href="#" rel="facebox" class="image" title="<?php echo $label['view'];?>" myID="<?php echo $value['id'];?>" myAction="view"><?php echo img($images['view']);?></a>
						<a href="#" rel="facebox" class="delete image" title="<?php echo $label['delete'];?>" myID="<?php echo $value['id'];?>" myAction="delete"><?php echo img($images['delete']);?></a>
						<?php echo anchor('site/roles/edit/'. $value['id'], img($images['edit']), array('class' => 'image', 'title' => $label['edit']));?>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	<?php endif;?>
</div>
