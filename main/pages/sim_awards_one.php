<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">勋章 · AWARDS</span>
</div>

<p class="fn-specs-back"><?php echo anchor('sim/awards', $label['back']);?></p>

<div class="fn-award-detail">
	<div class="fn-award-detail-img"><?php echo img($img);?></div>
	<div class="fn-award-detail-body">
		<?php echo text_output($desc);?>
		<div class="fn-award-detail-meta">
			<span><?php echo $label['category'];?> <strong><?php echo $cat;?></strong></span>
			<span><?php echo $label['awarded'];?> <strong><?php echo $awardees_count;?></strong></span>
		</div>
	</div>
</div>

<?php if (isset($msg_error)): ?>
	<p class="fn-card-excerpt"><?php echo $msg_error;?></p>
<?php endif;?>

<?php if (isset($awardees)): ?>
	<div class="fn-awards-panel">
		<?php foreach ($awardees as $v): ?>
			<div class="fn-awardee-row">
				<div class="fn-awardee-who">
					<?php echo $v['person'];?>
					<span class="date"><?php echo $v['date'];?></span>
				</div>
				<div class="fn-awardee-reason"><?php echo text_output($v['reason'], '');?></div>
			</div>
		<?php endforeach;?>
	</div>
<?php endif;?>
