<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<p class="fn-per-back"><?php echo anchor('manage/logs', $label['back']);?></p>

<div class="fn-write">
	<div class="fn-write-panel">
		<?php echo form_open('manage/logs/edit/'. $id .'/update');?>

			<div class="fn-write-head"><span class="fn-write-glyph">&#8961;</span><h3><?php echo $header;?></h3></div>

			<div class="fn-write-grid">
				<div class="fn-write-field">
					<kbd><?php echo $label['status'];?></kbd>
					<?php if (Auth::get_access_level() == 2): ?>
						<div class="fn-write-select">
							<?php echo form_dropdown('log_status', $status, $inputs['status'], 'class="w-1/4"');?>
						</div>
					<?php else: ?>
						<span class="fn-mc-static"><?php echo ucfirst($inputs['status']);?></span>
						<?php echo form_hidden('log_status', $inputs['status']);?>
					<?php endif;?>
				</div>

				<div class="fn-write-field">
					<kbd><?php echo $label['author'];?></kbd>
					<?php if (Auth::get_access_level() == 2): ?>
						<?php echo form_dropdown('log_author', $all, $inputs['author'], 'class="chosen"');?>
					<?php else: ?>
						<span class="fn-mc-static"><?php echo $inputs['character'];?></span>
						<?php echo form_hidden('log_author', $inputs['author']);?>
					<?php endif;?>
				</div>

				<div class="fn-write-field fn-write-full fn-write-title">
					<kbd><?php echo $label['title'];?></kbd>
					<?php echo form_input($inputs['title']);?>
				</div>

				<div class="fn-write-field fn-write-full">
					<kbd><?php echo $label['tags'];?></kbd>
					<?php echo form_input($inputs['tags']);?>
					<span class="fn-write-hint"><?php echo $label['tags_inst'];?></span>
				</div>
			</div>

			<div class="fn-write-head"><span class="fn-write-glyph">&#8961;</span><h3><?php echo $label['content'];?></h3></div>

			<div class="fn-write-body">
				<?php echo form_textarea($inputs['content']);?>
				<div class="counter fn-write-count">
					<?php echo $label['total_words'];?>: <span id="counter">0</span>
				</div>
			</div>

			<div class="fn-write-actions">
				<?php echo form_button($buttons['update']);?>
			</div>

		<?php echo form_close();?>
	</div>
</div>
