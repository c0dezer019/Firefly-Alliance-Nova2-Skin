<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php echo form_open('write/missionpost/missionCreate');?>
	<div class="fn-modal-grid">
		<div class="fn-mc-modal-full">
			<?php echo form_dropdown('action', $missions, 0, 'class="hud" id="addMissionOption"');?>
		</div>

		<kbd class="fn-set-label"><?php echo $label['title'];?></kbd>
		<?php echo form_input($inputs['title']);?>

		<kbd class="fn-set-label"><?php echo $label['desc'];?></kbd>
		<?php echo form_textarea($inputs['desc']);?>
	</div>
