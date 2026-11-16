<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-usr">
	<div class="fn-set-intro"><?php echo text_output($text);?></div>

	<p class="fn-set-manage">
		<a href="#" class="addtoggle image fn-set-add"><?php echo img($images['add']) .' '. $label['add'];?></a>
	</p>

	<div class="addban info-full hidden fn-usr-panel">
		<?php echo form_open('site/bans/add');?>
			<div class="fn-usr-grid">
				<kbd class="fn-set-label"><?php echo $label['level'];?></kbd>
				<span class="fn-set-radios">
					<?php echo form_radio($inputs['level_1']) .' '. form_label($label['level_1_label'], 'level_1');?>
					<?php echo form_radio($inputs['level_2']) .' '. form_label($label['level_2_label'], 'level_2');?>
				</span>

				<kbd class="fn-set-label"><?php echo $label['type'];?></kbd>
				<div class="fn-usr-ctl">
					<span class="fn-usr-hint"><?php echo $label['email'] .' ('.$label['email_note'].')';?></span>
					<?php echo form_input($inputs['email']);?>
					<span class="fn-usr-hint"><?php echo $label['ip'];?></span>
					<?php echo form_input($inputs['ip']);?>
				</div>

				<kbd class="fn-set-label"><?php echo $label['reason'];?></kbd>
				<?php echo form_textarea($inputs['reason']);?>
			</div>
			<?php echo form_input($inputs['date']);?>
			<div class="fn-set-actions fn-usr-act"><?php echo form_button($buttons['add']);?></div>
		<?php echo form_close();?>
	</div>

	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['level_1'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['level_2'];?></span></a></li>
		</ul>

		<div id="one">
			<?php if (isset($bans[1])): ?>
				<div class="fn-usr-list">
					<?php foreach ($bans[1] as $b): ?>
						<div class="fn-usr-row fn-usr-row-ban">
							<div class="fn-usr-main">
								<strong class="fn-usr-name">
									<?php if (empty($b['ip'])): ?>
										<?php echo $b['email'];?>
									<?php else: ?>
										<?php echo $b['ip'];?>
									<?php endif;?>
								</strong>
								<span class="fn-usr-sub">
									<?php echo $label['date'] .' '. $b['date'];?><br/>
									<?php echo $b['span'];?>
								</span>
							</div>
							<div class="fn-usr-aux"><?php echo $b['reason'];?></div>
							<div class="fn-usr-actions">
								<a href="#" rel="facebox" myID="<?php echo $b['id'];?>" class="image"><?php echo img($images['delete']);?></a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php else: ?>
				<?php echo text_output($label['no_bans'], 'h3', 'fn-set-empty');?>
			<?php endif; ?>
		</div>

		<div id="two">
			<?php if (isset($bans[2])): ?>
				<div class="fn-usr-list">
					<?php foreach ($bans[2] as $b): ?>
						<div class="fn-usr-row fn-usr-row-ban">
							<div class="fn-usr-main">
								<strong class="fn-usr-name">
									<?php echo $b['ip'];?>
								</strong>
								<span class="fn-usr-sub">
									<?php echo $label['date'] .' '. $b['date'];?><br/>
									<?php echo $b['span'];?>
								</span>
							</div>
							<div class="fn-usr-aux"><?php echo $b['reason'];?></div>
							<div class="fn-usr-actions">
								<a href="#" rel="facebox" myID="<?php echo $b['id'];?>" class="image"><?php echo img($images['delete']);?></a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php else: ?>
				<?php echo text_output($label['no_bans'], 'h3', 'fn-set-empty');?>
			<?php endif; ?>
		</div>
	</div>
</div>
