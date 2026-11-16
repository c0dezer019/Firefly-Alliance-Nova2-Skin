<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">联系 · CONTACT</span>
</div>

<?php echo text_output($msg);?>

<?php if ($this->options['system_email'] == 'on' && $this->options['contact_form_enabled'] == 'y' && $has_game_masters): ?>
	<?php echo form_open('main/contact');?>
		<div class="fn-form-panel">
			<p class="fn-form-intro">Transmissions are encrypted and routed through the tight-beam relay. The Game Master typically responds within 24&ndash;48 hours.</p>

			<div class="fn-form-fields">
				<div class="fn-field">
					<label><?php echo $label['subject'];?></label>
					<?php echo form_error('subject');?>
					<?php echo form_input($inputs['subject']);?>
				</div>

				<div class="fn-field-row">
					<div class="fn-field">
						<label><?php echo $label['name'];?></label>
						<?php echo form_error('name');?>
						<?php echo form_input($inputs['name']);?>
					</div>
					<div class="fn-field">
						<label><?php echo $label['email'];?></label>
						<?php echo form_error('email');?>
						<?php echo form_input($inputs['email']);?>
					</div>
				</div>

				<div class="fn-field">
					<label><?php echo $label['message'];?></label>
					<?php echo form_error('message');?>
					<?php echo form_textarea($inputs['message']);?>
				</div>

				<div class="fn-honeypot">
					<?php echo form_input($inputs['honeypot']);?>
				</div>

				<div class="fn-form-actions">
					<?php echo form_button($button['submit']);?>
				</div>
			</div>
		</div>
	<?php echo form_close();?>
<?php else: ?>
	<?php if ($this->options['system_email'] == 'off'): ?>
		<p class="fn-form-notice"><?php echo $label['nosubmit'];?></p>
	<?php else: ?>
		<?php if ($this->options['contact_form_enabled'] == 'n' || ! $has_game_masters): ?>
			<p class="fn-form-notice"><?php echo $label['nosubmit_contact_form_disabled'];?></p>
		<?php endif;?>
	<?php endif;?>
<?php endif;?>
