<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<div class="fn-rpt-panel">
		<table class="fn-rpt-table">
			<thead>
				<tr>
					<th rowspan="2"><?php echo $label['name'];?><br /><span class="fn-rpt-meta"><?php echo $label['days'];?></span></th>
					<th colspan="2" class="grp"><?php echo $label['posts'];?></th>
					<th colspan="2" class="grp"><?php echo $label['logs'];?></th>
					<th colspan="2" class="grp"><?php echo $label['news'];?></th>
					<th colspan="2" class="grp"><?php echo $label['totals'];?></th>
				</tr>
				<tr>
					<?php for ($i = 0; $i < 4; $i++): ?>
						<th class="sub c"><?php echo $this->options['posting_requirement'];?></th>
						<th class="sub c<?php echo ($i < 3) ? ' divider' : '';?>">30</th>
					<?php endfor;?>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $u): ?>
				<tr>
					<td class="main">
						<?php if ($u['loa'] == '[LOA]'): ?>
							<?php echo text_output($u['loa'], 'span', 'fn-rpt-flag red');?>
						<?php elseif ($u['loa'] == '[ELOA]'): ?>
							<?php echo text_output($u['loa'], 'span', 'fn-rpt-flag orange');?>
						<?php endif;?>

						<?php echo text_output($u['main_char'], 'span', 'fn-rpt-name');?>
						<span class="fn-rpt-sub">
							<?php echo anchor('personnel/user/'. $u['id'], $label['biouser']);?>
							|
							<?php echo anchor('personnel/character/'. $u['charid'], $label['biochar']);?>
						</span>

						<span class="fn-rpt-meta<?php echo $u['requirement_login'];?>">
							<?php echo text_output($label['lastlogin'], 'strong') .': '.$u['last_login'];?>
						</span>
						<span class="fn-rpt-meta<?php echo $u['requirement_post'];?>">
							<?php echo text_output($label['lastpost'], 'strong') .': '. $u['last_post'];?>
						</span>
					</td>

					<td class="c num"><?php echo $u['posts']['timeframe'];?></td>
					<td class="c num divider"><?php echo $u['posts']['month'];?></td>

					<td class="c num"><?php echo $u['logs']['timeframe'];?></td>
					<td class="c num divider"><?php echo $u['logs']['month'];?></td>

					<td class="c num"><?php echo $u['news']['timeframe'];?></td>
					<td class="c num divider"><?php echo $u['news']['month'];?></td>

					<td class="c num"><?php echo $u['posts']['timeframe'] + $u['logs']['timeframe'] + $u['news']['timeframe'];?></td>
					<td class="c num"><?php echo $u['posts']['month'] + $u['logs']['month'] + $u['news']['month'];?></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
