<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-usr">
	<div class="fn-usr-links">
		<?php if (Auth::check_access('user/account', false) and $level >= 2): ?>
			<p><a href="<?php echo site_url('user/all');?>" class="fn-usr-link"><?php echo $label['back'];?></a></p>
		<?php endif;?>

		<p><?php echo anchor('user/options', img($images['display']) .' '. $label['display'], array('class' => 'fn-usr-link image'));?></p>

		<p><?php echo link_to_if($level == 2, 'user/characterlink/'. $inputs['id'], img($images['user']) .' '. $label['characters'], array('class' => 'fn-usr-link image'));?></p>

		<?php if ($my_user and !Auth::is_sysadmin($userid)):?>
			<p><?php echo anchor('user/delete', img($images['delete']) .' '. $label['delete'], array('class' => 'fn-usr-link image'));?></p>
		<?php else: ?>
			<?php echo text_output($label['admin_delete'], 'h4', 'red fn-usr-warn');?>
		<?php endif;?>
	</div>

	<?php if ($level == 2 and ! $my_user):?>
		<div class="fn-usr-inline">
			<kbd class="fn-set-label"><?php echo $label['reset_password'];?></kbd>
			<?php echo form_button($button['password_reset']);?>
		</div>
		<div class="fn-usr-inline">
			<kbd class="fn-set-label"><?php echo $label['type'];?></kbd>
			<?php echo form_button($button['user_status']);?>
		</div>
	<?php elseif ($level == 2 and $my_user): ?>
		<?php echo text_output($label['your_user'], 'h4', 'blue fn-usr-note');?>
	<?php endif;?>

	<?php echo form_open('user/account/'. $inputs['id']);?>
		<div id="tabs">
			<ul>
				<li><a href="#one"><span><?php echo $label['basicinfo'];?></span></a></li>
				<li><a href="#two"><span><?php echo $label['mybio'];?></span></a></li>
				<li><a href="#three"><span><?php echo $label['myprefs'];?></span></a></li>

				<?php if ($level == 2): ?>
					<li><a href="#four"><span><?php echo $label['admin'];?></span></a></li>
				<?php endif;?>
			</ul>

			<div id="one">
				<div class="fn-usr-grid">
					<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
					<?php echo form_input($inputs['name']);?>

					<kbd class="fn-set-label"><?php echo $label['email'];?></kbd>
					<?php echo form_input($inputs['email']);?>

					<kbd class="fn-set-label"><?php echo $label['password'];?></kbd>
					<?php echo form_password($inputs['password']);?>
				</div>

				<div class="fn-usr-grid">
					<kbd class="fn-set-label"><?php echo $label['dob'];?></kbd>
					<?php echo form_input($inputs['dob']);?>

					<kbd class="fn-set-label"><?php echo $label['language'];?></kbd>
					<?php echo form_dropdown('language', $values['language'], $inputs['language']);?>
				</div>

				<div class="fn-usr-grid">
					<kbd class="fn-set-label"><?php echo $label['secquestion'];?></kbd>
					<?php echo form_dropdown('security_question', $values['questions'], $inputs['question']);?>

					<kbd class="fn-set-label"><?php echo $label['secanswer'];?></kbd>
					<div class="fn-usr-ctl">
						<?php echo text_output($label['sectext'], 'span', 'fn-usr-hint');?>
						<?php echo form_input($inputs['answer']);?>
					</div>
				</div>

				<?php echo text_output($label['datetime'], 'h3', 'fn-set-sub');?>

				<div class="fn-usr-grid">
					<kbd class="fn-set-label"><?php echo $label['timezone'];?></kbd>
					<?php echo timezone_menu($inputs['timezone']);?>

					<kbd class="fn-set-label"><?php echo $label['dst'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['dst_y']) .' '. form_label($label['yes'], 'dst_y');?>
						<?php echo form_radio($inputs['dst_n']) .' '. form_label($label['no'], 'dst_n');?>
					</span>
				</div>
			</div>

			<div id="two">
				<div class="fn-usr-grid">
					<kbd class="fn-set-label"><?php echo $label['im'];?></kbd>
					<div class="fn-usr-ctl">
						<?php echo text_output($label['im_inst'], 'span', 'fn-usr-hint');?>
						<?php echo form_textarea($inputs['im']);?>
					</div>

					<kbd class="fn-set-label"><?php echo $label['location'];?></kbd>
					<?php echo form_input($inputs['location']);?>

					<kbd class="fn-set-label"><?php echo $label['interests'];?></kbd>
					<?php echo form_textarea($inputs['interests']);?>

					<kbd class="fn-set-label"><?php echo $label['bio'];?></kbd>
					<?php echo form_textarea($inputs['bio']);?>
				</div>
			</div>

			<div id="three">
				<?php foreach ($prefs as $p): ?>
					<p class="fn-usr-check"><?php echo form_checkbox($p['input']) .' '. form_label($p['label'], $p['input']['id']);?></p>
				<?php endforeach;?>
			</div>

			<?php if ($level == 2): ?>
				<div id="four">
					<?php echo text_output($label['usersettings'], 'h3', 'fn-set-sub');?>

					<div class="fn-usr-grid">
						<kbd class="fn-set-label"><?php echo $label['role'];?></kbd>
						<?php echo form_dropdown('access_role', $values['roles'], $inputs['role']);?>

						<kbd class="fn-set-label"><?php echo $label['type'];?></kbd>
						<div class="fn-usr-inline">
							<?php echo form_button($button['user_status']);?>
						</div>

						<kbd class="fn-set-label"><?php echo $label['status'];?></kbd>
						<div class="fn-usr-inline">
							<?php echo form_dropdown('loa', $values['loa'], $inputs['loa']);?>
							<?php echo form_hidden('loa_old', $inputs['loa']);?>
						</div>

						<kbd class="fn-set-label"><?php echo $label['sysadmin'];?></kbd>
						<span class="fn-set-radios">
							<?php echo form_radio($inputs['admin_y']) .' '. form_label($label['yes'], 'admin_y');?>
							<?php echo form_radio($inputs['admin_n']) .' '. form_label($label['no'], 'admin_n');?>
						</span>

						<kbd class="fn-set-label"><?php echo $label['gm'];?></kbd>
						<span class="fn-set-radios">
							<?php echo form_radio($inputs['gm_y']) .' '. form_label($label['yes'], 'gm_y');?>
							<?php echo form_radio($inputs['gm_n']) .' '. form_label($label['no'], 'gm_n');?>
						</span>

						<kbd class="fn-set-label"><?php echo $label['webmaster'];?></kbd>
						<span class="fn-set-radios">
							<?php echo form_radio($inputs['webmaster_y']) .' '. form_label($label['yes'], 'webmaster_y');?>
							<?php echo form_radio($inputs['webmaster_n']) .' '. form_label($label['no'], 'webmaster_n');?>
						</span>
					</div>

					<?php echo text_output($label['moderate'], 'h3', 'fn-set-sub');?>

					<div class="fn-usr-grid">
						<kbd class="fn-set-label"><?php echo $label['mod_posts'];?></kbd>
						<span class="fn-set-radios">
							<?php echo form_radio($inputs['mod_posts_y']) .' '. form_label($label['yes'], 'mod_posts_y');?>
							<?php echo form_radio($inputs['mod_posts_n']) .' '. form_label($label['no'], 'mod_posts_n');?>
						</span>

						<kbd class="fn-set-label"><?php echo $label['mod_c_posts'];?></kbd>
						<span class="fn-set-radios">
							<?php echo form_radio($inputs['mod_pcomment_y']) .' '. form_label($label['yes'], 'mod_pcomment_y');?>
							<?php echo form_radio($inputs['mod_pcomment_n']) .' '. form_label($label['no'], 'mod_pcomment_n');?>
						</span>

						<kbd class="fn-set-label"><?php echo $label['mod_logs'];?></kbd>
						<span class="fn-set-radios">
							<?php echo form_radio($inputs['mod_logs_y']) .' '. form_label($label['yes'], 'mod_logs_y');?>
							<?php echo form_radio($inputs['mod_logs_n']) .' '. form_label($label['no'], 'mod_logs_n');?>
						</span>

						<kbd class="fn-set-label"><?php echo $label['mod_c_logs'];?></kbd>
						<span class="fn-set-radios">
							<?php echo form_radio($inputs['mod_lcomment_y']) .' '. form_label($label['yes'], 'mod_lcomment_y');?>
							<?php echo form_radio($inputs['mod_lcomment_n']) .' '. form_label($label['no'], 'mod_lcomment_n');?>
						</span>

						<kbd class="fn-set-label"><?php echo $label['mod_news'];?></kbd>
						<span class="fn-set-radios">
							<?php echo form_radio($inputs['mod_news_y']) .' '. form_label($label['yes'], 'mod_news_y');?>
							<?php echo form_radio($inputs['mod_news_n']) .' '. form_label($label['no'], 'mod_news_n');?>
						</span>

						<kbd class="fn-set-label"><?php echo $label['mod_c_news'];?></kbd>
						<span class="fn-set-radios">
							<?php echo form_radio($inputs['mod_ncomment_y']) .' '. form_label($label['yes'], 'mod_ncomment_y');?>
							<?php echo form_radio($inputs['mod_ncomment_n']) .' '. form_label($label['no'], 'mod_ncomment_n');?>
						</span>

						<kbd class="fn-set-label"><?php echo $label['mod_c_wiki'];?></kbd>
						<span class="fn-set-radios">
							<?php echo form_radio($inputs['mod_wcomment_y']) .' '. form_label($label['yes'], 'mod_wcomment_y');?>
							<?php echo form_radio($inputs['mod_wcomment_n']) .' '. form_label($label['no'], 'mod_wcomment_n');?>
						</span>
					</div>
				</div>
			<?php endif;?>

			<div class="fn-set-actions fn-usr-act">
				<?php echo form_button($buttons['update']);?>
			</div>
		</div>
	<?php echo form_close();?>
</div>
