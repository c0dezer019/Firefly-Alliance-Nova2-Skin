<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set">
	<p class="fn-set-manage">
		<span class="fn-set-gear">&#9881;</span>
		<?php echo anchor('site/usersettings', $label['manageuser'] .' &raquo;');?>
	</p>

	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['general'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['system'];?></span></a></li>
			<li><a href="#three"><span><?php echo $label['appearance'];?></span></a></li>

			<?php if (isset($user)): ?>
				<li><a href="#four"><span><?php echo $label['user'];?></span></a></li>
			<?php endif; ?>
		</ul>

		<div id="one">
			<?php echo form_open('site/settings');?>
				<h3 class="fn-set-section"><?php echo $label['header_gen'];?></h3>

				<div class="fn-set-grid">
					<kbd class="fn-set-label"><?php echo $label['name'];?></kbd>
					<?php echo form_input($inputs['sim_name']);?>

					<kbd class="fn-set-label"><?php echo $label['year'];?></kbd>
					<?php echo form_input($inputs['sim_year']);?>

					<kbd class="fn-set-label"><?php echo $label['type'];?></kbd>
					<div class="fn-set-inline">
						<?php echo anchor('site/simtypes', '['. $label['edit'] .']', array('class' => 'fn-set-edit'));?>
						<?php echo form_dropdown('sim_type', $values['sim_type'], $default['sim_type']);?>
						<?php echo form_hidden('old_sim_type', $default['sim_type']);?>
					</div>
				</div>

				<h3 class="fn-set-section"><?php echo $label['header_hosting'];?></h3>

				<div class="fn-set-stack">
					<kbd class="fn-set-label"><?php echo $label['hosting_company'];?></kbd>
					<a href="#" rel="tooltip" class="fn-set-help" title="<?php echo $label['tt_hosting_company'];?>">?</a>
					<?php echo form_input($inputs['hosting_company']);?>
				</div>
				<div class="fn-set-stack">
					<kbd class="fn-set-label"><?php echo $label['access_log_purge'];?></kbd>
					<a href="#" rel="tooltip" class="fn-set-help" title="<?php echo $label['tt_access_log_purge'];?>">?</a>
					<?php echo form_input($inputs['access_log_purge']);?>
				</div>

				<div class="fn-set-actions"><?php echo form_button($button_submit);?></div>
			<?php echo form_close();?>
		</div>

		<div id="two">
			<?php echo form_open('site/settings/1');?>
				<h3 class="fn-set-section"><?php echo $label['header_system'];?></h3>

				<div class="fn-set-row">
					<kbd class="fn-set-label wide"><?php echo $label['maint'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['maintenance_on']) .' '. form_label($label['on'], 'maintenance_on');?>
						<?php echo form_radio($inputs['maintenance_off']) .' '. form_label($label['off'], 'maintenance_off');?>
					</span>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wide"><?php echo $label['updates'];?></kbd>
					<?php echo form_dropdown('updates', $values['updates'], $default['updates']);?>
				</div>

				<h4 class="fn-set-sub"><?php echo $label['date'];?></h4>
				<p class="fn-set-text"><?php echo $label['date_format'];?></p>
				<div class="fn-set-inline fn-set-date">
					<?php echo form_dropdown('formats', $values['date_format'], $default['date_format'], 'id="formats"');?>
					<?php echo form_input($inputs['date_format']);?>
				</div>
				<p class="fn-set-sample">
					<strong><?php echo $label['sample_output'];?></strong>:
					<span id="format_output"><?php echo mdate($inputs['date_format']['value'], now());?></span>
				</p>

				<div class="fn-set-stack">
					<kbd class="fn-set-label upper"><?php echo $label['timezone'];?></kbd>
					<?php echo timezone_menu($default['timezone'], '', 'timezone');?>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wide"><?php echo $label['dst'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['dst_y']) .' '. form_label($label['yes'], 'dst_y');?>
						<?php echo form_radio($inputs['dst_n']) .' '. form_label($label['no'], 'dst_n');?>
					</span>
				</div>

				<div class="fn-set-stack">
					<kbd class="fn-set-label"><?php echo $label['allowed_chars'];?></kbd>
					<?php echo form_input($inputs['allowed_playing_chars']);?>
				</div>
				<div class="fn-set-stack">
					<kbd class="fn-set-label"><?php echo $label['allowed_npcs'];?></kbd>
					<?php echo form_input($inputs['allowed_npcs']);?>
				</div>

				<div class="fn-set-stack">
					<kbd class="fn-set-label"><?php echo $label['online'];?></kbd>
					<a href="#" rel="tooltip" class="fn-set-help" title="<?php echo $label['tt_online_timespan'];?>">?</a>
					<div class="fn-set-inline">
						<?php echo form_input($inputs['online_timespan']);?>
						<span class="fn-set-unit"><?php echo $label['minutes'];?></span>
					</div>
				</div>
				<div class="fn-set-stack">
					<kbd class="fn-set-label"><?php echo $label['requirement'];?></kbd>
					<a href="#" rel="tooltip" class="fn-set-help" title="<?php echo $label['tt_posting_requirement'];?>">?</a>
					<div class="fn-set-inline">
						<?php echo form_input($inputs['posting_req']);?>
						<span class="fn-set-unit"><?php echo $label['days'];?></span>
					</div>
				</div>
				<div class="fn-set-stack">
					<kbd class="fn-set-label"><?php echo $label['posts_participants'];?></kbd>
					<a href="#" rel="tooltip" class="fn-set-help" title="<?php echo $label['tt_posting_participants'];?>">?</a>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['participants_y']) .' '. form_label($label['yes'], 'participants_y');?>
						<?php echo form_radio($inputs['participants_n']) .' '. form_label($label['no'], 'participants_n');?>
					</span>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wide"><?php echo $label['contact_form_enabled'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['contact_form_y']) .' '. form_label($label['yes'], 'contact_form_y');?>
						<?php echo form_radio($inputs['contact_form_n']) .' '. form_label($label['no'], 'contact_form_n');?>
					</span>
				</div>

				<h3 class="fn-set-section"><?php echo $label['header_email'];?></h3>

				<div class="fn-set-row">
					<kbd class="fn-set-label wide"><?php echo $label['sysemail'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['sys_email_on']) .' '. form_label($label['on'], 'sys_email_on');?>
						<?php echo form_radio($inputs['sys_email_off']) .' '. form_label($label['off'], 'sys_email_off');?>
					</span>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wide"><?php echo $label['emailsubject'];?></kbd>
					<?php echo form_input($inputs['email_subject']);?>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wide"><?php echo $label['emailname'];?></kbd>
					<?php echo form_input($inputs['email_name']);?>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wide"><?php echo $label['emailaddress'];?></kbd>
					<?php echo form_input($inputs['email_address']);?>
				</div>

				<div class="fn-set-actions"><?php echo form_button($button_submit);?></div>
			<?php echo form_close();?>
		</div>

		<div id="three">
			<?php echo form_open('site/settings/2');?>
				<h3 class="fn-set-section"><?php echo $label['header_skins'];?></h3>

				<div class="fn-set-text"><?php echo text_output($label['skins_text']);?></div>

				<div class="fn-set-row">
					<kbd class="fn-set-label"><?php echo $label['skin_main'];?></kbd>
					<?php echo form_dropdown('skin_main', $themes['main'], $default['skin_main'], 'class="skins" myType="main"');?>
					<a href="#" class="fn-set-preview preview-main" rel="prettyPhoto" title="Preview skin">&#128269;</a>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label"><?php echo $label['skin_login'];?></kbd>
					<?php echo form_dropdown('skin_login', $themes['login'], $default['skin_login'], 'class="skins" myType="login"');?>
					<a href="#" class="fn-set-preview preview-login" rel="prettyPhoto" title="Preview skin">&#128269;</a>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label"><?php echo $label['skin_wiki'];?></kbd>
					<?php echo form_dropdown('skin_wiki', $themes['wiki'], $default['skin_wiki'], 'class="skins" myType="wiki"');?>
					<a href="#" class="fn-set-preview preview-wiki" rel="prettyPhoto" title="Preview skin">&#128269;</a>
				</div>

				<div class="fn-set-stack">
					<a href="#" rel="tooltip" class="fn-set-help" title="Generate the necessary CSS to update colors in certain skins">?</a>
					<a href="<?php echo site_url('site/skincolors');?>" class="fn-set-link">Generate new color scheme</a>
				</div>

				<h3 class="fn-set-section"><?php echo $label['header_options'];?></h3>

				<div class="fn-set-row">
					<kbd class="fn-set-label"><?php echo $label['rank'];?></kbd>
					<?php echo form_dropdown('display_rank', $values['ranks'], $this->options['display_rank'], 'id="rank"');?>
					<span id="loading_rank" class="hidden fn-set-loading"><?php echo img($images['loading']);?></span>
				</div>
				<div id="rank_img" class="fn-set-rank"><?php echo img($inputs['rank']);?></div>

				<div class="fn-set-grid wide">
					<kbd class="fn-set-label"><?php echo $label['posts_num'];?></kbd>
					<?php echo form_input($inputs['list_posts_num']);?>
					<kbd class="fn-set-label"><?php echo $label['logs_num'];?></kbd>
					<?php echo form_input($inputs['list_logs_num']);?>
					<kbd class="fn-set-label"><?php echo $label['news_num'];?></kbd>
					<?php echo form_input($inputs['list_news_num']);?>
				</div>

				<div class="fn-set-row">
					<kbd class="fn-set-label wider"><?php echo $label['news_show'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['show_news_y']) .' '. form_label($label['yes'], 'show_news_y');?>
						<?php echo form_radio($inputs['show_news_n']) .' '. form_label($label['no'], 'show_news_n');?>
					</span>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wider"><?php echo $label['logs_show'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['show_logs_y']) .' '. form_label($label['yes'], 'show_logs_y');?>
						<?php echo form_radio($inputs['show_logs_n']) .' '. form_label($label['no'], 'show_logs_n');?>
					</span>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wider"><?php echo $label['posts_show'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['show_posts_y']) .' '. form_label($label['yes'], 'show_posts_y');?>
						<?php echo form_radio($inputs['show_posts_n']) .' '. form_label($label['no'], 'show_posts_n');?>
					</span>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wider"><?php echo $label['news_show_preview'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['show_news_preview_y']) .' '. form_label($label['yes'], 'show_news_preview_y');?>
						<?php echo form_radio($inputs['show_news_preview_n']) .' '. form_label($label['no'], 'show_news_preview_n');?>
					</span>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wider"><?php echo $label['logs_show_preview'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['show_logs_preview_y']) .' '. form_label($label['yes'], 'show_logs_preview_y');?>
						<?php echo form_radio($inputs['show_logs_preview_n']) .' '. form_label($label['no'], 'show_logs_preview_n');?>
					</span>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wider"><?php echo $label['posts_show_preview'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['show_posts_preview_y']) .' '. form_label($label['yes'], 'show_posts_preview_y');?>
						<?php echo form_radio($inputs['show_posts_preview_n']) .' '. form_label($label['no'], 'show_posts_preview_n');?>
					</span>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wider"><?php echo $label['use_notes'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['use_mission_notes_y']) .' '. form_label($label['yes'], 'use_mission_notes_y');?>
						<?php echo form_radio($inputs['use_mission_notes_n']) .' '. form_label($label['no'], 'use_mission_notes_n');?>
					</span>
				</div>
				<div class="fn-set-row">
					<kbd class="fn-set-label wider"><?php echo $label['sample_post'];?></kbd>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['use_sample_post_y']) .' '. form_label($label['yes'], 'use_sample_post_y');?>
						<?php echo form_radio($inputs['use_sample_post_n']) .' '. form_label($label['no'], 'use_sample_post_n');?>
					</span>
				</div>
				<div class="fn-set-stack">
					<kbd class="fn-set-label"><?php echo $label['count_format'];?></kbd>
					<a href="#" rel="tooltip" class="fn-set-help" title="<?php echo $label['tt_post_count'];?>">?</a>
					<span class="fn-set-radios">
						<?php echo form_radio($inputs['post_count_multi']) .' '. form_label($label['count_multiple'], 'post_count_multi');?>
						<?php echo form_radio($inputs['post_count_single']) .' '. form_label($label['count_single'], 'post_count_single');?>
					</span>
				</div>

				<div class="fn-set-actions"><?php echo form_button($button_submit);?></div>
			<?php echo form_close();?>
		</div>

		<?php if (isset($user)): ?>
			<div id="four">
				<?php echo form_open('site/settings/3');?>
					<h3 class="fn-set-section"><?php echo $label['header_user'];?></h3>

					<?php foreach ($user as $u): ?>
						<div class="fn-set-stack">
							<kbd class="fn-set-label"><?php echo $u['label'];?></kbd>
							<?php echo form_input($u['key'], $u['value']);?>
						</div>
					<?php endforeach; ?>

					<div class="fn-set-actions"><?php echo form_button($button_submit);?></div>
				<?php echo form_close();?>
			</div>
		<?php endif; ?>
	</div>
</div>
