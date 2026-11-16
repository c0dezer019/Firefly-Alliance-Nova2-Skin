<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">日志 · LOGS</span>
</div>

<div class="fn-log-panel">
	<div class="fn-log-count"><?php echo $display;?></div>

	<?php if (isset($logs)): ?>
		<div class="fn-log-row fn-log-row-head">
			<div><?php echo $label['title'];?></div>
			<div><?php echo $label['author'];?></div>
		</div>

		<?php foreach ($logs as $log): ?>
			<div class="fn-log-row">
				<div class="fn-log-title-cell">
					<?php echo anchor('sim/viewlog/'. $log['id'], $log['title'], array('class' => 'fn-log-title'));?>
					<div class="fn-log-date"><?php echo $label['on'] .' '. $log['date'];?></div>
				</div>
				<div class="fn-log-author-cell">
					<?php echo $log['author'];?>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else: ?>
		<div class="fn-log-empty"><?php echo text_output($label['nologs'], 'h3', 'orange');?></div>
	<?php endif; ?>
</div>

<?php if (isset($logs)): ?>
	<div class="fn-log-pagination"><?php echo $pagination;?></div>
<?php endif; ?>
