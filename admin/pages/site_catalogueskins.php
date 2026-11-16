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

	<?php if (count($uninstalled) > 0): ?>
		<h3 class="fn-site-group"><?php echo $label['install_skins'];?></h3>
		<p class="fn-site-hint"><?php echo $label['quick_install'];?></p>

		<div class="fn-site-list">
			<?php foreach ($uninstalled as $u): ?>
				<div class="fn-site-row">
					<div class="fn-site-main">
						<div class="fn-site-name"><?php echo $u;?></div>
						<div class="fn-site-sub">application/views/<?php echo $u;?></div>
					</div>
					<div class="fn-site-actions">
						<?php echo form_open('site/catalogueskins/install');?>
							<?php echo form_hidden('install_skin', $u);?>
							<?php echo form_button($buttons['install']);?>
						<?php echo form_close();?>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	<?php endif;?>

	<div class="fn-site-links">
		<a href="#" class="fn-set-add" rel="facebox" myAction="add" mySec="skin"><span class="fn-set-plus">+</span><?php echo $label['addskin'];?></a>
		<a href="#" class="fn-set-add" rel="facebox" myAction="add" mySec="section"><span class="fn-set-plus">+</span><?php echo $label['addskinsec'];?></a>
	</div>

	<?php if (isset($catalogue)): ?>
		<?php foreach ($catalogue as $c): ?>
			<div class="fn-site-list">
				<div class="fn-site-row is-parent">
					<div class="fn-site-main">
						<div class="fn-site-name"><?php echo $c['name'];?></div>
						<div class="fn-site-sub"><?php echo $label['location'] .' '. APPFOLDER .'/views/'. $c['location'];?></div>
					</div>
					<div class="fn-site-actions">
						<a href="#" rel="facebox" class="edit" myAction="edit" myID="<?php echo $c['id'];?>" mySec="skin" title="<?php echo $label['edit'];?>"><?php echo $label['edit'];?></a>
						<a href="#" rel="facebox" class="delete" myAction="delete" myID="<?php echo $c['id'];?>" mySec="skin" title="<?php echo $label['delete'];?>"><?php echo $label['delete'];?></a>
					</div>
				</div>

				<?php if (isset($c['sec'])): ?>
					<?php foreach ($c['sec'] as $sec): ?>
						<div class="fn-site-row is-child">
							<div class="fn-site-main">
								<div class="fn-site-name">
									<?php if ($sec['default'] == 'y'): ?>
										<span class="fn-site-default">&#9733;</span>
									<?php endif;?>
									<?php echo ucfirst($sec['name']);?>
								</div>
							</div>
							<div class="fn-site-status fn-site-status-<?php echo $sec['status'];?>"><?php echo ucfirst($sec['status']);?></div>
							<div class="fn-site-actions">
								<a href="#" rel="facebox" class="edit" myAction="edit" myID="<?php echo $sec['id'];?>" mySec="section" title="<?php echo $label['edit'];?>"><?php echo $label['edit'];?></a>
								<a href="#" rel="facebox" class="delete" myAction="delete" myID="<?php echo $sec['id'];?>" mySec="section" title="<?php echo $label['delete'];?>"><?php echo $label['delete'];?></a>
							</div>
						</div>
					<?php endforeach;?>
				<?php endif;?>
			</div>
		<?php endforeach;?>
	<?php else: ?>
		<div class="fn-set-empty"><?php echo $label['no_skins'];?></div>
	<?php endif;?>
</div>
