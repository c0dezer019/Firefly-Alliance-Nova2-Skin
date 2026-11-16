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

	<?php if (isset($uninstalled) && count($uninstalled) > 0): ?>
		<h3 class="fn-site-group"><?php echo $label['install_ranks'];?></h3>
		<p class="fn-site-hint"><?php echo $label['quick_install'];?></p>

		<div class="fn-site-list">
			<?php foreach ($uninstalled as $u): ?>
				<div class="fn-site-row">
					<div class="fn-site-main">
						<div class="fn-site-name"><?php echo ucfirst($u);?></div>
						<div class="fn-site-sub">assets/common/<?php echo GENRE;?>/ranks/<?php echo $u;?></div>
					</div>
					<div class="fn-site-actions">
						<?php echo form_open('site/catalogueranks/install');?>
							<?php echo form_hidden('install_rank', $u);?>
							<?php echo form_button($buttons['install']);?>
						<?php echo form_close();?>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	<?php endif;?>

	<p class="fn-set-manage">
		<a href="#" class="fn-set-add" rel="facebox" myAction="add"><span class="fn-set-plus">+</span><?php echo $label['add'];?></a>
	</p>

	<?php if (isset($catalogue)): ?>
		<div class="fn-site-list">
			<div class="fn-site-row fn-site-head">
				<span class="fn-site-main"><?php echo $label['name'];?></span>
				<span class="fn-site-status"><?php echo $label['status'];?></span>
				<span class="fn-site-actions"></span>
			</div>
			<?php foreach ($catalogue as $c): ?>
				<div class="fn-site-row">
					<div class="fn-site-main">
						<div class="fn-site-name">
							<?php if ($c['default'] == 'y'): ?>
								<span class="fn-site-default">&#9733;</span>
							<?php endif;?>
							<?php echo $c['name'];?>
						</div>
						<div class="fn-site-sub"><?php echo $label['location'] .' '. APPFOLDER .'/assets/common/'. GENRE .'/ranks/'. $c['location'];?></div>
					</div>
					<div class="fn-site-status fn-site-status-<?php echo $c['status'];?>"><?php echo ucfirst($c['status']);?></div>
					<div class="fn-site-actions">
						<a href="#" rel="facebox" class="edit" myAction="edit" myID="<?php echo $c['id'];?>" title="<?php echo $label['edit'];?>"><?php echo $label['edit'];?></a>
						<a href="#" rel="facebox" class="delete" myAction="delete" myID="<?php echo $c['id'];?>" title="<?php echo $label['delete'];?>"><?php echo $label['delete'];?></a>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	<?php else: ?>
		<div class="fn-set-empty"><?php echo $label['no_ranks'];?></div>
	<?php endif;?>
</div>
