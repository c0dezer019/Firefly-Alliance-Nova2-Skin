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
		<?php echo anchor('site/biotabs', $label['biotabs']);?>
		<?php echo anchor('site/biosections', $label['biosections']);?>
		<a href="#" class="fn-set-add" rel="facebox" myAction="add"><span class="fn-set-plus">+</span><?php echo $label['biofield'];?></a>
	</div>

	<?php if (isset($join)): ?>
		<?php foreach ($join as $a): ?>
			<h3 class="fn-site-group"><?php echo $a['name'];?></h3>

			<?php if (isset($a['fields'])): ?>
				<div class="fn-site-list">
					<?php foreach ($a['fields'] as $f): ?>
						<div class="fn-site-field">
							<div class="fn-site-field-label">
								<?php echo $f['field_label'];?>
								<?php if ($f['display'] == 'n'): ?>
									<span class="fn-site-badge"><?php echo $label['off'];?></span>
								<?php endif;?>
							</div>
							<div class="fn-site-field-input"><?php echo $f['input'];?></div>
							<div class="fn-site-actions">
								<?php echo anchor('site/bioform/edit/'. $f['id'], ucfirst(lang('actions_edit')), array('class' => 'edit'));?>
								<a href="#" rel="facebox" class="delete" myAction="delete" myID="<?php echo $f['id'];?>"><?php echo ucfirst(lang('actions_delete'));?></a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php else: ?>
				<div class="fn-set-empty"><?php echo $label['nofields'];?></div>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php else: ?>
		<div class="fn-set-empty"><?php echo $label['nofields'];?></div>
	<?php endif; ?>
</div>
