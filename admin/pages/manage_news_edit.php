<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<p class="fn-per-back"><?php echo anchor('manage/news', $label['back']);?></p>

<div class="fn-write">
	<div class="fn-write-panel">
		<?php echo form_open('manage/news/edit/'. $id .'/update');?>

			<div class="fn-write-head"><span class="fn-write-glyph">&#8961;</span><h3><?php echo $header;?></h3></div>

			<div class="fn-write-grid">
				<div class="fn-write-field">
					<kbd><?php echo $label['status'];?></kbd>
					<?php if (Auth::get_access_level() == 2): ?>
						<div class="fn-write-select">
							<?php echo form_dropdown('news_status', $status, $inputs['status'], 'class="w-1/4"');?>
						</div>
					<?php else: ?>
						<span class="fn-mc-static"><?php echo ucfirst($inputs['status']);?></span>
						<?php echo form_hidden('news_status', $inputs['status']);?>
					<?php endif;?>
				</div>

				<div class="fn-write-field">
					<kbd><?php echo $label['author'];?></kbd>
					<?php if (Auth::get_access_level() == 2): ?>
						<?php echo form_dropdown('news_author', $all, $inputs['author'], 'class="chosen"');?>
					<?php else: ?>
						<span class="fn-mc-static"><?php echo $inputs['character'];?></span>
						<?php echo form_hidden('news_author', $inputs['author']);?>
					<?php endif;?>
				</div>

				<div class="fn-write-field fn-write-full fn-write-title">
					<kbd><?php echo $label['title'];?></kbd>
					<?php echo form_input($inputs['title']);?>
				</div>

				<div class="fn-write-field">
					<kbd><?php echo $label['category'];?></kbd>
					<?php if (Auth::get_access_level() == 2): ?>
						<div class="fn-write-select">
							<?php echo form_dropdown('news_cat', $categories, $inputs['category'], 'class="w-1/4"');?>
						</div>
					<?php else: ?>
						<span class="fn-mc-static"><?php echo $inputs['category_name'];?></span>
						<?php echo form_hidden('news_cat', $inputs['category']);?>
					<?php endif;?>
				</div>

				<div class="fn-write-field">
					<kbd><?php echo $label['private'];?></kbd>
					<?php if (Auth::get_access_level() == 2): ?>
						<div class="fn-write-select">
							<?php echo form_dropdown('news_private', $private, $inputs['private'], 'class="w-1/4"');?>
						</div>
					<?php else: ?>
						<span class="fn-mc-static"><?php echo $inputs['private_long'];?></span>
						<?php echo form_hidden('news_private', $inputs['private']);?>
					<?php endif;?>
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
			</div>

			<div class="fn-write-actions">
				<?php echo form_button($buttons['update']);?>
			</div>

		<?php echo form_close();?>
	</div>
</div>
