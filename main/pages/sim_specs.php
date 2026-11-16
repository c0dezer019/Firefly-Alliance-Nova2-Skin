<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
// NOTE: Nova's Sim::specs() only ever loads sim_specs_all (overview) or
// sim_specs_one (single spec). This view is a clean fallback that mirrors the
// _base data contract ($sections of field/data rows) in case a flow requests it.
?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">舰船规格 · SPECS</span>
</div>

<?php if ($edit_valid === true || $edit_valid_form === true): ?>
	<p class="fn-specs-edit">
		<?php echo link_to_if($edit_valid, 'manage/specs', $label['edit']);?>
		<?php echo link_to_if($edit_valid_form, 'site/specsform', $label['edit_form']);?>
	</p>
<?php endif;?>

<?php if (isset($sections)): ?>
	<div class="fn-specs-grid">
		<?php foreach ($sections as $section): ?>
			<div class="fn-specs-panel">
				<div class="fn-specs-panel-title"><?php echo $section['title'];?></div>
				<?php if (isset($section['fields'])): ?>
					<?php foreach ($section['fields'] as $field): ?>
						<div class="fn-spec-row">
							<span class="k"><?php echo $field['field'];?></span>
							<span class="v"><?php echo text_output($field['data'], '');?></span>
						</div>
					<?php endforeach;?>
				<?php else: ?>
					<p class="fn-card-excerpt fn-spec-empty"><?php echo $label['nospecs'];?></p>
				<?php endif;?>
			</div>
		<?php endforeach;?>
	</div>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['nospecs'];?></p>
<?php endif;?>
