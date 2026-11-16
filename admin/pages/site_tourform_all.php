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

	<div class="fn-site-links">
		<a href="#" class="fn-set-add" rel="facebox" myAction="add"><span class="fn-set-plus">+</span><?php echo $label['add'];?></a>
	</div>

	<?php if (isset($tour)): ?>
		<div class="fn-site-list">
			<?php foreach ($tour as $t): ?>
				<div class="fn-site-field">
					<div class="fn-site-field-label">
						<?php echo $t['label'];?>
						<?php if ($t['display'] == 'n'): ?>
							<span class="fn-site-badge"><?php echo $label['off'];?></span>
						<?php endif;?>
					</div>
					<div class="fn-site-field-input"><?php echo $t['input'];?></div>
					<div class="fn-site-actions">
						<?php echo anchor('site/tourform/edit/'. $t['id'], ucfirst(lang('actions_edit')), array('class' => 'edit'));?>
						<a href="#" rel="facebox" class="delete" myAction="delete" myID="<?php echo $t['id'];?>"><?php echo ucfirst(lang('actions_delete'));?></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>
