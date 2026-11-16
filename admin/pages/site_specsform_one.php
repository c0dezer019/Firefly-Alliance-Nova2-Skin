<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-site">
	<div class="fn-site-links"><?php echo anchor('site/specsform', $label['back']);?></div>

	<?php if (isset($inputs)): ?>
		<div class="fn-site-form">
		<?php echo form_open('site/specsform/edit/'. $id);?>
			<div class="fn-set-grid">
				<kbd class="fn-set-label"><?php echo $label['section'];?></kbd>
				<?php echo form_dropdown('field_section', $values['section'], $defaults['section']);?>

				<kbd class="fn-set-label"><?php echo $label['type'];?></kbd>
				<?php echo form_dropdown('field_type', $values['type'], $defaults['type']);?>

				<kbd class="fn-set-label"><?php echo $label['label'];?></kbd>
				<?php echo form_input($inputs['label']);?>

				<kbd class="fn-set-label"><?php echo $label['help'];?></kbd>
				<?php echo form_textarea($inputs['help']);?>

				<kbd class="fn-set-label"><?php echo $label['order'];?></kbd>
				<?php echo form_input($inputs['order']);?>

				<kbd class="fn-set-label"><?php echo $label['display'];?></kbd>
				<span class="fn-set-radios">
					<?php echo form_radio($inputs['display_y']);?>
					<?php echo form_label($label['yes'], 'field_display_y');?>

					<?php echo form_radio($inputs['display_n']);?>
					<?php echo form_label($label['no'], 'field_display_n');?>
				</span>
			</div>

			<h3 class="fn-site-sub-title"><?php echo $label['html'];?></h3>

			<div class="fn-set-grid">
				<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
				<?php echo form_input($inputs['name']);?>

				<kbd class="fn-set-label"><?php echo $label['id'];?></kbd>
				<?php echo form_input($inputs['fid']);?>

				<kbd class="fn-set-label"><?php echo $label['class'];?></kbd>
				<?php echo form_input($inputs['class']);?>

				<kbd class="fn-set-label"><?php echo $label['rows'];?></kbd>
				<?php echo form_input($inputs['rows']);?>
			</div>

			<?php echo form_hidden('field_id', $id);?>
			<div class="fn-set-actions"><?php echo form_button($buttons['submit']);?></div>
		<?php echo form_close();?>
		</div>

		<?php if (isset($select)): ?>
			<hr class="fn-site-rule" />

			<h3 class="fn-site-sub-title"><?php echo $label['values'];?></h3>
			<div class="fn-set-intro"><?php echo text_output($label['bioval']);?></div>

			<div class="fn-site-valadd">
				<div class="fn-set-grid">
					<kbd class="fn-set-label"><?php echo $label['value'];?></kbd>
					<?php echo form_input($inputs['val_add_value']);?>

					<kbd class="fn-set-label"><?php echo $label['content'];?></kbd>
					<?php echo form_input($inputs['val_add_content']);?>
				</div>

				<div class="fn-site-valbar">
					<?php echo form_button($buttons['add']);?>
					<span id="loading_add" class="hidden fn-site-loading"><?php echo img($loading);?></span>
				</div>
			</div>

			<div class="fn-site-values">
				<ul id="list">
					<?php foreach ($select as $key => $value): ?>
						<li class="ui-state-default" id="value_<?php echo $key;?>">
							<div class="float_right"><a href="#" class="remove" name="remove" id="<?php echo $key;?>">x</a></div>
							<a href="#" rel="facebox" myAction="edit_val" myField="<?php echo $id;?>" myID="<?php echo $key;?>"><?php echo $value;?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="fn-site-valbar">
				<?php echo form_button($buttons['update']);?>
				<span id="loading_update" class="hidden fn-site-loading"><?php echo img($loading);?></span>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>
