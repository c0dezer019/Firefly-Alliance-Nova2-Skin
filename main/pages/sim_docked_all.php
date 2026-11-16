<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">对接 · DOCKED</span>
</div>

<div class="fn-per-subhead"><?php echo $label['docked_current'];?></div>
<?php if (isset($docked['active'])): ?>
	<div class="fn-specs-list">
		<?php foreach ($docked['active'] as $d): ?>
			<div class="fn-specs-list-row">
				<?php echo anchor('sim/docked/'. $d['id'], $d['sim_name'], array('class' => 'name'));?>
				<span class="summary">
					<?php echo $d['gm_name'];?><br />
					<a href="<?php echo $d['sim_url'];?>" target="_blank"><?php echo $d['sim_url'];?></a>
				</span>
			</div>
		<?php endforeach;?>
	</div>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['norequests'];?></p>
<?php endif;?>

<div class="fn-per-subhead"><?php echo $label['docked_previous'];?></div>
<?php if (isset($docked['inactive'])): ?>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['norequests'];?></p>
<?php endif;?>
