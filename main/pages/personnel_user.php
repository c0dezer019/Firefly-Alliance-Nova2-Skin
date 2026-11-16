<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">用户 · USER</span>
</div>

<?php if ($edit_valid): ?>
	<p class="fn-per-edit"><?php echo link_to_if($edit_valid, 'user/account/'.$userid, $label['edit']);?></p>
<?php endif;?>

<?php if (isset($msg_error)): ?>
	<p class="fn-card-excerpt"><?php echo $msg_error;?></p>
<?php else: ?>
	<div class="fn-kv-list">
		<div class="fn-kv"><span class="k"><?php echo $label['name'];?></span><span class="v"><?php echo $name;?></span></div>
		<div class="fn-kv"><span class="k"><?php echo $label['email'];?></span><span class="v"><?php echo $email;?></span></div>
		<div class="fn-kv"><span class="k"><?php echo $label['timezone'];?></span><span class="v"><?php echo $timezone;?> &middot; <?php echo $timezone_span;?></span></div>
	</div>

	<!-- Basic info -->
	<div class="fn-specs-panel">
		<div class="fn-specs-panel-title"><?php echo $label['basicinfo'];?></div>
		<div class="fn-kv-list">
			<?php if (! empty($dob)): ?><div class="fn-kv"><span class="k"><?php echo $label['dob'];?></span><span class="v"><?php echo $dob;?></span></div><?php endif;?>
			<?php if (! empty($location)): ?><div class="fn-kv"><span class="k"><?php echo $label['location'];?></span><span class="v"><?php echo $location;?></span></div><?php endif;?>
			<?php if (count($im) > 0): ?><div class="fn-kv"><span class="k"><?php echo $label['im'];?></span><span class="v"><?php foreach ($im as $v): ?><?php echo $v;?><br /><?php endforeach;?></span></div><?php endif;?>
			<?php if (! empty($interests)): ?><div class="fn-kv"><span class="k"><?php echo $label['interests'];?></span><span class="v"><?php echo text_output($interests, '');?></span></div><?php endif;?>
			<?php if (! empty($bio)): ?><div class="fn-kv"><span class="k"><?php echo $label['bio'];?></span><span class="v"><?php echo text_output($bio, '');?></span></div><?php endif;?>
			<?php if (empty($dob) and empty($location) and count($im) == 0 and empty($interests) and empty($bio)): ?><p class="fn-card-excerpt"><?php echo $label['nobasic'];?></p><?php endif;?>
		</div>
	</div>

	<!-- Stats -->
	<div class="fn-specs-panel">
		<div class="fn-specs-panel-title"><?php echo $label['stats'];?></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['joined'];?></span><span class="v"><?php echo $join_date_time;?> (<?php echo $join_date;?>)</span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['lastlogin'];?></span><span class="v"><?php echo isset($last_login_time) ? $last_login_time.' ('.$last_login.')' : $label['nologin'];?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['lastpost'];?></span><span class="v"><?php echo isset($last_post_time) ? $last_post_time.' ('.$last_post.')' : $label['nopost'];?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['totalposts'];?></span><span class="v"><?php echo $post_count;?> (<?php echo $label['average'].' '.$avg_posts.' '.$label['perweek'];?>)</span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['totallogs'];?></span><span class="v"><?php echo $log_count;?> (<?php echo $label['average'].' '.$avg_logs.' '.$label['perweek'];?>)</span></div>
	</div>

	<!-- Character info -->
	<div class="fn-specs-panel">
		<div class="fn-specs-panel-title"><?php echo $label['charinfo'];?></div>
		<div class="fn-kv-list">
			<div class="fn-kv"><span class="k"><?php echo $label['activechars'];?></span><span class="v">
				<?php if (isset($characters['active'])): ?><ul><?php foreach ($characters['active'] as $a): ?><li><?php echo anchor('personnel/character/'.$a['id'], $a['name']);?> &middot; <?php echo $label['activefor'].' '.$a['active_time'];?></li><?php endforeach;?></ul><?php else: ?><?php echo $label['none'];?><?php endif;?>
			</span></div>
			<div class="fn-kv"><span class="k"><?php echo $label['npcs'];?></span><span class="v">
				<?php if (isset($characters['npcs'])): ?><?php foreach ($characters['npcs'] as $n): ?><?php echo anchor('personnel/character/'.$n['id'], $n['name']);?><br /><?php endforeach;?><?php else: ?><?php echo $label['none'];?><?php endif;?>
			</span></div>
			<div class="fn-kv"><span class="k"><?php echo $label['inactivechars'];?></span><span class="v">
				<?php if (isset($characters['inactive'])): ?><?php foreach ($characters['inactive'] as $i): ?><?php echo anchor('personnel/character/'.$i['id'], $i['name']);?><br /><?php endforeach;?><?php else: ?><?php echo $label['none'];?><?php endif;?>
			</span></div>
		</div>
	</div>

	<!-- Rank history -->
	<div class="fn-specs-panel">
		<div class="fn-specs-panel-title"><?php echo $label['rankhistory'];?></div>
		<?php if (is_array($rank_history) and count($rank_history) > 0): ?>
			<?php foreach ($rank_history as $row): ?>
				<div class="fn-per-subhead"><?php echo $row['name'];?></div>
				<?php foreach ($row['history'] as $item): ?>
					<div class="fn-spec-row">
						<span class="k"><?php echo $item['date'];?></span>
						<span class="v"><?php if ($item['old_order'] > $item['new_order']): ?><?php echo $label['promoted'].' '.$item['new_rank'].' '.$label['from'].' '.$item['old_rank'];?><?php else: ?><?php echo $label['demoted'].' '.$item['old_rank'].' '.$label['to'].' '.$item['new_rank'];?><?php endif;?></span>
					</div>
				<?php endforeach;?>
			<?php endforeach;?>
		<?php else: ?>
			<p class="fn-card-excerpt"><?php echo $label['norankhistory'];?></p>
		<?php endif;?>
	</div>

	<!-- Posting info -->
	<div class="fn-specs-panel">
		<div class="fn-specs-panel-title"><?php echo $label['postinginfo'];?></div>
		<div class="fn-per-subhead"><?php echo $label['missionposts'];?></div>
		<?php if (isset($posts)): ?>
			<p class="fn-per-back"><?php echo anchor('personnel/viewposts/u/'.$userid, $label['viewposts']);?></p>
			<?php foreach ($posts as $p): ?>
				<div class="fn-spec-row">
					<span class="k"><?php echo $p['date'];?></span>
					<span class="v"><?php echo anchor('sim/viewpost/'.$p['post_id'], $p['title']);?> &middot; <?php echo anchor('sim/missions/id/'.$p['mission_id'], $p['mission']);?></span>
				</div>
			<?php endforeach;?>
		<?php else: ?>
			<p class="fn-card-excerpt"><?php echo $label['noposts'];?></p>
		<?php endif;?>

		<div class="fn-per-subhead"><?php echo $label['personallogs'];?></div>
		<?php if (isset($logs)): ?>
			<p class="fn-per-back"><?php echo anchor('personnel/viewlogs/u/'.$userid, $label['viewlogs']);?></p>
			<?php foreach ($logs as $l): ?>
				<div class="fn-spec-row">
					<span class="k"><?php echo $l['date'];?></span>
					<span class="v"><?php echo anchor('sim/viewlog/'.$l['log_id'], $l['title']);?> &middot; <?php echo $label['by'].' '.$l['author'];?></span>
				</div>
			<?php endforeach;?>
		<?php else: ?>
			<p class="fn-card-excerpt"><?php echo $label['nologs'];?></p>
		<?php endif;?>
	</div>

	<!-- Awards -->
	<div class="fn-specs-panel">
		<div class="fn-specs-panel-title"><?php echo $label['awards'];?></div>
		<?php if (isset($awards)): ?>
			<?php foreach ($awards as $a): ?>
				<div class="fn-spec-row">
					<span class="k"><?php echo anchor('sim/awards/'.$a['award_id'], $a['award']);?><br /><?php echo $a['given'];?> &middot; <?php echo $label['receivedby'].' '.$a['name'];?></span>
					<span class="v"><?php echo text_output($a['reason'], '');?></span>
				</div>
			<?php endforeach;?>
			<p class="fn-per-back"><?php echo anchor('personnel/viewawards/u/'.$userid, $label['viewawards']);?></p>
		<?php else: ?>
			<p class="fn-card-excerpt"><?php echo $label['noawards'];?></p>
		<?php endif;?>
	</div>
<?php endif;?>
