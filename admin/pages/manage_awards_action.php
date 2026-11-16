<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<p class="fn-per-back"><?php echo anchor('manage/awards', $label['back']);?></p>

<div class="fn-admin-dash fn-write">
	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['info'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['images'];?></span></a></li>
		</ul>

		<?php echo form_open('manage/awards/'. $form);?>
		<div id="one">
			<div class="fn-write-panel">
				<div class="fn-write-head"><span class="fn-write-glyph">&#8961;</span><h3><?php echo $header;?></h3></div>

				<div class="fn-write-grid">
					<div class="fn-write-field fn-write-full fn-write-title">
						<kbd><?php echo $label['name'];?></kbd>
						<?php echo form_input($inputs['name']);?>
					</div>

					<div class="fn-write-field">
						<kbd><?php echo $label['order'];?></kbd>
						<?php echo form_input($inputs['order']);?>
					</div>

					<div class="fn-write-field">
						<kbd><?php echo $label['cat'];?></kbd>
						<div class="fn-write-select">
							<?php echo form_dropdown('award_cat', $values['cat'], $inputs['cat']);?>
						</div>
					</div>

					<div class="fn-write-field fn-write-full">
						<kbd><?php echo $label['display'];?></kbd>
						<div class="fn-mc-radios">
							<?php echo form_radio($inputs['display_y']) .' '. form_label($label['on'], 'display_y');?>
							<?php echo form_radio($inputs['display_n']) .' '. form_label($label['off'], 'display_n');?>
						</div>
					</div>
				</div>

				<div class="fn-write-grid fn-mc-short">
					<div class="fn-write-field fn-write-full">
						<kbd><?php echo $label['desc'];?></kbd>
						<?php echo form_textarea($inputs['desc']);?>
					</div>
				</div>
			</div>
		</div>

		<div id="two" class="fn-mc-images">
			<div class="fn-write-panel">
				<div class="fn-write-head"><span class="fn-write-glyph">&#8961;</span><h3><?php echo $label['images'];?></h3></div>

				<div class="fn-write-grid">
					<div class="fn-write-field fn-write-full">
						<div class="fn-mg-intro"><?php echo text_output($image_instructions);?></div>
						<p class="fn-mc-upload"><?php echo anchor('upload/index', $label['upload'], array('class' => 'fn-mg-btn fn-mg-btn-add'));?></p>
						<?php echo form_input($inputs['images']);?>
					</div>

					<div class="fn-write-field fn-write-full">
						<div class="fn-log-panel">
							<?php foreach ($directory as $d): ?>
								<div class="fn-log-row fn-mc-filerow">
									<div class="fn-mc-filename">
										<a href="#" class="imagepick" myfile="<?php echo $d['file'];?>"><?php echo $d['file'];?></a>
									</div>
									<div class="fn-mc-filethumb">
										<a href="#" class="imagepick image" myfile="<?php echo $d['file'];?>"><?php echo img($d['image']);?></a>
									</div>
								</div>
							<?php endforeach;?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php echo form_hidden('id', $id);?>
		<div class="fn-write-actions">
			<?php echo form_button($inputs['submit']);?>
		</div>

		<?php echo form_close();?>
	</div>
</div>
