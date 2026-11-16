<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $label['sitemanifests'];?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-site">
	<div class="fn-set-intro"><?php echo text_output($text);?></div>

	<div class="fn-site-links">
		<a href="#" id="add" class="fn-set-add"><span class="fn-set-plus">+</span><?php echo $label['add'];?></a>
		<?php echo anchor('site/manifests/assign', $label['assign']);?>
	</div>

	<div id="add-panel" class="fn-site-panel hidden">
		<?php echo form_open('site/manifests/add');?>
			<div class="fn-set-grid wide">
				<kbd class="fn-set-label"><?php echo $label['manifest_name'];?></kbd>
				<?php echo form_input($inputs['name']);?>

				<kbd class="fn-set-label"><?php echo $label['manifest_order'];?></kbd>
				<?php echo form_input($inputs['order']);?>

				<kbd class="fn-set-label"><?php echo $label['manifest_desc'];?></kbd>
				<?php echo form_textarea($inputs['desc']);?>

				<kbd class="fn-set-label"><?php echo $label['manifest_header'];?></kbd>
				<?php echo form_textarea($inputs['header']);?>

				<kbd class="fn-set-label"><?php echo $label['manifest_view'];?></kbd>
				<?php echo form_dropdown('manifest_view', $values['manifest'], '');?>

				<kbd class="fn-set-label"><?php echo $label['manifest_metadata'];?></kbd>
				<div>
					<?php echo form_input($inputs['metadata']);?>
					<p class="fn-site-hint"><?php echo $label['metadata_explain'];?></p>
				</div>
			</div>

			<div class="fn-set-actions"><?php echo form_button($inputs['button']);?></div>
		<?php echo form_close();?>
	</div>

	<?php if (isset($manifests)): ?>
		<div class="fn-site-list">
			<?php foreach ($manifests as $m): ?>
				<div class="fn-site-row">
					<div class="fn-site-main">
						<div class="fn-site-name">
							<?php if ($m['display'] == 'n'): ?>
								<span class="fn-site-badge"><?php echo $label['off'];?></span>
							<?php endif;?>
							<?php echo $m['name'];?>
						</div>
						<div class="fn-site-sub"><?php echo $m['desc'];?></div>
					</div>
					<div class="fn-site-actions">
						<a href="#" rel="facebox" class="edit" myAction="edit" myID="<?php echo $m['id'];?>"><?php echo ucfirst(lang('actions_edit'));?></a>
						<a href="#" rel="facebox" class="delete" myAction="delete" myID="<?php echo $m['id'];?>"><?php echo ucfirst(lang('actions_delete'));?></a>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	<?php endif;?>
</div>
