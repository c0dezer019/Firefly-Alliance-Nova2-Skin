<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<?php if (isset($missions) and  ! $missions): ?>
	<div class="fn-form-notice"><?php echo $label['no_mission'];?></div>
<?php else: ?>
	<div class="fn-write">

	<?php if ($this->options['use_mission_notes'] == 'y'): ?>
		<div id="notes" class="fn-write-notes">
			<a href="#" id="toggle_notes" class="fn-write-notes-toggle"><?php echo $label['showhide'];?></a>
			<h3><?php echo $label['mission_notes'];?> <small><?php echo $label['note_last_updated'];?></small></h3>
			<div class="notes_content hidden">
				<?php if ($missionNotesUpdate === true): ?>
					<span class="fn-write-badge"><?php echo $label['updated'];?></span>
				<?php endif;?>
				<?php if (isset($mission)): ?>
					<?php echo text_output($mission['notes']);?>
				<?php elseif (isset($mission_notes)): ?>
					<?php foreach ($mission_notes as $m): ?>
						<?php echo text_output($m['title'], 'p', 'bold');?>
						<?php echo text_output($m['notes']);?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	<div id="editable" class="fn-write-panel">
		<?php echo form_open($form_action, array('id' => 'writepost'));?>

			<div class="fn-write-head"><span class="fn-write-glyph">&#8961;</span><h3>Post Details</h3></div>

			<div class="fn-write-grid">
				<?php if (isset($all_characters) and is_array($all_characters)): ?>
					<div class="fn-write-field fn-write-full">
						<kbd><?php echo $label['authors'];?></kbd>
						<span id="chosen-incompat" class="fn-write-hint hidden"><?php echo $label['chosen_incompat'];?></span>
						<?php echo form_multiselect('authors[]', $all_characters, $authors_selected, 'id="all" class="chosen" title="'.$label['select'].'"');?>
					</div>
				<?php endif;?>

				<div class="fn-write-field fn-write-full">
					<kbd><?php echo $label['mission'];?></kbd>
					<?php if (isset($missions)): ?>
						<?php echo form_dropdown('mission', $missions, $inputs['mission'], 'class="chosen"');?>
					<?php else: ?>
						<span class="fn-write-static"><?php echo anchor('sim/missions/id/'. $mission['id'], $mission['title']); ?></span>
						<?php echo form_hidden('mission', $mission['id']);?>
					<?php endif; ?>
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
					<span class="fn-write-hint"><?php echo $label['tags_sep'];?></span>
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

	<div id="readonly" class="fn-write-panel hidden">
		<div class="fn-write-head"><span class="fn-write-glyph">&#8961;</span><h3><?php echo $header;?></h3></div>

		<div class="fn-write-readbody">
			<p class="fn-write-links">
				<?php echo anchor('write/index', $label['back_wcp']);?>
				&middot;
				<?php echo anchor('write/missionpost/'.$this->uri->segment(3), $label['more_edits']);?>
			</p>

			<?php if ($inputs['locked']): ?>
				<div id="notes" class="fn-write-notes fn-write-locked">
					<h4><?php echo $label['locked'];?></h4>
				</div>
			<?php endif;?>

			<div class="fn-kv-list">
				<div class="fn-kv">
					<span class="k"><?php echo $label['authors'];?></span>
					<div class="v"><?php echo $this->char->get_authors(implode(',', $authors_selected));?></div>
				</div>

				<div class="fn-kv">
					<span class="k"><?php echo $label['mission'];?></span>
					<div class="v">
						<?php if (isset($missions)): ?>
							<?php echo anchor('sim/missions/id/'.$inputs['mission'], $this->mis->get_mission($inputs['mission'], 'mission_title'));?>
						<?php else: ?>
							<?php echo anchor('sim/missions/id/'. $mission['id'], $mission['title']); ?>
						<?php endif; ?>
					</div>
				</div>

				<div class="fn-kv">
					<span class="k"><?php echo $label['title'];?></span>
					<div class="v"><?php echo $inputs['title']['value'];?></div>
				</div>

				<div class="fn-kv">
					<span class="k"><?php echo $label['location'];?></span>
					<div class="v"><?php echo $inputs['location']['value'];?></div>
				</div>

				<div class="fn-kv">
					<span class="k"><?php echo $label['timeline'];?></span>
					<div class="v"><?php echo $inputs['timeline']['value'];?></div>
				</div>

				<div class="fn-kv">
					<span class="k"><?php echo $label['content'];?></span>
					<div class="v fn-write-readcontent"><?php echo nl2br($inputs['content']['value']);?></div>
				</div>

				<div class="fn-kv">
					<span class="k"><?php echo $label['tags'];?></span>
					<div class="v"><?php echo $inputs['tags']['value'];?></div>
				</div>
			</div>
		</div>
	</div>

	</div>
<?php endif;?>
