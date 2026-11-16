<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div id="loading" class="fn-char-loading">
	<?php echo img($images['loader']);?>
	<?php echo $label['loading'];?>
</div>

<div id="loaded" class="hidden">
	<div class="fn-admin-dash fn-char">
		<?php if (Auth::check_access('characters/index', false)): ?>
			<p class="fn-char-back"><a href="<?php echo site_url('characters/index');?>"><?php echo $label['back'];?></a></p>
		<?php endif;?>

		<?php if ($level == 3 and $inputs['crew_type'] != 'pending'): ?>
			<div class="fn-char-status">
				<kbd><?php echo $label['change'];?></kbd>

				<?php if ($inputs['crew_type'] == 'inactive'): ?>
					<?php echo form_button($button['activate']);?>
				<?php endif;?>

				<?php if ($inputs['crew_type'] == 'active'): ?>
					<?php echo form_button($button['deactivate']);?>
				<?php endif;?>

				<?php if ($inputs['crew_type'] != 'npc'): ?>
					<?php echo form_button($button['npc']);?>
				<?php endif;?>

				<?php if ($inputs['crew_type'] == 'npc'): ?>
					<?php echo form_button($button['playing']);?>
				<?php endif;?>
			</div>
		<?php endif;?>

		<div id="tabs">
			<ul>
				<li><a href="#one"><span><?php echo $label['character'];?></span></a></li>
				<li><a href="#two"><span><?php echo $label['info'];?></span></a></li>
				<li><a href="#three"><span><?php echo $label['images'];?></span></a></li>
			</ul>

		<?php echo form_open('characters/bio/'.$id);?>
			<div id="one">
				<h3 class="fn-char-sub"><?php echo $label['character'];?></h3>

				<div class="fn-form-fields">
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
				</div>

				<h3 class="fn-char-sub"><?php echo $label['assignment'];?></h3>

				<div class="fn-form-fields">
					<?php if ($level >= 2): ?>
						<?php if (($level == 2 and $inputs['crew_type'] == 'npc') or $level == 3): ?>
							<div class="fn-field">
								<kbd><?php echo $label['position1'];?></kbd>
								<?php echo form_dropdown_position('position_1', $inputs['position1_id'], 'id="position1"', 'all');?>
								<span id="loading_pos1" class="hidden fn-char-spin"><?php echo img($images['loading']);?></span>
								<div id="position1_desc" class="fn-char-desc"><?php echo text_output($inputs['position1_desc'], '');?></div>
								<?php echo form_hidden('position_1_old', $inputs['position1_id']);?>
							</div>

							<div class="fn-field">
								<kbd><?php echo $label['position2'];?></kbd>
								<?php echo form_dropdown_position('position_2', $inputs['position2_id'], 'id="position2"', 'all');?>
								<span id="loading_pos2" class="hidden fn-char-spin"><?php echo img($images['loading']);?></span>
								<div id="position2_desc" class="fn-char-desc"><?php echo text_output($inputs['position2_desc'], '');?></div>
								<?php echo form_hidden('position_2_old', $inputs['position2_id']);?>
							</div>

							<div class="fn-field">
								<kbd><?php echo $label['rank'];?></kbd>
								<?php echo form_dropdown_rank('rank', $inputs['rank_id'], 'id="rank"');?>
								<span id="loading_rank" class="hidden fn-char-spin"><?php echo img($images['loading']);?></span>
								<div id="rank_img" class="fn-char-desc"><?php echo img($inputs['rank']);?></div>
								<?php echo form_hidden('rank_old', $inputs['rank_id']);?>
							</div>
						<?php endif;?>
					<?php else: ?>
						<div class="fn-field">
							<kbd><?php echo $label['position1'];?></kbd>
							<div class="fn-char-static"><?php echo $inputs['position1_name'];?></div>
						</div>

						<div class="fn-field">
							<kbd><?php echo $label['position2'];?></kbd>
							<div class="fn-char-static"><?php echo $inputs['position2_name'];?></div>
						</div>

						<div class="fn-field">
							<kbd><?php echo $label['rank'];?></kbd>
							<div class="fn-char-static">
								<?php echo img($inputs['rank']);?>
								<?php echo $inputs['rank_name'];?>
							</div>
						</div>
					<?php endif;?>
				</div>

				<div class="fn-char-submit"><?php echo form_button($button['submit']);?></div>
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

										<?php if ( ! empty($f['field_help'])): ?>
											<p class="fn-field-help"><?php echo $f['field_help'];?></p>
										<?php endif;?>

										<?php echo $f['input'];?>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>

				<div class="fn-char-submit"><?php echo form_button($button['submit']);?></div>
			</div>
		<?php echo form_close();?>

			<div id="three">
				<p class="fn-char-upload"><?php echo link_to_if(Auth::check_access('upload/index', false), 'upload/index', img($images['upload']) .' '. $label['upload'], array('class' => 'image'));?></p>

				<div class="subtabs">
					<ul>
						<li><a href="#five"><span><?php echo $label['character_images'];?></span></a></li>
						<li><a href="#six"><span><?php echo $label['available_images'];?></span></a></li>
					</ul>

					<div id="five">
						<div class="fn-char-imgbar">
							<?php echo form_button($button['update']);?>
							<span id="loading_upload_update" class="hidden"><?php echo img($images['loading']);?></span>
						</div>

						<ul id="list-grid" class="fn-char-grid">
						<?php if (is_array($inputs['images']) && count($inputs['images']) > 0): ?>
							<?php foreach ($inputs['images'] as $i): ?>
								<?php if (strpos($i, '://') === false): ?>
									<?php $image = array('src' => base_url().Location::asset('images/characters', $i), 'height' => 140);?>
								<?php else: ?>
									<?php $image = array('src' => $i, 'height' => 140);?>
								<?php endif;?>
								<li id="img_<?php echo str_replace('.', '\\.', $i);?>"><a href="#" class="image upload-close" remove="<?php echo str_replace('.', '\\.', $i);?>">x</a><?php echo img($image);?></li>
							<?php endforeach;?>
						<?php endif;?>
						</ul>
					</div>

					<div id="six">
						<?php if (isset($myuploads)): ?>
							<h3 class="fn-char-sub"><?php echo $label['myuploads'];?></h3>
							<table class="zebra fn-char-files">
								<tbody>
								<?php foreach ($myuploads as $d): ?>
									<tr>
										<td class="cell-label"><?php echo $d['file'];?></td>
										<td class="cell-spacer"></td>
										<td><?php echo img($d['image']);?></td>
										<td class="cell-spacer"></td>
										<td><?php echo form_button($button['use']);?></td>
									</tr>
								<?php endforeach;?>
								</tbody>
							</table>
						<?php endif;?>

						<?php if (isset($directory)): ?>
							<table class="zebra all-uploads fn-char-files">
								<tbody>
								<?php foreach ($directory as $d): ?>
									<tr>
										<td class="cell-label"><?php echo $d['file'];?></td>
										<td class="cell-spacer"></td>
										<td><?php echo img($d['image']);?></td>
										<td class="cell-spacer"></td>
										<td><?php echo form_button($button['use']);?></td>
									</tr>
								<?php endforeach;?>
								</tbody>
							</table>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
