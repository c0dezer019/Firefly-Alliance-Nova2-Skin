<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">任务 · MISSIONS</span>
</div>

<p class="fn-specs-back"><?php echo anchor('sim/missions', $label['missions']);?></p>

<?php if (isset($mission_img['src'])): ?>
	<div class="fn-specs-gallery" id="gallery">
		<p class="fn-gallery-label"><?php echo $label['open_gallery'];?></p>
		<a href="<?php echo base_url().$mission_img['src'];?>" class="image" rel="prettyPhoto[gallery]"><?php echo img($mission_img);?></a>
		<div class="hidden">
			<?php if (count($image_array) > 0): ?>
				<?php foreach ($image_array as $image): ?>
					<a href="<?php echo base_url().$image['src'];?>" class="image" rel="prettyPhoto[gallery]"><?php echo img($image);?></a>
				<?php endforeach;?>
			<?php endif;?>
		</div>
	</div>
<?php endif;?>

<?php if (isset($basic)): ?>
	<div class="fn-specs-panel">
		<div class="fn-specs-panel-title"><?php echo $info_header;?></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['status'];?></span><span class="v"><?php echo $basic['status'].' '.$label['mission'];?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['desc'];?></span><span class="v"><?php echo text_output($basic['desc'], '');?></span></div>
		<?php if (is_array($basic['group'])): ?>
			<div class="fn-spec-row"><span class="k"><?php echo $label['group'];?></span><span class="v"><?php echo anchor('sim/missions/group/'.$basic['group']['misgroup_id'], $basic['group']['misgroup_name']);?></span></div>
		<?php endif;?>
		<div class="fn-spec-row"><span class="k"><?php echo $label['date_start'];?></span><span class="v"><?php echo $basic['start'];?></span></div>
		<?php if (isset($basic['end'])): ?>
			<div class="fn-spec-row"><span class="k"><?php echo $label['date_end'];?></span><span class="v"><?php echo $basic['end'];?></span></div>
		<?php endif;?>
	</div>
<?php endif;?>

<?php if (isset($posts)): ?>
	<div class="fn-post-panel fn-mis-postlist">
		<div class="fn-post-caption"><?php echo $posts_header;?></div>
		<div class="fn-post-row fn-post-row-head">
			<div><?php echo $label['title'];?></div>
			<div><?php echo $label['timeline'];?></div>
			<div><?php echo $label['location'];?></div>
			<div></div>
		</div>
		<?php foreach ($posts as $post): ?>
			<div class="fn-post-row">
				<div>
					<?php echo anchor('sim/viewpost/'.$post['id'], $post['title'], array('class' => 'fn-post-title'));?>
					<span class="fn-post-by"><?php echo $label['by'].' '.$post['authors'];?></span>
				</div>
				<div class="fn-post-cell"><?php echo $post['timeline'];?></div>
				<div class="fn-post-cell"><?php echo $post['location'];?></div>
				<div></div>
			</div>
		<?php endforeach;?>
	</div>
	<p class="fn-mis-viewall"><?php echo anchor('sim/listposts/mission/'.$mission, '&raquo; '.$label['view_all_posts']);?></p>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['noposts'];?></p>
<?php endif;?>

<?php if (isset($summary)): ?>
	<div class="fn-specs-summary">
		<div class="fn-specs-panel-title"><?php echo $summary['title'];?></div>
		<?php echo text_output($summary['content']);?>
	</div>
<?php endif;?>
