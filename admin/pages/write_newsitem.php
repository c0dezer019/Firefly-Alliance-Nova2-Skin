<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-write">
	<div class="fn-write-panel">
		<?php echo form_open($form_action);?>

			<div class="fn-write-head"><span class="fn-write-glyph">&#8961;</span><h3><?php echo ucfirst(lang('labels_details'));?></h3></div>

			<div class="fn-write-grid">
				<div class="fn-write-field fn-write-full fn-write-picker">
					<kbd><?php echo $label['author'];?></kbd>
					<span class="fn-write-static"><?php echo $character['name'];?></span>
					<?php echo form_hidden('author', $character['id']);?>
				</div>

				<div class="fn-write-field">
					<kbd><?php echo $label['category'];?></kbd>
					<div class="fn-write-select">
						<?php echo form_dropdown('newscat', $values['category'], $key['cat']);?>
					</div>
				</div>

				<div class="fn-write-field">
					<kbd><?php echo $label['type'];?></kbd>
					<div class="fn-write-select">
						<?php echo form_dropdown('private', $values['private'], $key['private']);?>
					</div>
				</div>

				<div class="fn-write-field fn-write-full fn-write-title">
					<kbd><?php echo $label['title'];?></kbd>
					<?php echo form_input($inputs['title']);?>
				</div>

				<div class="fn-write-field fn-write-full">
					<kbd><?php echo $label['tags'];?></kbd>
					<?php echo form_input($inputs['tags']);?>
					<span class="fn-write-hint"><?php echo $label['tags_sep'];?> <?php echo img($images['help']);?></span>
				</div>
			</div>

			<div class="fn-write-head"><span class="fn-write-glyph">&#8961;</span><h3><?php echo $label['content'];?></h3></div>

			<div class="fn-write-body">
				<?php echo form_textarea($inputs['content']);?>
			</div>

			<div class="fn-write-actions">
				<?php echo form_button($inputs['post']);?>
				<?php echo form_button($inputs['save']);?>
				<?php echo anchor('write/index', $label['back_wcp'], array('class' => 'fn-write-back'));?>

				<?php if ($this->uri->segment(3) !== false): ?>
					<span class="fn-write-spacer"></span>
					<?php echo form_button($inputs['delete']);?>
				<?php endif; ?>
			</div>

		<?php echo form_close();?>
	</div>
</div>
