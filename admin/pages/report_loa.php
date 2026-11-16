<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<?php if (isset($loa)): ?>
		<div class="fn-rpt-pagination"><?php echo $pagination;?></div>

		<div class="fn-rpt-panel">
			<table class="fn-rpt-table">
				<thead>
					<tr>
						<th><?php echo $label['name'];?></th>
						<th><?php echo $label['reason'];?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($loa as $l): ?>
					<tr>
						<td class="main">
							<?php echo text_output($l['user'], 'span', 'fn-rpt-name');?>
							<span class="fn-rpt-sub">
								<strong><?php echo $label['date_start'] .'</strong> '. $l['date_start'];?>
								<?php if (!empty($l['date_end'])): ?>
									<br />
									<strong><?php echo $label['date_end'] .'</strong> '. $l['date_end'];?>
								<?php endif;?>
								<br />
								<strong><?php echo $label['duration_expected'] .'</strong> '. $l['duration'];?><br />
								<strong><?php echo $label['duration_actual'] .'</strong> '. $l['duration_actual'];?>
							</span>
						</td>
						<td class="fn-rpt-text"><?php echo $l['reason'];?></td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		</div>

		<div class="fn-rpt-pagination"><?php echo $pagination;?></div>
	<?php else: ?>
		<div class="fn-rpt-empty"><?php echo $label['none'];?></div>
	<?php endif;?>
</div>
