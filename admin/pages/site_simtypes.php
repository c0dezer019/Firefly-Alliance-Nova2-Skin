<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-site">
	<div class="fn-set-intro"><?php echo text_output($text);?></div>

	<p class="fn-set-manage">
		<a href="#" class="addtoggle fn-set-add"><span class="fn-set-plus">+</span><?php echo $label['add'];?></a>
	</p>

	<div class="addtype fn-site-panel hidden">
		<?php echo form_open('site/simtypes/add');?>
			<div class="fn-set-grid wide">
				<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
				<?php echo form_input($inputs['name']);?>
			</div>
			<div class="fn-set-actions"><?php echo form_button($buttons['add']);?></div>
		<?php echo form_close();?>
	</div>

	<?php if (isset($types)): ?>
		<?php echo form_open('site/simtypes/edit');?>
			<div class="fn-site-list">
				<?php foreach ($types as $t): ?>
					<div class="fn-site-type">
						<div class="fn-site-main">
							<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
							<?php echo form_input($t['name']);?>
						</div>
						<div class="fn-site-del">
							<?php echo form_label($label['delete'], $t['id'] .'_id');?>?
							<?php echo form_checkbox($t['delete']);?>
						</div>
					</div>
				<?php endforeach;?>
			</div>
			<div class="fn-set-actions"><?php echo form_button($buttons['update']);?></div>
		<?php echo form_close();?>
	<?php endif;?>
</div>
