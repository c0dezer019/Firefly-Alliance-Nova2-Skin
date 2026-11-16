<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">日志 · LOGS</span>
</div>

<?php if (isset($msg_error)): ?>
	<p class="fn-card-excerpt"><?php echo $msg_error;?></p>
<?php endif;?>

<?php if (isset($logs)): ?>
	<p class="fn-per-back"><?php echo anchor('personnel/character/' . $charid, $label['backchar']);?></p>

	<div class="fn-log-panel">
		<div class="fn-log-count"><?php echo $display;?></div>
		<div class="fn-log-row fn-log-row-head">
			<div><?php echo $label['title'];?></div>
			<div></div>
		</div>
		<?php foreach ($logs as $log): ?>
			<div class="fn-log-row">
				<div class="fn-log-title-cell">
					<?php echo anchor('sim/viewlog/'. $log['id'], $log['title'], array('class' => 'fn-log-title'));?>
					<div class="fn-log-date"><?php echo $label['on'] .' '. $log['date'];?></div>
					<div class="fn-card-excerpt fn-arch-excerpt"><?php echo word_limiter($log['content'], 25);?></div>
				</div>
				<div class="fn-log-author-cell">
					<?php echo anchor('sim/viewlog/'. $log['id'], $label['view_log']);?>
				</div>
			</div>
		<?php endforeach;?>
	</div>

	<div class="fn-log-pagination"><?php echo $pagination;?></div>
<?php elseif (isset($char)): ?>
	<p class="fn-per-back"><?php echo anchor('personnel/user/' . $user .'/4', $label['backuser']);?></p>

	<?php foreach ($char as $c): ?>
		<div class="fn-per-subhead"><?php echo $c['character'];?></div>
		<?php if (isset($c['logs'])): ?>
			<div class="fn-log-panel">
				<?php foreach ($c['logs'] as $log): ?>
					<div class="fn-log-row">
						<div class="fn-log-title-cell">
							<?php echo anchor('sim/viewlog/'. $log['id'], $log['title'], array('class' => 'fn-log-title'));?>
							<div class="fn-log-date"><?php echo $label['on'] .' '. $log['date'];?></div>
							<div class="fn-card-excerpt fn-arch-excerpt"><?php echo word_limiter($log['content'], 25);?></div>
						</div>
						<div class="fn-log-author-cell">
							<?php echo anchor('sim/viewlog/'. $log['id'], $label['view_log']);?>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		<?php else: ?>
			<p class="fn-card-excerpt"><?php echo $label['nologs'];?></p>
		<?php endif;?>
	<?php endforeach;?>
<?php endif;?>
