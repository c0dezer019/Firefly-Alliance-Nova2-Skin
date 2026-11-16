<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<p class="fn-per-back"><?php echo anchor('manage/missions', $label['back']);?></p>

<?php if ($id === false): ?>
	<div class="fn-form-notice"><?php echo $label['images_later'];?></div>
<?php endif;?>

<div class="fn-admin-dash fn-write">
<?php if ($id !== false): ?>
	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['info'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['images'];?></span></a></li>
		</ul>
<?php endif;?>

<?php if ($id !== false): ?>
		<div id="one">
<?php endif;?>
			<div class="fn-write-panel">
				<?php echo form_open('manage/missions/'. $form);?>
					<div class="fn-write-head"><span class="fn-write-glyph">&#8961;</span><h3><?php echo $header;?></h3></div>

					<div class="fn-write-grid">
						<div class="fn-write-field fn-write-full fn-write-title">
							<kbd><?php echo $label['title'];?></kbd>
							<?php echo form_input($inputs['title']);?>
						</div>

						<div class="fn-write-field">
							<kbd><?php echo $label['status'];?></kbd>
							<div class="fn-write-select">
								<?php echo form_dropdown('mission_status', $values['status'], $inputs['status']);?>
							</div>
							<?php echo form_hidden('mission_oldstatus', $inputs['status']);?>
						</div>

						<div class="fn-write-field">
							<kbd><?php echo $label['order'];?></kbd>
							<?php echo form_input($inputs['order']);?>
						</div>

						<div class="fn-write-field fn-write-full">
							<kbd>
								<?php echo $label['group'];?>
								&nbsp;
								<?php echo anchor('manage/missiongroups', $label['managegroups'], array('class' => 'edit fn-mc-kbd-link'));?>
							</kbd>
							<?php if (isset($groups)): ?>
								<div class="fn-write-select">
									<?php echo form_dropdown('mission_group', $groups, $inputs['group']);?>
								</div>
							<?php else: ?>
								<span class="fn-write-hint fn-mc-warn"><?php echo $label['nogroups'];?></span>
								<?php echo form_hidden('mission_group', 0);?>
							<?php endif;?>
						</div>

						<div class="fn-write-field">
							<kbd><?php echo $label['start'];?></kbd>
							<?php echo form_input($inputs['start']);?>
						</div>

						<div class="fn-write-field">
							<kbd><?php echo $label['end'];?></kbd>
							<?php echo form_input($inputs['end']);?>
						</div>
					</div>

					<div class="fn-write-grid fn-mc-short">
						<div class="fn-write-field fn-write-full">
							<kbd><?php echo $label['desc'];?></kbd>
							<?php echo form_textarea($inputs['desc']);?>
						</div>

						<div class="fn-write-field fn-write-full">
							<kbd><?php echo $label['summary'];?></kbd>
							<?php echo form_textarea($inputs['summary']);?>
						</div>

						<div class="fn-write-field fn-write-full">
							<kbd><?php echo $label['notes'];?></kbd>
							<?php echo form_textarea($inputs['notes']);?>
							<?php echo form_hidden('mission_oldnotes', $inputs['notes']['value']);?>
						</div>
					</div>

					<?php echo form_hidden('id', $id);?>
					<div class="fn-write-actions">
						<?php echo form_button($buttons['submit']);?>
					</div>
				<?php echo form_close();?>
			</div>
<?php if ($id !== false): ?>
		</div>

		<div id="two" class="fn-mc-images">
			<p class="fn-mc-upload"><?php echo anchor('upload/index', $label['upload'], array('class' => 'fn-mg-btn fn-mg-btn-add'));?></p>

			<div class="subtabs">
				<ul>
					<li><a href="#five"><span><?php echo $label['mission_images'];?></span></a></li>
					<li><a href="#six"><span><?php echo $label['available_images'];?></span></a></li>
				</ul>

				<div id="five">
					<div class="fn-mc-update">
						<?php echo form_button($buttons['update']);?>
						<span id="loading_upload_update" class="hidden"><?php echo img($images['loading']);?></span>
					</div>

					<ul id="list-grid">
					<?php if (is_array($inputs['images']) && count($inputs['images']) > 0): ?>
						<?php foreach ($inputs['images'] as $i): ?>
							<?php $image = array('src' => base_url().Location::asset('images/missions', $i), 'width' => 130);?>
							<li id="img_<?php echo str_replace('.', '\\.', $i);?>"><a href="#" class="image upload-close" remove="<?php echo str_replace('.', '\\.', $i);?>">x</a><?php echo img($image);?></li>
						<?php endforeach;?>
					<?php endif;?>
					</ul>
				</div>

				<div id="six">
					<?php if (isset($directory)): ?>
						<div class="fn-log-panel">
							<?php foreach ($directory as $d): ?>
								<div class="fn-log-row fn-mc-filerow">
									<div class="fn-mc-filename"><?php echo $d['file'];?></div>
									<div class="fn-mc-filethumb"><?php echo img($d['image']);?></div>
									<div class="fn-mc-fileact"><?php echo form_button($buttons['use']);?></div>
								</div>
							<?php endforeach;?>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
</div>
