<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">对接 · DOCKED</span>
</div>

<p class="fn-per-back"><?php echo anchor('sim/docked', $label['back']);?></p>

<?php if (isset($docked)): ?>
	<div class="fn-specs-panel">
		<div class="fn-spec-row">
			<span class="k"><?php echo $label['name'];?></span>
			<span class="v"><?php echo $docked['sim_name'];?><br /><a href="<?php echo $docked['sim_url'];?>" target="_blank"><?php echo $docked['sim_url'];?></a></span>
		</div>
		<div class="fn-spec-row">
			<span class="k"><?php echo $label['gm_name'];?></span>
			<span class="v"><?php echo $docked['gm_name'];?></span>
		</div>
		<div class="fn-spec-row">
			<span class="k"><?php echo $label['received'];?></span>
			<span class="v"><?php echo $docked['date'];?></span>
		</div>
	</div>

	<?php if (isset($sections)): ?>
		<?php foreach ($sections as $section): ?>
			<?php if (isset($section['fields'])): ?>
				<div class="fn-per-subhead"><?php echo $section['title'];?></div>
				<div class="fn-specs-panel">
					<?php foreach ($section['fields'] as $field): ?>
						<?php if (! empty($field['data'])): ?>
							<div class="fn-spec-row">
								<span class="k"><?php echo $field['field'];?></span>
								<span class="v"><?php echo $field['data'];?></span>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				</div>
			<?php endif;?>
		<?php endforeach;?>
	<?php endif;?>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['nosim'];?></p>
<?php endif;?>
