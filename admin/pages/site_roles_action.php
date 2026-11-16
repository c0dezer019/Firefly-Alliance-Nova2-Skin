<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-usr">
	<p class="fn-set-manage"><?php echo anchor('site/roles', $label['back']);?></p>

	<div class="fn-set-intro"><?php echo text_output($text);?></div>

	<?php if (isset($pages)): ?>
		<?php echo form_open('site/roles/'. $action .'/'. $id);?>
			<div class="fn-usr-grid">
				<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
				<?php echo form_input($inputs['name']);?>

				<kbd class="fn-set-label"><?php echo $label['desc'];?></kbd>
				<?php echo form_textarea($inputs['desc']);?>
			</div>

			<?php echo text_output($label['pages'], 'h3', 'fn-set-section');?>

			<?php foreach ($pages['group'] as $group): ?>
				<?php echo text_output($group['group'], 'h4', 'fn-set-sub');?>

				<div class="fn-usr-perms">
					<?php foreach ($group['pages'] as $page): ?>
						<div class="fn-usr-perm">
							<?php echo form_checkbox('page_'. $page['id'], $page['id'], $page['checked'], 'id="page_'. $page['id'] .'"');?>
							<label for="page_<?php echo $page['id'];?>">
								<span class="fn-usr-name"><?php echo $page['name'];?></span>
								<span class="fn-usr-sub">
									<?php echo $page['url'];?>
									<?php if (!empty($page['desc'])): ?>
										<a href="#" rel="tooltip" title="<?php echo $page['desc'];?>">[?]</a>
									<?php endif;?>
								</span>
							</label>
						</div>
					<?php endforeach;?>
				</div>
			<?php endforeach;?>

			<div class="fn-set-actions fn-usr-act"><?php echo form_button($button_submit);?></div>
		<?php echo form_close();?>
	<?php endif;?>
</div>
