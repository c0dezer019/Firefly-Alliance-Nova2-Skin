<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require dirname(dirname(dirname(__FILE__))).'/_global/config.php';
?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">舰船规格 · SPECS</span>
</div>

<?php if ($count > 1): ?>
	<p class="fn-specs-back"><?php echo anchor('sim/specs', $label['back']);?></p>
<?php endif;?>

<div class="fn-specs-identity">
	<span class="wm"><?php echo $skin_watermark;?></span>
	<div class="fn-specs-id-label">Vessel Identity &middot; <?php echo $skin_registry_right;?></div>
	<div class="fn-specs-id-row">
		<span class="fn-specs-id-name"><?php echo html_escape($name);?></span>
		<span class="fn-specs-id-reg"><?php echo $skin_registry_right;?></span>
		<span class="fn-specs-id-sub"><?php echo $skin_registry_left;?></span>
		<span class="fn-specs-id-status">
			<span class="dot"></span>
			<span><?php echo $skin_subtitle;?></span>
		</span>
	</div>
</div>

<?php if (isset($images['main_img'])): ?>
	<div class="fn-specs-gallery" id="gallery">
		<p class="fn-gallery-label"><?php echo $label['opengallery'];?></p>
		<a href="<?php echo base_url().$images['main_img']['src'];?>" class="image" rel="prettyPhoto[gallery]"><?php echo img($images['main_img']);?></a>
		<div class="hidden">
			<?php if (count($images['image_array']) > 0): ?>
				<?php foreach ($images['image_array'] as $image): ?>
					<a href="<?php echo base_url().$image['src'];?>" class="image" rel="prettyPhoto[gallery]"><?php echo img($image);?></a>
				<?php endforeach;?>
			<?php endif;?>
		</div>
	</div>
<?php endif;?>

<?php if (! empty($summary)): ?>
	<div class="fn-specs-summary">
		<?php echo text_output($summary);?>
	</div>
<?php endif;?>

<?php if (isset($sections)): ?>
	<div class="fn-specs-grid">
		<?php foreach ($sections as $section): ?>
			<div class="fn-specs-panel">
				<div class="fn-specs-panel-title"><?php echo $section['title'];?></div>
				<?php if (isset($section['fields'])): ?>
					<?php foreach ($section['fields'] as $field): ?>
						<?php if (! empty($field['data'])): ?>
							<div class="fn-spec-row">
								<span class="k"><?php echo $field['field'];?></span>
								<span class="v"><?php echo text_output($field['data'], '');?></span>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				<?php else: ?>
					<p class="fn-card-excerpt fn-spec-empty"><?php echo $label['nospecs_all'];?></p>
				<?php endif;?>
			</div>
		<?php endforeach;?>
	</div>
<?php endif;?>
