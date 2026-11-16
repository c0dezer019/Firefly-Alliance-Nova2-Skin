<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-modal-title"><?php echo $header;?></div>

<?php echo form_open('site/menus/edit');?>
	<div class="fn-modal-grid">
		<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
		<?php echo form_input($inputs['name']);?>
		<kbd class="fn-set-label"><?php echo $label['link'];?></kbd>
		<?php echo form_input($inputs['link']);?>
		<kbd class="fn-set-label"><?php echo $label['linktype'];?></kbd>
		<span class="fn-set-radios"><?php echo form_radio($inputs['link_type_on']) .' '. form_label($label['onsite'], 'link_type_on');?> <?php echo form_radio($inputs['link_type_off']) .' '. form_label($label['offsite'], 'link_type_off');?></span>
		<div class="fn-modal-full"><?php echo text_output($label['groupsort'], 'div', 'fn-modal-sub');?></div>
		<kbd class="fn-set-label"><?php echo $label['group'];?></kbd>
		<?php echo form_input($inputs['group']);?>
		<kbd class="fn-set-label"><?php echo $label['order'];?></kbd>
		<?php echo form_input($inputs['order']);?>
		<kbd class="fn-set-label"><?php echo $label['display'];?></kbd>
		<span class="fn-set-radios"><?php echo form_radio($inputs['display_y']) .' '. form_label($label['on'], 'display_y');?> <?php echo form_radio($inputs['display_n']) .' '. form_label($label['off'], 'display_n');?></span>
		<div class="fn-modal-full"><?php echo text_output($label['typecat'], 'div', 'fn-modal-sub');?></div>
		<kbd class="fn-set-label"><?php echo $label['type'];?></kbd>
		<?php echo form_dropdown('menu_type', $values['type'], $defaults['type'], 'class="hud"');?>
		<kbd class="fn-set-label"><?php echo $label['category'];?></kbd>
		<?php echo form_dropdown('menu_cat', $cats, $defaults['cat'], 'class="hud"');?>
		<div class="fn-modal-full"><?php echo text_output($label['control'], 'div', 'fn-modal-sub');?>
					<?php echo text_output($label['control_text'], 'div', 'fn-modal-hint');?></div>
		<kbd class="fn-set-label"><?php echo $label['login_req'];?></kbd>
		<?php echo form_dropdown('menu_need_login', $values['login'], $defaults['login'], 'class="hud"');?>
		<kbd class="fn-set-label"><?php echo $label['use_access'];?></kbd>
		<span class="fn-set-radios"><?php echo form_radio($inputs['use_access_y']) .' '. form_label($label['yes'], 'use_access_y');?> <?php echo form_radio($inputs['use_access_n']) .' '. form_label($label['no'], 'use_access_n');?></span>
		<kbd class="fn-set-label"><?php echo $label['control_url'];?></kbd>
		<?php echo form_input($inputs['access']);?>
		<kbd class="fn-set-label"><?php echo $label['control_level'];?></kbd>
		<?php echo form_input($inputs['access_level']);?>
		<div class="fn-modal-full"><?php echo text_output($label['simtype'], 'div', 'fn-modal-sub');?>
					<?php echo text_output($label['simtype_text'], 'div', 'fn-modal-hint');?></div>
		<kbd class="fn-set-label"><?php echo $label['simtype'];?></kbd>
		<?php echo form_dropdown('menu_sim_type', $values['sim_type'], $defaults['sim_type'], 'class="hud"');?>
	</div>
	<?php echo form_hidden('id', $id);?>
	<?php echo form_hidden('tab', $tab);?>