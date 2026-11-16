<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/* One menu item row (name, off flag, url, edit/delete). */
$render_item = function ($i) use ($label) { ?>
	<div class="fn-site-row">
		<div class="fn-site-main">
			<div class="fn-site-name">
				<?php if ($i['display'] == 'n'): ?>
					<span class="fn-site-badge"><?php echo $label['off'];?></span>
				<?php endif;?>
				<?php echo $i['name'];?>
			</div>
			<div class="fn-site-sub"><?php echo $label['url'] .' '. $i['link'];?></div>
		</div>
		<div class="fn-site-actions">
			<a href="#" rel="facebox" class="edit" myAction="edit" myID="<?php echo $i['id'];?>"><?php echo $label['edit'];?></a>
			<a href="#" rel="facebox" class="delete" myAction="delete" myID="<?php echo $i['id'];?>"><?php echo $label['delete'];?></a>
		</div>
	</div>
<?php };
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-site">
	<div class="fn-set-intro"><?php echo text_output($text);?></div>

	<div class="fn-site-links">
		<?php echo anchor('site/menucats', $label['cats']);?>
		<a href="#" class="fn-set-add" rel="facebox" myAction="add"><span class="fn-set-plus">+</span><?php echo $label['add'];?></a>
	</div>

	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['nav_main'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['nav_sub'];?></span></a></li>
			<li><a href="#three"><span><?php echo $label['nav_adminsub'];?></span></a></li>
		</ul>

		<div id="one">
			<?php if (isset($menus['main'])): ?>
				<div class="fn-site-list">
					<?php foreach ($menus['main'] as $main): ?>
						<?php $render_item($main);?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<div id="two">
			<?php if (isset($menus['sub'])): ?>
				<?php foreach ($menus['sub'] as $sub): ?>
					<h3 class="fn-site-group"><?php echo $sub['category'];?></h3>
					<div class="fn-site-list">
						<?php foreach ($sub['items'] as $s): ?>
							<?php $render_item($s);?>
						<?php endforeach;?>
					</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>

		<div id="three">
			<?php if (isset($menus['adminsub'])): ?>
				<?php foreach ($menus['adminsub'] as $admin): ?>
					<h3 class="fn-site-group"><?php echo $admin['category'];?></h3>
					<div class="fn-site-list">
						<?php foreach ($admin['items'] as $a): ?>
							<?php $render_item($a);?>
						<?php endforeach;?>
					</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>
	</div>
</div>
