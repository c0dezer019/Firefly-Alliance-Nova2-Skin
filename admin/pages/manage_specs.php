<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-struct">
	<div class="fn-st-intro"><?php echo text_output($text);?></div>

	<div class="fn-st-links">
		<?php if (Auth::check_access('site/specsform', false)): ?>
			<?php echo anchor('site/specsform', $label['form']);?>
		<?php endif;?>
		<?php echo anchor('manage/specs/add', $label['add']);?>
	</div>

	<?php if (isset($specs)): ?>
		<div class="fn-mg-panel fn-st-list">
			<?php foreach ($specs as $s): ?>
				<div class="fn-mg-row">
					<div class="fn-mg-main">
						<span class="fn-st-name"><?php echo $s['name'];?></span>
						<div class="fn-mg-desc"><strong><?php echo $label['summary'];?></strong> <?php echo $s['summary'];?></div>
					</div>
					<div class="fn-mg-actions">
						<?php echo anchor('manage/specs/edit/'. $s['id'], ucfirst(lang('actions_edit')), array('class' => 'fn-mg-btn'));?>
						<a href="#" myAction="delete" myID="<?php echo $s['id'];?>" rel="facebox" class="fn-mg-btn fn-mg-btn-danger"><?php echo ucfirst(lang('actions_delete'));?></a>
					</div>
				</div>
			<?php endforeach;?>
		</div>
		<?php echo form_open().form_close();?>
	<?php else: ?>
		<div class="fn-st-empty"><?php echo $label['no_specs'];?></div>
	<?php endif;?>
</div>
