<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * Renders one mission group row, then recurses into $g['children'].
 * Depth only drives a .fn-mg-depth-N class (indent lives in CSS).
 */
$render_group = function ($g, $depth, $parent_name) use (&$render_group, $images) {
    $d = min($depth, 4); ?>
	<div class="fn-mg-row fn-mg-depth-<?php echo $d;?>">
		<div class="fn-mg-main">
			<?php echo anchor('sim/missions/group/'. $g['id'], $g['name'], array('class' => 'fn-mg-name'));?>
			<?php $count = isset($g['missions']) ? (int) $g['missions'] : null;?>
			<?php if ($parent_name !== false or $count !== null): ?>
				<div class="fn-mg-meta">
					<?php if ($parent_name !== false): ?>
						<?php echo ucfirst(lang('labels_parent')) .': '. $parent_name;?>
					<?php endif;?>
					<?php if ($parent_name !== false and $count !== null): ?> &middot; <?php endif;?>
					<?php if ($count !== null): ?>
						<?php echo $count .' '. ($count == 1 ? lang('global_mission') : lang('global_missions'));?>
					<?php endif;?>
				</div>
			<?php endif;?>
			<div class="fn-mg-desc"><?php echo text_output($g['desc']);?></div>
		</div>
		<div class="fn-mg-actions">
			<?php echo anchor('sim/missions/group/'. $g['id'], lang('actions_view'), array('class' => 'fn-mg-btn'));?>
			<a href="#" myAction="edit" myID="<?php echo $g['id'];?>" rel="facebox" class="fn-mg-btn"><?php echo lang('actions_edit');?></a>
			<a href="#" myAction="delete" myID="<?php echo $g['id'];?>" rel="facebox" class="fn-mg-btn fn-mg-btn-danger"><?php echo lang('actions_delete');?></a>
		</div>
	</div>
	<?php if (isset($g['children'])): ?>
		<?php foreach ($g['children'] as $child): ?>
			<?php $render_group($child, $depth + 1, $g['name']);?>
		<?php endforeach;?>
	<?php endif;
};
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<div class="fn-mg-intro"><?php echo text_output($text);?></div>

	<p class="fn-mg-add"><a href="#" rel="facebox" myAction="add" class="fn-mg-btn fn-mg-btn-add"><?php echo $label['addgroup'];?></a></p>

	<div class="fn-mg-panel">
		<div class="fn-mg-panel-title"><?php echo ucwords(lang('global_missiongroups'));?></div>

		<?php if (isset($groups)): ?>
			<?php foreach ($groups as $g): ?>
				<?php $render_group($g, 0, false);?>
			<?php endforeach;?>
		<?php else: ?>
			<div class="fn-mg-empty"><?php echo $label['nogroups'];?></div>
		<?php endif;?>
	</div>
</div>
