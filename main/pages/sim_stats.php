<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">统计 · STATS</span>
</div>

<p class="fn-stats-caption"><?php echo $label['start_date'];?> &middot; <?php echo $start;?></p>

<!-- All-time counter tiles -->
<div class="fn-stats-counters">
	<div class="fn-stat-tile">
		<span class="num"><?php echo number_format($posts['total']['all']);?></span>
		<span class="lbl"><?php echo $label['total_posts'];?></span>
	</div>
	<div class="fn-stat-tile">
		<span class="num"><?php echo number_format($logs['total']['all']);?></span>
		<span class="lbl"><?php echo $label['total_logs'];?></span>
	</div>
	<div class="fn-stat-tile">
		<span class="num"><?php echo number_format($characters['all']);?></span>
		<span class="lbl"><?php echo $label['characters'];?></span>
	</div>
	<div class="fn-stat-tile">
		<span class="num"><?php echo number_format($users['all']);?></span>
		<span class="lbl"><?php echo $label['users'];?></span>
	</div>
	<div class="fn-stat-tile amber">
		<span class="num"><?php echo number_format($words['total']);?></span>
		<span class="lbl"><?php echo $label['total_words'];?></span>
	</div>
</div>

<div class="fn-specs-grid">
	<!-- Character breakdown -->
	<div class="fn-specs-panel">
		<div class="fn-specs-panel-title"><?php echo $label['characters'];?></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['all_characters'];?></span><span class="v"><?php echo number_format($characters['all']);?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['active_characters'];?></span><span class="v"><?php echo number_format($characters['current']);?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['all_npcs'];?></span><span class="v"><?php echo number_format($npcs['all']);?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['all_users'];?></span><span class="v"><?php echo number_format($users['all']);?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['active_users'];?></span><span class="v"><?php echo number_format($users['current']);?></span></div>
	</div>

	<!-- Posting totals -->
	<div class="fn-specs-panel">
		<div class="fn-specs-panel-title"><?php echo $label['posting'];?></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['total_posts'];?></span><span class="v"><?php echo number_format($posts['total']['all']);?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['total_posts_words'];?></span><span class="v"><?php echo number_format($words['posts']);?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['total_logs'];?></span><span class="v"><?php echo number_format($logs['total']['all']);?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['total_logs_words'];?></span><span class="v"><?php echo number_format($words['logs']);?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['total_posting'];?></span><span class="v"><?php echo number_format($entries['total']['all']);?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['total_words'];?></span><span class="v"><?php echo number_format($words['total']);?></span></div>
	</div>
</div>

<!-- Monthly comparison -->
<div class="fn-specs-panel fn-stats-panel-full">
	<div class="fn-stats-month-head">
		<span class="l"><?php echo $label['lastmonth'];?></span>
		<span></span>
		<span class="r"><?php echo $label['thismonth'];?></span>
	</div>
	<div class="fn-stats-month-row"><span class="prev"><?php echo $users['previous'];?></span><span class="k"><?php echo $label['users'];?></span><span class="cur"><?php echo $users['current'];?></span></div>
	<div class="fn-stats-month-row"><span class="prev"><?php echo $characters['previous'];?></span><span class="k"><?php echo $label['playing_chars'];?></span><span class="cur"><?php echo $characters['current'];?></span></div>
	<div class="fn-stats-month-row"><span class="prev"><?php echo $npcs['previous'];?></span><span class="k"><?php echo $label['npcs'];?></span><span class="cur"><?php echo $npcs['current'];?></span></div>
	<div class="fn-stats-month-row"><span class="prev"><?php echo $posts['total']['previous'];?></span><span class="k"><?php echo $label['posts'];?></span><span class="cur"><?php echo $posts['total']['current'];?></span></div>
	<div class="fn-stats-month-row"><span class="prev"><?php echo $posts['words']['previous'];?></span><span class="k"><?php echo $label['postsWords'];?></span><span class="cur"><?php echo $posts['words']['current'];?></span></div>
	<div class="fn-stats-month-row"><span class="prev"><?php echo $logs['total']['previous'];?></span><span class="k"><?php echo $label['logs'];?></span><span class="cur"><?php echo $logs['total']['current'];?></span></div>
	<p class="fn-stats-note"><?php echo $label['statsavg'];?> <?php echo $label['statspace'];?></p>
</div>
