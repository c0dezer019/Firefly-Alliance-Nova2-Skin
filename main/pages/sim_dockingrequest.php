<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">对接请求 · DOCKING REQUEST</span>
</div>

<div class="fn-doc-stack fn-arch-gap">
	<div class="fn-doc-panel accent"><?php echo text_output($docking_inst, '');?></div>
</div>

<?php echo form_open('sim/dockingrequest');?>
	<div class="fn-form-panel">
		<div class="fn-form-fields">
			<div class="fn-per-subhead fn-arch-flushhead"><?php echo $label['info'];?></div>
			<div class="fn-field-row">
				<div class="fn-field">
					<label><?php echo $label['name'];?></label>
					<?php echo form_input($inputs['sim_name']);?>
				</div>
				<div class="fn-field">
					<label><?php echo $label['url'];?></label>
					<?php echo form_input($inputs['sim_url']);?>
				</div>
			</div>

			<div class="fn-per-subhead"><?php echo $label['gm_info'];?></div>
			<div class="fn-field-row">
				<div class="fn-field">
					<label><?php echo $label['gm_name'];?></label>
					<?php echo form_input($inputs['gm_name']);?>
				</div>
				<div class="fn-field">
					<label><?php echo $label['gm_email'];?></label>
					<?php echo form_input($inputs['gm_email']);?>
				</div>
			</div>

			<?php if (isset($docking)): ?>
				<?php foreach ($docking as $a): ?>
					<?php if (isset($a['fields'])): ?>
						<div class="fn-per-subhead"><?php echo $a['name'];?></div>
						<?php foreach ($a['fields'] as $f): ?>
							<div class="fn-field">
								<label><?php echo $f['field_label'];?></label>
								<?php if (! empty($f['field_help'])): ?>
									<p class="fn-field-help"><?php echo $f['field_help'];?></p>
								<?php endif;?>
								<?php echo $f['input'];?>
							</div>
						<?php endforeach;?>
					<?php endif;?>
				<?php endforeach;?>
			<?php endif;?>

			<div class="fn-honeypot"><?php echo form_input($inputs['check']);?></div>

			<div class="fn-form-actions">
				<?php echo form_button($button_submit);?>
			</div>
		</div>
	</div>
<?php echo form_close();?>
