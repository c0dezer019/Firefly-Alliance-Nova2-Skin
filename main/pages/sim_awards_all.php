<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// Human titles for Nova award category codes (generic, not sim-specific).
$fn_award_cats = array(
    'ic'          => 'In-Character Honours',
    'ooc'         => 'Out-of-Character Recognition',
    'competition' => 'Competitions',
    'special'     => 'Special Recognition',
);
?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">勋章 · AWARDS</span>
</div>

<?php if ($edit_valid): ?>
	<p class="fn-awards-edit"><?php echo link_to_if($edit_valid, 'manage/awards', $label['edit']);?></p>
<?php endif;?>

<?php if (isset($awards)): ?>
	<?php
    // Group the flat award list by its (unused-by-base) category field.
    $fn_grouped = array();
    foreach ($awards as $v) {
        $fn_grouped[$v['cat']][] = $v;
    }
    ?>
	<?php foreach ($fn_grouped as $cat => $items): ?>
		<?php $accent = ($cat === 'ic') ? 'ic' : 'ooc'; ?>
		<div class="fn-awards-panel <?php echo $accent;?>">
			<div class="fn-awards-panel-head">
				<span class="bar"></span>
				<span class="title"><?php echo isset($fn_award_cats[$cat]) ? $fn_award_cats[$cat] : ucfirst($cat);?></span>
			</div>
			<div class="fn-awards-grid">
				<?php foreach ($items as $v): ?>
					<a href="<?php echo site_url('sim/awards/'.$v['id']);?>" class="fn-award-card">
						<span class="fn-award-medal">
							<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="<?php echo ($accent === 'ic') ? 'rgba(192,120,40,.7)' : 'rgba(58,98,200,.7)';?>" stroke-width="1.5">
								<circle cx="12" cy="12" r="8"></circle>
								<path d="M12 8v4l2.5 2.5" stroke-linecap="round"></path>
							</svg>
						</span>
						<span class="fn-award-name"><?php echo $v['name'];?></span>
						<span class="fn-award-desc"><?php echo text_output($v['desc'], '');?></span>
						<span class="fn-award-more"><?php echo $label['details'];?></span>
					</a>
				<?php endforeach;?>
			</div>
		</div>
	<?php endforeach;?>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['noawards'];?></p>
<?php endif;?>
