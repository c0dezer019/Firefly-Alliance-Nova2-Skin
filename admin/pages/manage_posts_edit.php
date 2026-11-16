<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<p class="fn-per-back"><?php echo anchor('manage/posts', $label['back']);?></p>

<div class="fn-write">
	<div class="fn-write-panel">
		<?php echo form_open('manage/posts/edit/'. $id .'/update');?>

			<div class="fn-write-head"><span class="fn-write-glyph">&#8961;</span><h3><?php echo $header;?></h3></div>

			<div class="fn-write-grid">
				<div class="fn-write-field fn-write-full">
					<kbd><?php echo $label['status'];?></kbd>
					<?php if (Auth::get_access_level() == 2): ?>
						<div class="fn-write-select">
							<?php echo form_dropdown('post_status', $status, $inputs['status'], 'class="w-1/4"');?>
						</div>
					<?php else: ?>
						<span class="fn-mc-static"><?php echo ucfirst($inputs['status']);?></span>
						<?php echo form_hidden('post_status', $inputs['status']);?>
					<?php endif;?>
				</div>

				<?php if (isset($all_characters) and is_array($all_characters)): ?>
					<div class="fn-write-field fn-write-full">
						<kbd><?php echo $label['authors'];?></kbd>
						<span id="chosen-incompat" class="fn-write-hint hidden"><?php echo $label['chosen_incompat'];?></span>
						<?php echo form_multiselect('authors[]', $all_characters, $authors_selected, 'id="all" class="chosen" title="'.$label['select'].'"');?>
					</div>
				<?php endif;?>

				<div class="fn-write-field fn-write-full">
					<kbd><?php echo $label['mission'];?></kbd>
					<?php if (Auth::get_access_level() == 2): ?>
						<?php echo form_dropdown('post_mission', $missions, $inputs['mission'], 'class="large chosen"');?>
					<?php else: ?>
						<span class="fn-mc-static"><?php echo ucfirst($inputs['mission_name']);?></span>
						<?php echo form_hidden('post_mission', $inputs['mission']);?>
					<?php endif;?>
				</div>

				<div class="fn-write-field fn-write-full fn-write-title">
					<kbd><?php echo $label['title'];?></kbd>
					<?php echo form_input($inputs['title']);?>
				</div>

				<div class="fn-write-field">
					<kbd><?php echo $label['location'];?></kbd>
					<?php echo form_input($inputs['location']);?>
				</div>

				<div class="fn-write-field">
					<kbd><?php echo $label['timeline'];?></kbd>
					<?php echo form_input($inputs['timeline']);?>
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
