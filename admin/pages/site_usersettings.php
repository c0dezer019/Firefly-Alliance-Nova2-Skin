<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set">
	<p class="fn-set-manage"><?php echo anchor('site/settings', $label['back']);?></p>

	<div class="fn-set-intro"><?php echo text_output($text);?></div>

	<p class="fn-set-manage">
		<a href="#" class="fn-set-add" rel="facebox" myAction="add"><span class="fn-set-plus">+</span><?php echo $label['add'];?></a>
	</p>

	<?php if (isset($settings)): ?>
		<div class="fn-set-list">
			<div class="fn-set-list-head"><?php echo $label['name'];?></div>
			<?php foreach ($settings as $k => $v): ?>
				<div class="fn-set-list-row">
					<span class="fn-set-list-name"><?php echo $v;?></span>
					<span class="fn-set-list-actions">
						<a href="#" class="edit" rel="facebox" myID="<?php echo $k;?>" myAction="edit" title="<?php echo $label['edit'];?>"><?php echo $label['edit'];?></a>
						<a href="#" class="delete" rel="facebox" myID="<?php echo $k;?>" myAction="delete" title="<?php echo $label['delete'];?>"><?php echo $label['delete'];?></a>
					</span>
				</div>
			<?php endforeach; ?>
		</div>
	<?php else: ?>
		<div class="fn-set-empty"><?php echo $label['no_settings'];?></div>
	<?php endif; ?>
</div>
