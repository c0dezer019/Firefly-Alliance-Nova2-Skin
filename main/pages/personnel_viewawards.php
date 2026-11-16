<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">勋章 · AWARDS</span>
</div>

<?php if (isset($msg_error)): ?>
	<p class="fn-card-excerpt"><?php echo $msg_error;?></p>
<?php endif;?>

<?php if (isset($awards)): ?>
	<p class="fn-per-back"><?php echo anchor('personnel/character/'.$charid, $label['backchar']);?></p>
	<div class="fn-per-subhead"><?php echo $label['ooc'].' '.$label['awards'];?></div>
	<div class="fn-specs-panel">
		<?php foreach ($awards as $value): ?>
			<div class="fn-peraward">
				<div><?php echo anchor('sim/awards/'.$value['award_id'], img($value['img']), array('class' => 'image'));?></div>
				<div class="fn-peraward-name"><?php echo $value['award'];?><span class="fn-peraward-meta"><?php echo $label['awarded'].' '.$value['date'];?><?php if (! empty($value['nom'])): ?> &middot; <?php echo $label['nominatedby'].' '.$value['nom'];?><?php endif;?></span></div>
				<div class="fn-peraward-reason"><?php echo text_output($value['reason'], '');?></div>
			</div>
		<?php endforeach;?>
	</div>
<?php endif;?>

<?php if (isset($char)): ?>
	<p class="fn-per-back"><?php echo anchor('personnel/user/'.$user.'/5', $label['backuser']);?></p>
	<?php foreach ($char as $value): ?>
		<div class="fn-per-subhead"><?php echo $value['character'];?></div>
		<div class="fn-specs-panel">
			<?php foreach ($value['awards'] as $b): ?>
				<div class="fn-peraward">
					<div><?php echo anchor('sim/awards/'.$b['award_id'], img($b['img']), array('class' => 'image'));?></div>
					<div class="fn-peraward-name"><?php echo $b['award'];?><span class="fn-peraward-meta"><?php echo $label['awarded'].' '.$b['date'];?><?php if (! empty($b['nom'])): ?> &middot; <?php echo $label['nominatedby'].' '.$b['nom'];?><?php endif;?></span></div>
					<div class="fn-peraward-reason"><?php echo text_output($b['reason'], '');?></div>
				</div>
			<?php endforeach;?>
		</div>
	<?php endforeach;?>
<?php endif;?>
