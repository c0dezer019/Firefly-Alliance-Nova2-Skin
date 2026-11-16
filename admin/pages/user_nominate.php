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

	<?php if (Auth::get_access_level('user/nominate') > 1): ?>
		<div id="tabs">
			<ul>
				<li><a href="#one"><span><?php echo $label['nominate'];?></span></a></li>
				<li><a href="#two"><span><?php echo $label['nominatequeue'];?></span></a></li>
			</ul>

			<div id="one">
	<?php endif;?>

			<?php if (isset($awards)): ?>
			<?php echo form_open('user/nominate');?>
				<div class="fn-usr-grid">
					<kbd class="fn-set-label"><?php echo $label['award'];?></kbd>
					<div class="fn-usr-ctl">
						<span class="fn-usr-inline">
							<?php echo form_dropdown('award', $awards, '', 'id="awards"');?>
							<span id="loading" class="hidden"><?php echo img($images['loading']);?></span>
						</span>
						<div class="award-desc fn-usr-hint"></div>
					</div>

					<kbd class="fn-set-label"><?php echo $label['character'];?></kbd>
					<span class="char-menu"><?php echo text_output($label['choose'], 'span', 'fn-usr-hint');?></span>

					<kbd class="fn-set-label"><?php echo $label['reason'];?></kbd>
					<?php echo form_textarea($inputs['reason']);?>
				</div>

				<div class="fn-set-actions fn-usr-act"><?php echo form_button($buttons['submit']);?></div>
			<?php echo form_close();?>
			<?php else: ?>
				<?php echo text_output($label['noawards'], 'h3', 'fn-set-empty');?>
			<?php endif;?>

	<?php if (Auth::get_access_level('user/nominate') > 1): ?>
			</div>

			<div id="two">
				<?php if (isset($nominations)): ?>
					<?php echo form_open('user/nominate/queue');?>
						<div class="fn-usr-list">
							<div class="fn-usr-row fn-usr-row-head">
								<div><?php echo $label['awardee'];?></div>
								<div><?php echo $label['reason'];?></div>
								<div></div>
							</div>
							<?php foreach ($nominations as $n): ?>
								<div class="fn-usr-row">
									<div class="fn-usr-main">
										<strong class="fn-usr-name"><?php echo $n['awardee'];?></strong>
										<span class="fn-usr-sub">
											<strong><?php echo $n['award'];?></strong><br />
											<?php echo $label['by'] .' '. $n['nominator'];?><br />
											<?php echo $label['on'] .' '. $n['date'];?>
										</span>
									</div>
									<div class="fn-usr-aux"><?php echo $n['reason'];?></div>
									<div class="fn-usr-actions">
										<a href="#" rel="facebox" myAction="reject" class="image" myID="<?php echo $n['id'];?>">
											<?php echo img($images['reject']);?>
										</a>
										<a href="#" rel="facebox" myAction="approve" class="image" myID="<?php echo $n['id'];?>">
											<?php echo img($images['accept']);?>
										</a>
									</div>
								</div>
							<?php endforeach;?>
						</div>
					<?php echo form_close();?>
				<?php else: ?>
					<?php echo text_output($label['nonominations'], 'h3', 'fn-set-empty');?>
				<?php endif;?>
			</div>
		</div>
	<?php endif;?>
</div>
