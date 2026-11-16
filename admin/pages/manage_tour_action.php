<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-struct">
	<p class="fn-st-links"><?php echo anchor('manage/tour', $label['back']);?></p>

	<?php if ($id === false): ?>
		<p class="fn-st-note"><?php echo $label['images_later'];?></p>
	<?php endif;?>

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
	<?php echo form_open('manage/tour/'. $form);?>
		<div class="fn-st-field">
			<kbd><?php echo $label['name'];?></kbd>
			<?php echo form_input($inputs['name']);?>
		</div>
		<div class="fn-st-field">
			<kbd><?php echo $label['order'];?></kbd>
			<?php echo form_input($inputs['order']);?>
		</div>
		<div class="fn-st-field fn-st-radios">
			<kbd><?php echo $label['display'];?></kbd>
			<?php echo form_radio($inputs['display_y']) .' '. form_label($label['on'], 'display_y');?>
			<?php echo form_radio($inputs['display_n']) .' '. form_label($label['off'], 'display_n');?>
		</div>

		<?php if (isset($specs)): ?>
			<div class="fn-st-field">
				<kbd><?php echo $label['spec_item'];?></kbd>
				<?php echo form_dropdown('tour_spec_item', $specs, $inputs['spec_item']);?>
				<a rel="tooltip" title="<?php echo $label['specitem_select'];?>" class="image fn-st-inline-help"><?php echo img($images['help']);?></a>
			</div>
		<?php endif;?>

		<div class="fn-st-field fn-st-field-wide">
			<kbd><?php echo $label['summary'];?></kbd>
			<?php echo form_textarea($inputs['summary']);?>
		</div>

		<?php if (isset($inputs['fields'])): ?>
			<div class="fn-st-group-form">
			<?php foreach ($inputs['fields'] as $f): ?>
				<div class="fn-st-field fn-st-field-wide">
					<kbd><?php echo $f['field_label'];?></kbd>

					<?php if (! empty($f['field_help'])): ?>
						<div class="fn-st-help"><?php echo $f['field_help'];?></div>
					<?php endif;?>

					<?php echo $f['input'];?>
				</div>
			<?php endforeach;?>
			</div>
		<?php endif;?>

		<div class="fn-st-actions">
			<?php echo form_hidden('id', $id);?>
			<?php echo form_button($buttons['submit']);?>
		</div>

		<?php echo form_close();?>

	<?php if ($id !== false): ?>
	</div>

	<div id="two">
		<p><?php echo anchor('upload/index', $label['upload'], array('class' => 'image fn-st-upload-link'));?></p>

		<div class="subtabs">
			<ul>
				<li><a href="#five"><span><?php echo $label['tour_images'];?></span></a></li>
				<li><a href="#six"><span><?php echo $label['available_images'];?></span></a></li>
			</ul>

			<div id="five">
				<div class="fn-st-imgbar">
					<?php echo form_button($buttons['update']);?>
					<span id="loading_upload_update" class="hidden"><?php echo img($images['loading']);?></span>
				</div>

				<ul id="list-grid" class="fn-st-grid">
				<?php if (is_array($inputs['images']) && count($inputs['images']) > 0): ?>
					<?php foreach ($inputs['images'] as $i): ?>
						<?php $image = array('src' => base_url().Location::asset('images/tour', $i), 'width' => 130);?>
						<li id="img_<?php echo str_replace('.', '\\.', $i);?>"><a href="#" class="image upload-close" remove="<?php echo str_replace('.', '\\.', $i);?>">x</a><?php echo img($image);?></li>
					<?php endforeach;?>
				<?php endif;?>
				</ul>
			</div>

			<div id="six">
				<?php if (isset($directory)): ?>
					<div class="fn-st-uploaded">
					<?php foreach ($directory as $d): ?>
						<div class="fn-st-uploaded-row">
							<div class="fn-st-uploaded-file"><?php echo $d['file'];?></div>
							<div><?php echo img($d['image']);?></div>
							<div><?php echo form_button($buttons['use']);?></div>
						</div>
					<?php endforeach;?>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
	<?php endif;?>

	<?php if ($id !== false): ?>
	</div>
	<?php endif;?>
</div>
