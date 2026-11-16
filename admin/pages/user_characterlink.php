<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-usr">
	<?php if (!isset($chars)): ?>
		<?php echo text_output($label['select'], 'h4', 'fn-usr-note');?>

		<div class="fn-usr-list">
			<?php foreach ($all as $key => $a): ?>
				<div class="fn-usr-row fn-usr-row-simple">
					<div class="fn-usr-main"><?php echo anchor('user/characterlink/'. $key, $a, array('class' => 'fn-usr-link'));?></div>
				</div>
			<?php endforeach;?>
		</div>
	<?php else: ?>
		<p class="fn-set-manage"><?php echo anchor('user/characterlink', $label['allchars']);?></p>

		<div class="fn-set-intro"><?php echo text_output($text);?></div>

		<?php echo text_output($label['user'], 'h3', 'fn-set-sub');?>

		<p class="fn-usr-meta">
			<strong><?php echo $label['name'];?></strong> &ndash; <?php echo $p_name;?><br />
			<strong><?php echo $label['email'];?></strong> &ndash; <?php echo $p_email;?>
		</p>

		<?php echo text_output($label['current'], 'h3', 'fn-set-sub');?>

		<?php if (is_array($chars) && count($chars) > 0): ?>
			<div class="fn-usr-list">
				<?php foreach ($chars as $key => $c): ?>
					<div class="fn-usr-row fn-usr-row-char">
						<div class="fn-usr-main">
							<?php if ($c['main'] === TRUE): ?>
								<?php echo img($images['main']) .' ';?>
							<?php elseif ($c['type'] == 'Inactive'): ?>
								<?php echo img($images['inactive']) .' ';?>
							<?php elseif ($c['type'] == 'NPC'): ?>
								<?php echo img($images['npc']) .' ';?>
							<?php elseif ($c['type'] == 'Active'): ?>
								<?php echo img($images['active']) .' ';?>
							<?php endif;?>

							<?php echo text_output($c['name'], 'span', 'fn-usr-name');?>
							<?php echo text_output($c['position'], 'span', 'fn-usr-sub');?>
							<?php echo text_output($c['type'], 'span', 'fn-usr-sub');?>
						</div>
						<div class="fn-usr-actions">
							<?php echo anchor('user/characterlink/'. $user .'/remove/'. $key, img($images['remove']), array('class' => 'image'));?>
							<?php if ($c['main'] === FALSE && $c['type'] == 'Active'): ?>
								<?php echo anchor('user/characterlink/'. $user .'/set/'. $key, img($images['star']), array('class' => 'image'));?>
							<?php endif;?>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		<?php else: ?>
			<?php echo text_output($label['nocharacters'], 'h4', 'fn-set-empty');?>
		<?php endif;?>

		<?php echo text_output($label['add'], 'h3', 'fn-set-sub');?>

		<div id="tabs">
			<ul>
				<li><a href="#one"><span><?php echo $label['chars_playing'];?></span></a></li>
				<li><a href="#two"><span><?php echo $label['chars_nonplaying'];?></span></a></li>
			</ul>

			<div id="one">
				<?php if (isset($unassigned['active'])): ?>
					<table class="zebra fn-usr-table">
						<tbody>
						<?php foreach ($unassigned['active'] as $key => $p): ?>
							<tr>
								<td>
									<?php echo text_output($p['name'], 'span', 'fn-usr-name');?>
									<?php echo text_output($p['position'], 'span', 'fn-usr-sub');?>
								</td>
								<td class="fn-usr-actions">
									<?php if ($count_active < $this->options['allowed_chars_playing']): ?>
										<?php echo anchor('user/characterlink/'. $user .'/add/'. $key, img($images['add']), array('class' => 'image'));?>
									<?php endif;?>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				<?php else: ?>
					<?php echo text_output($label['nocharacters'], 'h3', 'fn-set-empty');?>
				<?php endif;?>
			</div>

			<div id="two">
				<?php if (isset($unassigned['npc'])): ?>
					<div class="search fn-usr-search"></div>
					<table class="zebra fn-usr-table search_npcs">
						<tbody>
						<?php foreach ($unassigned['npc'] as $key => $n): ?>
							<tr>
								<td>
									<?php echo text_output($n['name'], 'span', 'fn-usr-name');?>
									<?php echo text_output($n['position'], 'span', 'fn-usr-sub');?>
								</td>
								<td class="fn-usr-actions">
									<?php if ($count_npc < $this->options['allowed_chars_npc']): ?>
										<?php echo anchor('user/characterlink/'. $user .'/add/'. $key, img($images['add']), array('class' => 'image'));?>
									<?php endif;?>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				<?php else: ?>
					<?php echo text_output($label['nocharacters'], 'h3', 'fn-set-empty');?>
				<?php endif;?>
			</div>
		</div>
	<?php endif;?>
</div>
