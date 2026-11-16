<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">任务组 · GROUPS</span>
</div>

<p class="fn-card-excerpt fn-groups-intro">Mission groups collect related posts into narrative arcs &mdash; the running threads that connect individual jobs into something bigger. A single group may span several missions; a mission may belong to only one group.</p>

<?php if (isset($groups)): ?>
	<?php foreach ($groups as $g): ?>
		<div class="fn-arc-card">
			<h3 class="fn-arc-title"><?php echo anchor('sim/missions/group/'.$g['id'], $g['name']);?></h3>

			<?php echo text_output($g['desc'], 'p', 'fn-card-excerpt');?>

			<div class="fn-ops-tallies fn-arc-tallies">
				<div><span class="num"><?php echo $g['count']['missions'];?></span><span class="lbl">Missions</span></div>
				<div><span class="num"><?php echo $g['count']['posts'];?></span><span class="lbl">Total Posts</span></div>
				<div><span class="num"><?php echo $g['count']['groups'];?></span><span class="lbl">Sub-Groups</span></div>
			</div>

			<?php if (isset($g['missions'])): ?>
				<div class="fn-arc-contained-label"><?php echo $label['included'];?></div>
				<div class="fn-arc-missions">
					<?php foreach ($g['missions'] as $m): ?>
						<?php echo anchor('sim/missions/id/'.$m['id'], $m['title'], array('class' => 'fn-arc-mission-pill'));?>
					<?php endforeach;?>
				</div>
			<?php endif;?>

			<?php if (isset($g['subgroups'])): ?>
				<div class="fn-arc-contained-label"><?php echo $label['included_groups'];?></div>
				<div class="fn-arc-missions">
					<?php foreach ($g['subgroups'] as $s): ?>
						<?php echo anchor('sim/missions/group/'.$s['id'], $s['name'], array('class' => 'fn-arc-mission-pill'));?>
					<?php endforeach;?>
				</div>
			<?php endif;?>
		</div>
	<?php endforeach;?>
<?php else: ?>
	<p class="fn-card-excerpt fn-arc-empty"><?php echo $label['nogroups'];?></p>
<?php endif;?>
