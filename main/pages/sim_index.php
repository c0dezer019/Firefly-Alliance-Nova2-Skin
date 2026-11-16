<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// Skin branding flavor (watermark etc.) — page views render in their own
// scope, so pull the shared defaults in directly.
require dirname(dirname(dirname(__FILE__))).'/_global/config.php';
?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl"><?php echo $skin_subtitle;?></span>
</div>

<section class="fn-welcome-panel fn-sim-panel">
	<div class="fn-watermark"><?php echo $skin_watermark;?></div>

	<div class="fn-panel-title fn-sim-panel-title">
		<div class="fn-accent-bar"></div>
		<h3>About This Simulation</h3>
		<div class="fn-title-rule"></div>
	</div>

	<?php echo text_output($msg_sim);?>
</section>

<div class="fn-sim-grid">

	<!-- CURRENT OPERATIONS -->
	<div>
		<div class="fn-section-head fn-sim-subhead">
			<span class="glyph">&#9153;</span>
			<h3>Current Operations</h3>
			<div class="fn-title-rule"></div>
		</div>

		<?php if ($sim_active): ?>
			<div class="fn-ops-mission">
				<div class="fn-ops-badge"><span class="dot"></span>Active</div>
				<div class="fn-mission-label">Mission</div>
				<a class="fn-card-title" href="<?php echo site_url('sim/missions/id/'.$sim_active['id']);?>">&raquo; <?php echo $sim_active['title'];?></a>
				<p class="fn-card-excerpt"><?php echo $sim_active['desc'];?></p>

				<div class="fn-ops-tallies">
					<div><span class="num"><?php echo $sim_active['posts'];?></span><span class="lbl">Posts</span></div>
					<div><span class="num"><?php echo $sim_active['characters'];?></span><span class="lbl">Characters</span></div>
					<div><span class="num"><?php echo $sim_active['days_in'];?></span><span class="lbl">Days In</span></div>
				</div>
			</div>
		<?php else: ?>
			<p class="fn-card-excerpt">No mission is currently underway.</p>
		<?php endif;?>

		<?php if ($sim_completed): ?>
			<div class="fn-ops-completed">
				<div class="fn-ops-completed-head">
					<span class="fn-badge">Concluded</span>
					<span class="title"><?php echo $sim_completed['title'];?></span>
				</div>
				<div class="meta">
					<?php echo $sim_completed['start'];?><?php if ($sim_completed['end']):?> &mdash; <?php echo $sim_completed['end'];?><?php endif;?>
					&middot; <?php echo $sim_completed['posts'];?> posts
				</div>
			</div>
		<?php endif;?>

		<div class="fn-ops-more">
			<a href="<?php echo site_url('sim/missions');?>">&raquo; View All Missions</a>
		</div>
	</div>

	<!-- SIM STATISTICS -->
	<div>
		<div class="fn-section-head fn-sim-subhead">
			<span class="glyph">&#9153;</span>
			<h3>Sim Statistics</h3>
			<div class="fn-title-rule"></div>
		</div>

		<div class="fn-stats-grid">
			<div class="fn-stat-tile"><span class="num"><?php echo $sim_stats['posts'];?></span><span class="lbl">Total Posts</span></div>
			<div class="fn-stat-tile"><span class="num"><?php echo $sim_stats['characters'];?></span><span class="lbl">Characters</span></div>
			<div class="fn-stat-tile amber"><span class="num"><?php echo $sim_stats['active_missions'];?></span><span class="lbl">Active Missions</span></div>
			<div class="fn-stat-tile"><span class="num"><?php echo $sim_stats['days_running'];?></span><span class="lbl">Days Running</span></div>
		</div>

		<div class="fn-quicklinks">
			<div class="head">Quick Navigation</div>
			<a href="<?php echo site_url('sim/missions');?>">&raquo; Mission Log</a>
			<a href="<?php echo site_url('sim/listlogs');?>">&raquo; Personal Logs</a>
			<a href="<?php echo site_url('sim/tour');?>">&raquo; Ship Tour</a>
			<a href="<?php echo site_url('sim/specs');?>">&raquo; Specifications</a>
			<div class="rule"></div>
			<a class="amber" href="<?php echo site_url('main/join');?>">&raquo; Apply for a Berth</a>
		</div>
	</div>

</div>

<div class="fn-section-head fn-sim-subhead fn-upcoming-head">
	<span class="glyph">&#9153;</span>
	<h3>Upcoming</h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">Scheduled Operations</span>
</div>

<?php if (! empty($sim_upcoming)):?>
	<div class="fn-upcoming-grid">
		<?php foreach ($sim_upcoming as $mission):?>
			<div class="fn-upcoming-card">
				<div class="queued"><span class="dot"></span>Queued</div>
				<div class="title"><?php echo $mission['title'];?></div>
				<p class="fn-card-excerpt"><?php echo $mission['desc'];?></p>
				<?php if ($mission['start']):?>
					<div class="foot">
						<span>Estimated Start</span>
						<span><?php echo $mission['start'];?></span>
					</div>
				<?php endif;?>
			</div>
		<?php endforeach;?>

		<div class="fn-upcoming-open">
			<div class="plus">+</div>
			<div class="lbl">Mission Slot<br>Open</div>
			<div class="note">Crew proposals welcome &mdash; bring them to the CO.</div>
		</div>
	</div>
<?php else:?>
	<p class="fn-card-excerpt">No missions are currently queued.</p>
<?php endif;?>
