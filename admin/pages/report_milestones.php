<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<?php if (isset($users)): ?>
		<div class="fn-rpt-panel">
			<table class="fn-rpt-table">
				<thead>
					<tr>
						<th><?php echo $label['name'];?></th>
						<th class="r"><?php echo $label['timespan'];?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($users as $u): ?>
					<tr>
						<td class="main">
							<span class="fn-rpt-name"><?php echo $u['name'];?></span>
							<span class="fn-rpt-sub">
								<?php echo anchor('personnel/user/'. $u['id'], $label['bio_user']);?>
								|
								<?php echo anchor('personnel/character/'. $u['charid'], $label['bio_char']);?>
							</span>
						</td>
						<td class="r">
							<?php echo $u['timespan'];?>
							<?php echo text_output($u['join_date'], 'span', 'fn-rpt-sub');?>
						</td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		</div>
	<?php endif;?>
</div>
