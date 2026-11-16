<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-struct">
	<div class="fn-st-intro"><?php echo text_output($text);?></div>

	<div class="fn-st-nav">
		<h3 class="fn-st-nav-title"><?php echo $label['depts'];?></h3>

		<?php if (isset($depts)): ?>
			<?php foreach ($depts as $d): ?>
				<div class="fn-st-nav-label"><?php echo $d['name'];?></div>
				<div class="fn-st-pills">
				<?php foreach ($d['items'] as $key => $value): ?>
					<?php echo anchor('manage/positions/'.$key, $value['name'], array('rel' => 'twipsy', 'class' => 'pill fn-st-pill', 'title' => $value['desc']));?>
				<?php endforeach;?>
				</div>
			<?php endforeach;?>
		<?php endif;?>
	</div>

	<p class="fn-st-add">
		<a href="#" rel="facebox" myID="<?php echo $g_dept;?>" class="fn-mg-btn fn-mg-btn-add"><?php echo $label['add_position'];?></a>
	</p>

	<?php if (isset($positions)): ?>
		<h3 class="fn-st-section"><?php echo $deptnames[$g_dept];?></h3>

		<div class="fn-mg-panel fn-st-poslist">
		<?php echo form_open('manage/positions/'. $g_dept .'/edit');?>

			<?php foreach ($positions as $p): ?>
				<div class="fn-st-pos">
					<div class="fn-st-pos-cell">
						<span class="fn-st-label"><?php echo $label['name'];?></span>
						<?php echo form_input($inputs['position'][$p['id']]['name']);?>
					</div>

					<div class="fn-st-pos-cell">
						<span class="fn-st-label"><?php echo $label['top_open'];?></span>
						<?php echo form_dropdown($p['id'].'_top_open', $values['top_open'], $p['top_open']);?>
					</div>

					<div class="fn-st-pos-cell">
						<div class="slider_control UITheme fn-st-pos-open">
							<strong><?php echo $label['open'];?>:</strong>
							<span id="<?php echo $p['id'];?>_amount"><?php echo $p['open'];?></span>
							<input type="hidden" name="<?php echo $p['id'];?>_open" id="<?php echo $p['id'];?>_open" value="<?php echo $p['open'];?>" />
						</div>
						<div class="slider_control UITheme">
							<div id="<?php echo $p['id'];?>" class="slider"><?php echo $p['open'];?></div>
						</div>
					</div>

					<div class="fn-st-pos-del">
						<?php echo form_label($label['delete'], $p['id'] .'_id');?>?
						<?php echo form_checkbox($inputs['position'][$p['id']]['delete']);?>
					</div>

					<div class="fn-st-pos-more">
						<button class="button-small" rel="popover" title="<?php echo $inputs['position'][$p['id']]['name']['value'];?>" data-content="<?php echo $additional[$p['id']];?>"><span class="text"><?php echo $label['more'];?></span></button>
					</div>
				</div>
			<?php endforeach;?>

			<div class="fn-st-actions">
				<?php echo form_button($buttons['update']);?>
			</div>
		<?php echo form_close();?>
		</div>
	<?php endif;?>
</div>
