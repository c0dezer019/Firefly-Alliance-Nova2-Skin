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

	<?php if (isset($nominations)): ?>
		<div class="fn-rpt-pagination"><?php echo $pagination;?></div>

		<?php
		$dots = array('pending' => 'yellow', 'rejected' => 'red', 'accepted' => 'green');
		?>

		<div class="fn-rpt-panel">
			<table class="fn-rpt-table">
				<tbody>
				<?php foreach ($nominations as $n): ?>
					<tr>
						<td class="main">
							<?php echo text_output($n['name'], 'span', 'fn-rpt-name');?>
							<span class="fn-rpt-sub">
								<?php echo text_output($label['award'], 'strong') .': '. anchor('sim/awards/'. $n['awardid'], $n['award']);?><br />
								<?php echo text_output($label['nominated'], 'strong') .': '. anchor('personnel/character/'. $n['charid'], $n['nominate']);?><br />
								<?php echo text_output($label['date'], 'strong') .': '. $n['date'];?>
							</span>
						</td>
						<td class="fn-rpt-text"><?php echo text_output($n['reason'], '');?></td>
						<td class="c ico">
							<span class="fn-rpt-dot fn-rpt-dot-<?php echo isset($dots[$n['status']]) ? $dots[$n['status']] : 'yellow';?>" title="<?php echo $n['status'];?>"></span>
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
