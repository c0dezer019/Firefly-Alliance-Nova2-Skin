<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require dirname(dirname(dirname(__FILE__))).'/_global/config.php';
?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">参观 · TOUR</span>
</div>

<?php if ($edit_valid === true || $edit_valid_form === true): ?>
	<p class="fn-tour-edit">
		<?php echo link_to_if($edit_valid, 'manage/tour', $label['edit']);?>
		<?php echo link_to_if($edit_valid_form, 'site/tourform', $label['edit_form']);?>
	</p>
<?php endif;?>

<?php if (isset($tour)): ?>
	<?php foreach ($items as $key => $value): ?>
		<?php if (isset($tour[$key])): ?>
			<div class="fn-tour-panel">
				<div class="fn-tour-deck-label">
					<span class="reg"><?php echo $skin_registry_right;?> &middot;</span>
					<span class="name"><?php echo $value;?></span>
					<div class="rule"></div>
					<?php if ($key != 0): ?>
						<?php echo anchor('sim/specs/'.$key, '[ '.$label['viewspec'].' ]', array('class' => 'viewspec'));?>
					<?php endif;?>
					<span class="count"><?php echo count($tour[$key]);?> Compartments</span>
				</div>
				<div class="fn-tour-grid">
					<?php foreach ($tour[$key] as $t): ?>
						<div class="fn-tour-card">
							<?php echo anchor('sim/tour/'.$t['id'], $t['name'], array('class' => 'fn-tour-card-name'));?>
							<p class="fn-tour-card-summary"><?php echo text_output($t['summary'], '');?></p>
						</div>
					<?php endforeach;?>
				</div>
			</div>
		<?php endif;?>
	<?php endforeach;?>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['notour_all'];?></p>
<?php endif;?>
