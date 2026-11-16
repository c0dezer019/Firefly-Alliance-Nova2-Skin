<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * Renders one mission row. $show_view adds the view link,
 * $show_posts adds the post count line (current missions only).
 */
$render_mission = function ($i, $show_view, $show_posts) use ($images, $label) { ?>
	<div class="fn-log-row fn-manage-row">
		<div class="fn-log-title-cell">
			<span class="fn-log-title"><?php echo $i['title'];?></span>
			<?php if ($show_posts): ?>
				<div class="fn-log-date"><?php echo $label['posts'];?> <?php echo $i['posts'];?></div>
			<?php endif;?>
			<div class="fn-mc-desc"><?php echo text_output($i['desc']);?></div>
		</div>
		<div class="fn-manage-actions">
			<?php if ($show_view): ?>
				<?php echo anchor('sim/missions/id/'. $i['id'], img($images['view']), array('class' => 'image'));?>
			<?php endif;?>
			<a href="#" myAction="delete" myID="<?php echo $i['id'];?>" rel="facebox" class="image"><?php echo img($images['delete']);?></a>
			<?php echo anchor('manage/missions/edit/'. $i['id'], img($images['edit']), array('class' => 'image'));?>
		</div>
	</div>
<?php };
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<div class="fn-mg-intro"><?php echo text_output($text);?></div>

	<p class="fn-mg-add"><?php echo anchor('manage/missions/add', $label['add'], array('class' => 'fn-mg-btn fn-mg-btn-add'));?></p>

	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['s_current'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['s_upcoming'];?></span></a></li>
			<li><a href="#three"><span><?php echo $label['s_completed'];?></span></a></li>
		</ul>

		<div id="one">
			<?php if (isset($missions['current'])): ?>
				<?php echo text_output($label['current'], 'h2', 'page-subhead');?>
				<div class="fn-log-panel">
					<?php foreach ($missions['current'] as $i): ?>
						<?php $render_mission($i, true, true);?>
					<?php endforeach;?>
				</div>
			<?php else: ?>
				<div class="fn-log-empty"><?php echo text_output($label['error'], 'h3', 'orange');?></div>
			<?php endif;?>
		</div>

		<div id="two">
			<?php if (isset($missions['upcoming'])): ?>
				<?php echo text_output($label['upcoming'], 'h2', 'page-subhead');?>
				<div class="fn-log-panel">
					<?php foreach ($missions['upcoming'] as $i): ?>
						<?php $render_mission($i, false, false);?>
					<?php endforeach;?>
				</div>
			<?php else: ?>
				<div class="fn-log-empty"><?php echo text_output($label['error'], 'h3', 'orange');?></div>
			<?php endif;?>
		</div>

		<div id="three">
			<?php if (isset($missions['completed'])): ?>
				<?php echo text_output($label['completed'], 'h2', 'page-subhead');?>
				<div class="fn-log-panel">
					<?php foreach ($missions['completed'] as $i): ?>
						<?php $render_mission($i, true, false);?>
					<?php endforeach;?>
				</div>
			<?php else: ?>
				<div class="fn-log-empty"><?php echo text_output($label['error'], 'h3', 'orange');?></div>
			<?php endif;?>
		</div>
	</div>
</div>
