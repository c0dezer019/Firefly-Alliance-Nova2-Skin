<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">加入 · JOIN</span>
</div>

<?php if (! empty($msg)): ?>
	<p class="fn-form-intro"><?php echo text_output($msg, '');?></p>
<?php endif;?>

<?php echo form_open('main/join');?>

	<!-- 01 — User Information -->
	<div class="fn-form-panel fn-join-section">
		<div class="fn-join-head"><span class="fn-join-num">01</span><span class="fn-join-sec-title"><?php echo $label['user_info'];?></span></div>
		<div class="fn-form-fields">
			<div class="fn-field"><label><?php echo $label['name'];?></label><?php echo form_input($inputs['name']);?></div>
			<div class="fn-field"><label><?php echo $label['email'];?></label><?php echo form_input($inputs['email']);?></div>
			<div class="fn-field"><label><?php echo $label['password'];?></label><?php echo form_password($inputs['password']);?></div>
			<div class="fn-field"><label><?php echo $label['dob'];?></label><?php echo form_input($inputs['dob']);?></div>
			<div class="fn-field">
				<label><?php echo $label['im'];?></label>
				<p class="fn-join-field-help"><?php echo $label['im_inst'];?></p>
				<?php echo form_textarea($inputs['im']);?>
			</div>
		</div>
	</div>

	<!-- 02 — Character Basics -->
	<div class="fn-form-panel fn-join-section">
		<div class="fn-join-head"><span class="fn-join-num">02</span><span class="fn-join-sec-title"><?php echo $label['character'];?></span></div>
		<div class="fn-form-fields">
			<div class="fn-field-row">
				<div class="fn-field"><label><?php echo $label['fname'];?></label><?php echo form_input($inputs['first_name']);?></div>
				<div class="fn-field"><label><?php echo $label['mname'];?></label><?php echo form_input($inputs['middle_name']);?></div>
			</div>
			<div class="fn-field-row">
				<div class="fn-field"><label><?php echo $label['lname'];?></label><?php echo form_input($inputs['last_name']);?></div>
				<div class="fn-field"><label><?php echo $label['suffix'];?></label><?php echo form_input($inputs['suffix']);?></div>
			</div>
			<div class="fn-field">
				<label><?php echo $label['position'];?></label>
				<?php echo form_dropdown_position('position_1', $selected_position, 'id="position"', 'open');?>
				<span id="loading_update" class="hidden fontSmall gray"><?php echo img($loading);?></span>
				<p id="position_desc" class="fn-join-posdesc"><?php echo text_output($pos_desc, '');?></p>
			</div>
		</div>
	</div>

	<!-- 03 — Character Information (dynamic bio fields) -->
	<?php if (isset($join)): ?>
		<div class="fn-form-panel fn-join-section">
			<div class="fn-join-head"><span class="fn-join-num">03</span><span class="fn-join-sec-title"><?php echo $label['character_info'];?></span></div>
			<?php foreach ($join as $a): ?>
				<?php if (isset($a['fields'])): ?>
					<div class="fn-join-group-title"><?php echo $a['name'];?></div>
					<div class="fn-form-fields fn-join-group">
						<?php foreach ($a['fields'] as $f): ?>
							<div class="fn-field">
								<label><?php echo $f['field_label'];?></label>
								<?php if (! empty($f['field_help'])): ?>
									<p class="fn-join-field-help"><?php echo $f['field_help'];?></p>
								<?php endif;?>
								<?php echo $f['input'];?>
							</div>
						<?php endforeach;?>
					</div>
				<?php endif;?>
			<?php endforeach;?>
		</div>
	<?php endif;?>

	<!-- 04 — Sample Post (optional) -->
	<?php if ($this->options['use_sample_post'] == 'y'): ?>
		<div class="fn-form-panel fn-join-section">
			<div class="fn-join-head"><span class="fn-join-num">04</span><span class="fn-join-sec-title"><?php echo $label['samplepost'];?></span></div>
			<p class="fn-join-field-help"><?php echo $sample_post_msg;?></p>
			<?php echo form_textarea($inputs['sample_post']);?>
		</div>
	<?php endif;?>

	<?php echo form_hidden('submit', 'y');?>
	<div class="fn-form-actions fn-join-submit">
		<?php echo form_button($button['submit']);?>
		&nbsp;
		<?php echo form_button($button['next']);?>
	</div>
<?php echo form_close();?>
