<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">档案 · ARCHIVE</span>
</div>

<?php if (isset($data)): ?>
	<p class="fn-per-back"><?php echo anchor('archive/index', LARROW .' Back to Archive Index');?></p>

	<div class="fn-news-filter">
		<span class="flabel">Show</span>
		<?php echo anchor('archive/characters/active', 'Active Characters', array('class' => 'pill'));?>
		<?php echo anchor('archive/characters/inactive', 'Inactive Characters', array('class' => 'pill'));?>
		<?php echo anchor('archive/characters/npc', 'Non-Playing Characters', array('class' => 'pill'));?>
	</div>

	<?php foreach ($data as $key => $value): ?>
		<div class="fn-per-subhead"><?php echo $value['dept'];?></div>
		<div class="fn-specs-panel">
			<?php foreach ($value['positions'] as $p): ?>
				<?php if (isset($p['characters'])): ?>
					<div class="fn-arch-row">
						<div class="fn-arch-key"><?php echo $p['position'];?></div>
						<div class="fn-arch-val">
							<?php foreach ($p['characters'] as $c): ?>
								<div><?php echo $c['name'];?></div>
							<?php endforeach;?>
						</div>
					</div>
				<?php endif;?>
			<?php endforeach;?>
		</div>
	<?php endforeach;?>
<?php endif;?>
