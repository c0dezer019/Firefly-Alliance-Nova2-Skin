<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-usr">
	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['myskins'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['myranks'];?></span></a></li>
			<li><a href="#three"><span><?php echo $label['mylinks'];?></span></a></li>
		</ul>

		<div id="one">
			<?php if (Auth::check_access('site/settings', false)): ?>
				<div class="fn-set-intro"><?php echo text_output($label['skins_text']);?></div>
			<?php endif;?>

			<?php echo form_open('user/options/skins');?>
				<div class="fn-usr-grid">
					<kbd class="fn-set-label"><?php echo $label['skin_main'];?></kbd>
					<div class="fn-usr-inline">
						<?php echo form_dropdown('skin_main', $themes['main'], $default['skin_main'], 'class="skins" myType="main"');?>
						<a href="#" class="image preview-main" rel="prettyPhoto"><?php echo img($images['view']);?></a>
					</div>

					<kbd class="fn-set-label"><?php echo $label['skin_admin'];?></kbd>
					<div class="fn-usr-inline">
						<?php echo form_dropdown('skin_admin', $themes['admin'], $default['skin_admin'], 'class="skins" myType="admin"');?>
						<a href="#" class="image preview-admin" rel="prettyPhoto"><?php echo img($images['view']);?></a>
					</div>

					<kbd class="fn-set-label"><?php echo $label['skin_wiki'];?></kbd>
					<div class="fn-usr-inline">
						<?php echo form_dropdown('skin_wiki', $themes['wiki'], $default['skin_wiki'], 'class="skins" myType="wiki"');?>
						<a href="#" class="image preview-wiki" rel="prettyPhoto"><?php echo img($images['view']);?></a>
					</div>
				</div>

				<div class="fn-set-actions fn-usr-act"><?php echo form_button($buttons['update']);?></div>
			<?php echo form_close();?>
		</div>

		<div id="two">
			<?php echo form_open('user/options/ranks');?>
				<div class="fn-usr-list fn-usr-ranks">
					<?php foreach ($ranks as $r): ?>
						<div class="fn-usr-row fn-usr-row-rank">
							<div class="fn-usr-radio"><?php echo form_radio($r['input']);?></div>
							<div class="fn-usr-main">
								<label for="<?php echo 'rank_'. $r['id'];?>"><?php echo img($r['preview']);?></label>
								<?php echo text_output($r['name'], 'span', 'fn-usr-sub');?>
							</div>
						</div>
					<?php endforeach;?>
				</div>

				<div class="fn-set-actions fn-usr-act"><?php echo form_button($buttons['update']);?></div>
			<?php echo form_close();?>
		</div>

		<div id="three">
			<?php echo form_open('user/options/links');?>
				<div class="fn-usr-grid">
					<kbd class="fn-set-label"><?php echo $label['mylink_1'];?></kbd>
					<?php echo form_dropdown('link_1', $links, $defaults['links'][1]);?>

					<kbd class="fn-set-label"><?php echo $label['mylink_2'];?></kbd>
					<?php echo form_dropdown('link_2', $links, $defaults['links'][2]);?>

					<kbd class="fn-set-label"><?php echo $label['mylink_3'];?></kbd>
					<?php echo form_dropdown('link_3', $links, $defaults['links'][3]);?>

					<kbd class="fn-set-label"><?php echo $label['mylink_4'];?></kbd>
					<?php echo form_dropdown('link_4', $links, $defaults['links'][4]);?>

					<kbd class="fn-set-label"><?php echo $label['mylink_5'];?></kbd>
					<?php echo form_dropdown('link_5', $links, $defaults['links'][5]);?>
				</div>

				<div class="fn-set-actions fn-usr-act"><?php echo form_button($buttons['update']);?></div>
			<?php echo form_close();?>
		</div>
	</div>
</div>
