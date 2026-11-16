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

	<?php if (isset($users)): ?>
		<?php
		$dots = array('green' => 'green', 'red' => 'red');
		$cols = array('posts' => 'posts', 'comments_p' => 'comments_p', 'logs' => 'logs', 'comments_l' => 'comments_l', 'news' => 'news', 'comments_n' => 'comments_n', 'comments_w' => 'comments_w');
		?>
		<div class="fn-rpt-panel">
			<table class="fn-rpt-table">
				<thead>
					<tr>
						<th><?php echo $label['name'];?></th>
						<?php foreach ($cols as $col): ?>
							<th class="c sub"><?php echo text_output($label[$col], '');?></th>
						<?php endforeach;?>
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
						<?php foreach ($cols as $col): ?>
							<td class="c"><span class="fn-rpt-dot fn-rpt-dot-<?php echo isset($dots[$u[$col]]) ? $dots[$u[$col]] : 'yellow';?>" title="<?php echo $u[$col];?>"></span></td>
						<?php endforeach;?>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		</div>
	<?php endif;?>
</div>
