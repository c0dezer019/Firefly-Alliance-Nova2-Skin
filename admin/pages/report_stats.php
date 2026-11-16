<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<?php
// One stats panel per content type (posts / logs / combined entries).
$groups = array(
    'posts' => array('data' => $posts, 'prefix' => 'posts'),
    'logs' => array('data' => $logs, 'prefix' => 'logs'),
    'entries' => array('data' => $entries, 'prefix' => 'entries'),
);
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<div id="tabs">
		<ul>
			<li><a href="#one"><span>Monthly Stats</span></a></li>
			<li><a href="#two"><span>Sim Totals</span></a></li>
		</ul>

		<div id="one">
			<div class="fn-specs-panel">
				<div class="fn-stats-month-head">
					<span class="l"><?php echo $label['lastmonth'];?></span>
					<span></span>
					<span class="r"><?php echo $label['thismonth'];?></span>
				</div>
				<div class="fn-stats-month-row"><span class="prev"><?php echo $users['previous'];?></span><span class="k"><?php echo $label['users'];?></span><span class="cur"><?php echo $users['current'];?></span></div>
				<div class="fn-stats-month-row"><span class="prev"><?php echo $characters['previous'];?></span><span class="k"><?php echo $label['playing_chars'];?></span><span class="cur"><?php echo $characters['current'];?></span></div>
				<div class="fn-stats-month-row"><span class="prev"><?php echo $npcs['previous'];?></span><span class="k"><?php echo $label['npcs'];?></span><span class="cur"><?php echo $npcs['current'];?></span></div>
			</div>

			<?php foreach ($groups as $g): ?>
				<?php $p = $g['prefix']; $d = $g['data'];?>
				<div class="fn-specs-panel fn-stats-panel-full">
					<div class="fn-stats-month-row"><span class="prev"><?php echo $d['total']['previous'];?></span><span class="k"><?php echo $label[$p];?></span><span class="cur"><?php echo $d['total']['current'];?></span></div>
					<div class="fn-stats-month-row"><span class="prev"><?php echo $d['words']['previous'];?></span><span class="k"><?php echo $label[$p.'Words'];?></span><span class="cur"><?php echo $d['words']['current'];?></span></div>
					<div class="fn-stats-month-row"><span class="prev"><?php echo $d['average']['previous'];?></span><span class="k"><?php echo $label[$p.'Average'];?><span class="fn-rpt-dag">&dagger;</span></span><span class="cur"><?php echo $d['average']['current'];?></span></div>
					<div class="fn-stats-month-row"><span class="prev"><?php echo $d['wordsAverage']['previous'];?></span><span class="k"><?php echo $label[$p.'WordsAverage'];?><span class="fn-rpt-dag">&dagger;</span></span><span class="cur"><?php echo $d['wordsAverage']['current'];?></span></div>
					<div class="fn-stats-month-row"><span class="prev"><?php echo NDASH;?></span><span class="k"><?php echo $label[$p.'Pace'];?><span class="fn-rpt-dag">&Dagger;</span></span><span class="cur"><?php echo $d['pace'];?></span></div>
					<div class="fn-stats-month-row"><span class="prev"><?php echo NDASH;?></span><span class="k"><?php echo $label[$p.'WordsPace'];?><span class="fn-rpt-dag">&Dagger;</span></span><span class="cur"><?php echo $d['wordsPace'];?></span></div>
				</div>
			<?php endforeach;?>

			<?php echo text_output($label['statsavg'], 'p', 'fn-stats-note');?>
			<?php echo text_output($label['statspace'], 'p', 'fn-stats-note');?>
		</div>

		<div id="two">
			<div class="fn-specs-panel">
				<div class="fn-spec-row"><span class="k"><?php echo $label['start_date'];?></span><span class="v"><?php echo $start;?></span></div>
			</div>

			<div class="fn-specs-grid fn-stats-panel-full">
				<div class="fn-specs-panel">
					<div class="fn-specs-panel-title"><?php echo $label['users'];?></div>
					<div class="fn-spec-row"><span class="k"><?php echo $label['all_users'];?></span><span class="v"><?php echo number_format($users['all']);?></span></div>
					<div class="fn-spec-row"><span class="k"><?php echo $label['active_users'];?></span><span class="v"><?php echo number_format($users['current']);?></span></div>
				</div>

				<div class="fn-specs-panel">
					<div class="fn-specs-panel-title"><?php echo $label['characters'];?></div>
					<div class="fn-spec-row"><span class="k"><?php echo $label['all_characters'];?></span><span class="v"><?php echo number_format($characters['all']);?></span></div>
					<div class="fn-spec-row"><span class="k"><?php echo $label['active_characters'];?></span><span class="v"><?php echo number_format($characters['current']);?></span></div>
					<div class="fn-spec-row"><span class="k"><?php echo $label['all_npcs'];?></span><span class="v"><?php echo number_format($npcs['all']);?></span></div>
				</div>
			</div>

			<div class="fn-specs-panel fn-stats-panel-full">
				<div class="fn-specs-panel-title"><?php echo $label['posting'];?></div>
				<div class="fn-spec-row"><span class="k"><?php echo $label['total_posts'];?></span><span class="v"><?php echo number_format($posts['total']['all']);?></span></div>
				<div class="fn-spec-row"><span class="k"><?php echo $label['total_posts_words'];?></span><span class="v"><?php echo number_format($words['posts']);?></span></div>
				<div class="fn-spec-row"><span class="k"><?php echo $label['total_logs'];?></span><span class="v"><?php echo number_format($logs['total']['all']);?></span></div>
				<div class="fn-spec-row"><span class="k"><?php echo $label['total_logs_words'];?></span><span class="v"><?php echo number_format($words['logs']);?></span></div>
				<div class="fn-spec-row"><span class="k"><?php echo $label['total_posting'];?></span><span class="v"><?php echo number_format($entries['total']['all']);?></span></div>
				<div class="fn-spec-row"><span class="k"><?php echo $label['total_words'];?></span><span class="v"><?php echo number_format($words['total']);?></span></div>
			</div>
		</div>
	</div>
</div>
