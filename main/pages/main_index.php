<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// Skin branding flavor (watermark etc.) — page views render in their own
// scope, so pull the shared defaults in directly.
require dirname(dirname(dirname(__FILE__))).'/_global/config.php';
?>

<section class="fn-welcome-panel">
	<div class="fn-watermark"><?php echo $skin_watermark;?></div>

	<div class="fn-panel-title">
		<div class="fn-accent-bar"></div>
		<h2><?php echo $header;?></h2>
		<div class="fn-title-rule"></div>
		<span class="fn-title-cjk"><?php echo $skin_subtitle;?></span>
	</div>

	<?php echo text_output($msg_welcome);?>

	<div class="fn-quicknav">
		<a href="#fn-news">&raquo; <?php echo $label['news'];?></a>
		<div class="sep"></div>
		<a href="#fn-posts">&raquo; <?php echo $label['posts'];?></a>
		<div class="sep"></div>
		<a href="<?php echo site_url('main/join');?>">&raquo; <?php echo lang('actions_join') ? ucwords(lang('actions_join')) : 'Request a Berth';?></a>
	</div>
</section>

<div class="fn-home-grid">

	<!-- NEWS -->
	<div id="fn-news">
		<div class="fn-section-head">
			<span class="glyph">&#9153;</span>
			<h3><?php echo $label['news'];?></h3>
			<div class="fn-title-rule"></div>
			<span class="lbl"><?php echo $skin_subtitle;?></span>
		</div>

		<?php if (isset($lists['news']) && count($lists['news'])): ?>
			<?php foreach ($lists['news'] as $value): ?>
				<div class="fn-news-card">
					<a class="fn-card-title" href="<?php echo site_url('main/viewnews/'.$value['id']);?>">&raquo; <?php echo $value['title'];?></a>

					<div class="fn-card-meta">
						<span class="date"><?php echo $value['date'];?></span>
						<span class="dot"></span>
						<span class="fn-badge"><?php echo $value['category'];?></span>
					</div>

					<div class="fn-card-byline"><?php echo $label['by'].' '.$value['author'];?></div>

					<?php if ($options['show_news_preview'] === 'y'): ?>
						<p class="fn-card-excerpt"><?php echo $value['content'];?></p>
					<?php endif;?>
				</div>
			<?php endforeach;?>
		<?php else: ?>
			<p class="fn-card-excerpt">No entries yet.</p>
		<?php endif;?>
	</div>

	<!-- MISSION POSTS -->
	<div id="fn-posts">
		<div class="fn-section-head">
			<span class="glyph">&#9153;</span>
			<h3><?php echo $label['posts'];?></h3>
			<div class="fn-title-rule"></div>
			<span class="lbl">Posts</span>
		</div>

		<?php if (isset($lists['posts']) && count($lists['posts'])): ?>
			<?php foreach ($lists['posts'] as $value): ?>
				<div class="fn-mission-card">
					<a class="fn-card-title" href="<?php echo site_url('sim/viewpost/'.$value['id']);?>">&raquo; <?php echo $value['title'];?></a>

					<div class="fn-mission-label"><?php echo $label['mission'];?>: <span><?php echo $value['mission'];?></span></div>
					<div class="date"><?php echo $value['date'];?></div>
					<div class="authors"><?php echo $value['authors'];?></div>

					<?php if ($options['show_posts_preview'] === 'y'): ?>
						<p class="fn-card-excerpt"><?php echo $value['content'];?></p>
					<?php endif;?>
				</div>
			<?php endforeach;?>
		<?php else: ?>
			<p class="fn-card-excerpt">No entries yet.</p>
		<?php endif;?>
	</div>

</div>
