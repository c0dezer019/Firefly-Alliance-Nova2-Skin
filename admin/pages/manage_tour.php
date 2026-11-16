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
		<?php if (Auth::check_access('site/tourform', false)): ?>
			<?php echo anchor('site/tourform', $label['form']);?>
		<?php endif;?>
		<?php echo anchor('manage/tour/add', $label['add']);?>
	</div>

	<?php if (isset($items)): ?>
		<?php foreach ($items as $key => $value): ?>
			<div class="fn-mg-panel fn-st-list">
				<div class="fn-mg-panel-title"><?php echo $value;?></div>

				<?php if (isset($tour[$key])): ?>
					<?php foreach ($tour[$key] as $t): ?>
						<div class="fn-mg-row">
							<div class="fn-mg-main">
								<span class="fn-st-name"><?php echo $t['name'];?></span>
								<div class="fn-mg-desc"><strong><?php echo $label['summary'];?></strong> <?php echo $t['summary'];?></div>
							</div>
							<div class="fn-mg-actions">
								<?php echo anchor('manage/tour/edit/'. $t['id'], ucfirst(lang('actions_edit')), array('class' => 'fn-mg-btn'));?>
								<a href="#" myAction="delete" myID="<?php echo $t['id'];?>" rel="facebox" class="fn-mg-btn fn-mg-btn-danger"><?php echo ucfirst(lang('actions_delete'));?></a>
							</div>
						</div>
					<?php endforeach;?>
				<?php else: ?>
					<div class="fn-mg-empty"><?php echo $label['no_tour'];?></div>
				<?php endif;?>
			</div>
		<?php endforeach;?>
		<?php echo form_open().form_close();?>
	<?php else: ?>
		<div class="fn-st-empty"><?php echo $label['no_tour'];?></div>
	<?php endif; ?>
</div>
