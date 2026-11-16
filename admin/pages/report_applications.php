<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<div class="fn-rpt-intro"><?php echo text_output($text);?></div>

	<?php if (isset($apps)): ?>
		<div class="fn-rpt-pagination"><?php echo $pagination;?></div>

		<?php
		$dots = array('accepted' => 'green', 'rejected' => 'red', 'deleted' => 'delete');
		?>

		<div class="fn-rpt-panel">
			<table class="fn-rpt-table">
				<thead>
					<tr>
						<th><?php echo $label['character'];?></th>
						<th><?php echo $label['user'];?></th>
						<th class="c"><?php echo $label['action'];?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($apps as $a): ?>
					<tr>
						<td class="main">
							<?php echo text_output($a['character'], 'span', 'fn-rpt-name');?>
							<span class="fn-rpt-sub">
								<?php echo text_output($label['position'], 'strong') .': '. $a['position'];?>
							</span>
						</td>
						<td>
							<?php echo text_output($a['user'], 'span', 'fn-rpt-name');?>
							<span class="fn-rpt-sub">
								<?php echo text_output($label['date'], 'strong') .': '. $a['date'];?><br />
								<?php echo text_output($label['email'], 'strong') .': '. $a['email'];?><br />
								<?php echo text_output($label['ipaddr'], 'strong') .': '. $a['ipaddr'];?>
							</span>
						</td>
						<td class="c ico">
							<span class="fn-rpt-dot fn-rpt-dot-<?php echo isset($dots[$a['action']]) ? $dots[$a['action']] : 'yellow';?>" title="<?php echo $a['action'];?>"></span>
						</td>
						<td class="c ico">
							<?php echo anchor('report/viewapp/'. $a['id'], ucfirst(lang('actions_view')), array('class' => 'fn-rpt-btn'));?>
						</td>
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
