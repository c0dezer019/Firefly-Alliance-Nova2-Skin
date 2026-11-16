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
		<?php echo anchor('site/bioform', $label['bioform']);?>
		<?php echo anchor('site/biosections', $label['biosections']);?>
		<a href="#" class="fn-set-add" rel="facebox" myAction="add"><span class="fn-set-plus">+</span><?php echo $label['addtab'];?></a>
	</div>

	<?php if (isset($tabs)): ?>
		<div class="fn-site-list">
			<?php foreach ($tabs as $tab): ?>
				<div class="fn-site-row">
					<div class="fn-site-main">
						<div class="fn-site-name">
							<?php if ($tab['display'] == 'n'): ?>
								<span class="fn-site-badge"><?php echo $label['off'];?></span>
							<?php endif;?>
							<?php echo $tab['name'];?>
						</div>
					</div>
					<div class="fn-site-actions">
						<a href="#" rel="facebox" class="edit" myAction="edit" myID="<?php echo $tab['id'];?>" title="<?php echo $label['edit'];?>"><?php echo $label['edit'];?></a>
						<a href="#" rel="facebox" class="delete" myAction="delete" myID="<?php echo $tab['id'];?>" title="<?php echo $label['delete'];?>"><?php echo $label['delete'];?></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>
