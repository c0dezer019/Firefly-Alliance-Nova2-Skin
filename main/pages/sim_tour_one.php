<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">参观 · TOUR</span>
</div>

<p class="fn-specs-back"><?php echo anchor('sim/tour', $label['back']);?></p>

<?php if (! empty($summary)): ?>
	<div class="fn-specs-summary">
		<?php echo text_output($summary);?>
	</div>
<?php endif;?>

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

<?php if (isset($fields)): ?>
	<div class="fn-specs-panel">
		<div class="fn-specs-panel-title"><?php echo $label['info'];?></div>
		<?php foreach ($fields as $field): ?>
			<?php if (! empty($field['data'])): ?>
				<div class="fn-spec-row">
					<span class="k"><?php echo $field['label'];?></span>
					<span class="v"><?php echo text_output($field['data'], '');?></span>
				</div>
			<?php endif;?>
		<?php endforeach;?>
	</div>
<?php endif;?>
