<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * Shared table renderer. $items = list of rows (name/posts/logs/news/lastpost/class),
 * $attrs = extra <table> attributes (class/id the quicksearch JS binds to),
 * $highlight = row class from controller applies (active lists only).
 */
$render_table = function ($items, $attrs, $highlight) use ($label) { ?>
	<table class="fn-rpt-table <?php echo $attrs['class'];?>"<?php echo ! empty($attrs['id']) ? ' id="'.$attrs['id'].'"' : '';?>>
		<thead>
			<tr>
				<th><?php echo $label['name'];?></th>
				<th class="c"><?php echo $label['posts'];?></th>
				<th class="c"><?php echo $label['logs'];?></th>
				<th class="c"><?php echo $label['news'];?></th>
				<th class="c"><?php echo $label['total'];?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($items as $u): ?>
			<tr<?php echo ($highlight && ! empty($u['class'])) ? ' class="'.$u['class'].'"' : '';?>>
				<td class="main">
					<?php echo text_output($u['name'], 'span', 'fn-rpt-name');?>

					<?php if (isset($u['lastpost']) && ($u['posts'] > 0 || $u['logs'] > 0)): ?>
						<span class="fn-rpt-sub">
							<?php echo text_output($label['lastpost'], 'strong') .': '. $u['lastpost'];?>
						</span>
					<?php endif;?>
				</td>
				<td class="c num"><?php echo $u['posts'];?></td>
				<td class="c num"><?php echo $u['logs'];?></td>
				<td class="c num"><?php echo $u['news'];?></td>
				<td class="c num"><?php echo $u['posts'] + $u['logs'] + $u['news'];?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
<?php };
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div id="loader" class="fn-loader">
	<?php echo img($images['loading']);?>
	<?php echo text_output($label['loading'], 'h3', 'gray');?>
</div>

<div id="loaded" class="hidden fn-admin-dash">
	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['users'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['char_active'];?></span></a></li>
			<li><a href="#three"><span><?php echo $label['char_npc'];?></span></a></li>
			<li><a href="#four"><span><?php echo $label['char_inactive'];?></span></a></li>
		</ul>

		<div id="one">
			<?php if (isset($users)): ?>
				<?php if (isset($users['active'])): ?>
					<h3 class="fn-rpt-subhead"><?php echo $label['users_active'];?></h3>

					<div class="search fn-rpt-search"></div>

					<?php $render_table($users['active'], array('class' => 'search_users'), true);?>
				<?php endif;?>

				<?php if (isset($users['inactive'])): ?>
					<h3 class="fn-rpt-subhead"><?php echo $label['users_inactive'];?></h3>

					<?php $render_table($users['inactive'], array('class' => 'search_users'), false);?>
				<?php endif;?>
			<?php else: ?>
				<div class="fn-rpt-empty"><?php echo $label['no_users'];?></div>
			<?php endif;?>
		</div>

		<div id="two">
			<?php if (isset($characters['active'])): ?>
				<h3 class="fn-rpt-subhead"><?php echo $label['char_active'];?></h3>

				<div class="search_active fn-rpt-search"></div>

				<?php $render_table($characters['active'], array('class' => '', 'id' => 'search_active'), true);?>
			<?php else: ?>
				<div class="fn-rpt-empty"><?php echo $label['no_characters'];?></div>
			<?php endif;?>
		</div>

		<div id="three">
			<?php if (isset($characters['npc'])): ?>
				<h3 class="fn-rpt-subhead"><?php echo $label['char_npc'];?></h3>

				<div class="search_npc fn-rpt-search"></div>

				<?php $render_table($characters['npc'], array('class' => '', 'id' => 'search_npc'), false);?>
			<?php else: ?>
				<div class="fn-rpt-empty"><?php echo $label['no_characters'];?></div>
			<?php endif;?>
		</div>

		<div id="four">
			<?php if (isset($characters['inactive'])): ?>
				<h3 class="fn-rpt-subhead"><?php echo $label['char_inactive'];?></h3>

				<div class="search_inactive fn-rpt-search"></div>

				<?php $render_table($characters['inactive'], array('class' => '', 'id' => 'search_inactive'), false);?>
			<?php else: ?>
				<div class="fn-rpt-empty"><?php echo $label['no_characters'];?></div>
			<?php endif;?>
		</div>
	</div>
</div>
