<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-struct">
	<p class="fn-st-links"><?php echo anchor('manage/docked', $label['back']);?></p>

	<?php echo form_open('manage/docked/edit/'. $id);?>
		<div class="fn-st-form-panel">
			<h3 class="fn-st-section"><?php echo $label['info'];?></h3>
			<div class="fn-st-group-form">
				<div class="fn-st-field">
					<kbd><?php echo $label['sim_name'];?></kbd>
					<?php echo form_input($inputs['sim_name']);?>
				</div>
				<div class="fn-st-field">
					<kbd><?php echo $label['sim_url'];?></kbd>
					<?php echo form_input($inputs['sim_url']);?>
				</div>
				<div class="fn-st-field">
					<kbd><?php echo $label['status'];?></kbd>
					<?php echo form_dropdown('docking_status', $values, $status);?>
				</div>
			</div>

			<h3 class="fn-st-section"><?php echo $label['gm_info'];?></h3>
			<div class="fn-st-group-form">
				<div class="fn-st-field">
					<kbd><?php echo $label['name'];?></kbd>
					<?php echo form_input($inputs['gm_name']);?>
				</div>
				<div class="fn-st-field">
					<kbd><?php echo $label['email'];?></kbd>
					<?php echo form_input($inputs['gm_email']);?>
				</div>
			</div>

			<?php if (isset($docking)): ?>
				<?php foreach ($docking as $a): ?>
					<?php if (isset($a['fields'])): ?>
						<h3 class="fn-st-section"><?php echo $a['name'];?></h3>

						<div class="fn-st-group-form">
							<?php foreach ($a['fields'] as $f): ?>
								<div class="fn-st-field fn-st-field-wide">
									<kbd><?php echo $f['field_label'];?></kbd>

									<?php if (! empty($f['field_help'])): ?>
										<div class="fn-st-help"><?php echo $f['field_help'];?></div>
									<?php endif;?>

									<?php echo $f['input'];?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>

			<div class="fn-st-actions">
				<?php echo form_hidden('action_id', $id);?>
				<?php echo form_button($buttons['update']);?>
			</div>
		</div>
	<?php echo form_close();?>
</div>
