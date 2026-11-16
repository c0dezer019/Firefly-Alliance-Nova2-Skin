<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * One docked-sim row. $pending adds the reject/approve facebox hooks.
 * myAction / myID / rel=facebox are read by manage_docked_js.php.
 */
$docked_row = function ($d, $pending) {
    ?>
	<div class="fn-mg-row fn-st-dock-row">
		<div class="fn-mg-main">
			<span class="fn-st-name"><?php echo $d['sim_name'];?></span>
			<span class="fn-st-dock-url"><a href="<?php echo $d['sim_url'];?>" target="_blank"><?php echo $d['sim_url'];?></a></span>
		</div>
		<div class="fn-st-dock-gm"><?php echo $d['gm_name'];?></div>
		<div class="fn-mg-actions">
			<?php if ($pending): ?>
				<a href="#" rel="facebox" class="fn-mg-btn fn-st-btn-ok" myAction="approve" myID="<?php echo $d['id'];?>"><?php echo ucfirst(lang('actions_approve'));?></a>
				<a href="#" rel="facebox" class="fn-mg-btn fn-mg-btn-danger" myAction="reject" myID="<?php echo $d['id'];?>"><?php echo ucfirst(lang('actions_reject'));?></a>
			<?php endif;?>
			<?php echo anchor('sim/docked/'. $d['id'], ucfirst(lang('actions_view')), array('class' => 'fn-mg-btn'));?>
			<?php echo anchor('manage/docked/edit/'. $d['id'], ucfirst(lang('actions_edit')), array('class' => 'fn-mg-btn'));?>
			<a href="#" rel="facebox" class="fn-mg-btn fn-mg-btn-danger" myAction="delete" myID="<?php echo $d['id'];?>"><?php echo ucfirst(lang('actions_delete'));?></a>
		</div>
	</div>
	<?php
};

$docked_head = function () use ($label) {
    ?>
	<div class="fn-st-dock-head">
		<span><?php echo $label['info'];?></span>
		<span><?php echo $label['name'];?></span>
		<span></span>
	</div>
	<?php
};
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-struct">
	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['status_active'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['status_inactive'];?></span></a></li>
			<li><a href="#three"><span><?php echo $label['status_pending'];?> (<?php echo $count;?>)</span></a></li>
		</ul>

		<div id="one">
			<?php if (isset($docking['active'])): ?>
				<div class="fn-mg-panel fn-st-list">
					<?php $docked_head();?>
					<?php foreach ($docking['active'] as $d): ?>
						<?php $docked_row($d, false);?>
					<?php endforeach;?>
				</div>
			<?php else: ?>
				<?php echo text_output($label['noitems'], 'h3', 'orange');?>
			<?php endif;?>
		</div>

		<div id="two">
			<?php if (isset($docking['inactive'])): ?>
				<div class="fn-mg-panel fn-st-list">
					<?php $docked_head();?>
					<?php foreach ($docking['inactive'] as $d): ?>
						<?php $docked_row($d, false);?>
					<?php endforeach;?>
				</div>
			<?php else: ?>
				<?php echo text_output($label['noitems'], 'h3', 'orange');?>
			<?php endif;?>
		</div>

		<div id="three">
			<?php if (isset($docking['pending'])): ?>
				<div class="fn-mg-panel fn-st-list">
					<?php $docked_head();?>
					<?php foreach ($docking['pending'] as $d): ?>
						<?php $docked_row($d, true);?>
					<?php endforeach;?>
				</div>
			<?php else: ?>
				<?php echo text_output($label['noitems'], 'h3', 'orange');?>
			<?php endif;?>
		</div>
	</div>
</div>
