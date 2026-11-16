<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">任务组 · GROUP</span>
</div>

<p class="fn-ops-more"><?php echo anchor('sim/missions/group', $label['backgroups']);?></p>

<?php if (isset($group)): ?>
	<div class="fn-arc-card">
		<?php echo text_output($group['desc'], 'p', 'fn-card-excerpt');?>

		<div class="fn-ops-tallies fn-arc-tallies">
			<div><span class="num"><?php echo isset($group['missions']) ? count($group['missions']) : 0;?></span><span class="lbl">Missions</span></div>
			<div><span class="num"><?php echo $group['posts'];?></span><span class="lbl">Total Posts</span></div>
			<div><span class="num"><?php echo isset($group['subgroups']) ? count($group['subgroups']) : 0;?></span><span class="lbl">Sub-Groups</span></div>
		</div>

		<?php if (isset($group['missions'])): ?>
			<div class="fn-arc-contained-label"><?php echo $label['included'];?></div>

			<?php foreach ($group['missions'] as $m): ?>
				<div class="fn-mission-card">
					<span class="fn-mission-label"><?php echo $label['count'] .' '. $m['count'];?></span>
					<a class="fn-card-title" href="<?php echo site_url('sim/missions/id/'.$m['id']);?>"><?php echo $m['title'];?></a>
					<?php echo text_output($m['desc'], 'p', 'fn-card-excerpt');?>
				</div>
			<?php endforeach;?>
		<?php endif;?>

		<?php if (isset($group['subgroups'])): ?>
			<div class="fn-arc-contained-label"><?php echo $label['included_groups'];?></div>
			<div class="fn-arc-missions">
				<?php foreach ($group['subgroups'] as $s): ?>
					<?php echo anchor('sim/missions/group/'.$s['id'], $s['name'], array('class' => 'fn-arc-mission-pill'));?>
				<?php endforeach;?>
			</div>
		<?php endif;?>
	</div>
<?php else: ?>
	<p class="fn-card-excerpt fn-arc-empty"><?php echo $label['nogroup'];?></p>
<?php endif;?>
