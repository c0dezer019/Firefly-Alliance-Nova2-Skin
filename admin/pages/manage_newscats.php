<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<div class="fn-mg-intro"><?php echo text_output($text);?></div>

	<p class="fn-mg-add"><a href="#" class="addtoggle fn-mg-btn fn-mg-btn-add"><?php echo $label['add'];?></a></p>

	<div class="addcat hidden fn-write">
		<div class="fn-write-panel">
			<?php echo form_open('manage/newscats/add');?>
				<div class="fn-write-grid">
					<div class="fn-write-field fn-write-full">
						<kbd><?php echo $label['name'];?></kbd>
						<?php echo form_input($inputs['name']);?>
					</div>
				</div>
				<div class="fn-write-actions">
					<?php echo form_button($buttons['add']);?>
				</div>
			<?php echo form_close();?>
		</div>
	</div>

	<?php if (isset($categories)): ?>
		<div class="fn-write">
			<div class="fn-write-panel">
				<?php echo form_open('manage/newscats/edit');?>
					<?php foreach ($categories as $c): ?>
						<div class="fn-mc-catrow">
							<div class="fn-write-field">
								<kbd><?php echo $label['name'];?></kbd>
								<?php echo form_input($c['name']);?>
							</div>
							<div class="fn-write-field">
								<kbd><?php echo $label['display'];?></kbd>
								<div class="fn-write-select">
									<?php echo form_dropdown($c['id'] .'_display', $values['display'], $c['display']);?>
								</div>
							</div>
							<div class="fn-write-field fn-mc-check">
								<?php echo form_checkbox($c['delete']);?>
								<?php echo form_label($label['delete'], $c['id'] .'_id');?>
							</div>
						</div>
					<?php endforeach;?>

					<div class="fn-write-actions">
						<?php echo form_button($buttons['update']);?>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	<?php endif;?>
</div>
