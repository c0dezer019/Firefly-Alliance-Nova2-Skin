<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-char">
	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['character'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['info'];?></span></a></li>
		</ul>

	<?php echo form_open('characters/create');?>
		<div id="one">
			<div class="fn-form-fields">
				<div class="fn-field">
					<kbd><?php echo $label['type'];?></kbd>
					<?php echo form_dropdown('type', $type, 'npc');?>
				</div>

				<div class="fn-field-row">
					<div class="fn-field">
						<kbd><?php echo $label['fname'];?></kbd>
						<?php echo form_input($inputs['first_name']);?>
					</div>
					<div class="fn-field">
						<kbd><?php echo $label['mname'];?></kbd>
						<?php echo form_input($inputs['middle_name']);?>
					</div>
				</div>

				<div class="fn-field-row">
					<div class="fn-field">
						<kbd><?php echo $label['lname'];?></kbd>
						<?php echo form_input($inputs['last_name']);?>
					</div>
					<div class="fn-field">
						<kbd><?php echo $label['suffix'];?></kbd>
						<?php echo form_input($inputs['suffix']);?>
					</div>
				</div>

				<div class="fn-field">
					<kbd><?php echo $label['position1'];?></kbd>
					<?php echo form_dropdown_position('position_1', $inputs['position1_id'], 'id="position1"', 'open');?>
					<span id="loading_pos1" class="hidden fn-char-spin"><?php echo img($images['loading']);?></span>
					<div id="position1_desc" class="fn-char-desc"><?php echo text_output($inputs['position1_desc'], '');?></div>
				</div>

				<div class="fn-field">
					<kbd><?php echo $label['position2'];?></kbd>
					<?php echo form_dropdown_position('position_2', $inputs['position2_id'], 'id="position2"', 'open');?>
					<span id="loading_pos2" class="hidden fn-char-spin"><?php echo img($images['loading']);?></span>
					<div id="position2_desc" class="fn-char-desc"><?php echo text_output($inputs['position2_desc'], '');?></div>
				</div>

				<div class="fn-field">
					<kbd><?php echo $label['rank'];?></kbd>
					<?php echo form_dropdown_rank('rank', $inputs['rank_id'], 'id="rank"');?>
					<span id="loading_rank" class="hidden fn-char-spin"><?php echo img($images['loading']);?></span>
					<div id="rank_img" class="fn-char-desc"><?php echo img($inputs['rank']);?></div>
				</div>
			</div>
		</div>

		<div id="two">
			<?php if (isset($join)): ?>
				<?php foreach ($join as $a): ?>
					<?php if (isset($a['fields'])): ?>
						<h3 class="fn-char-sub"><?php echo $a['name'];?></h3>

						<div class="fn-form-fields">
							<?php foreach ($a['fields'] as $f): ?>
								<div class="fn-field">
									<kbd><?php echo $f['field_label'];?></kbd>
									<?php echo $f['input'];?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<div class="fn-char-submit"><?php echo form_button($button['submit']);?></div>
	<?php echo form_close();?>
	</div>
</div>
