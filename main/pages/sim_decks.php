<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">甲板 · DECKS</span>
</div>

<?php if (isset($specs)): ?>
	<?php if (count($specs) > 0): ?>
		<div class="fn-specs-list">
			<?php foreach ($specs as $key => $value): ?>
				<div class="fn-specs-list-row">
					<?php echo anchor('sim/decks/'.$key, $value['name'], array('class' => 'name'));?>
					<span class="summary"><?php echo text_output($value['desc'], '');?></span>
				</div>
			<?php endforeach;?>
		</div>
	<?php else: ?>
		<p class="fn-card-excerpt"><?php echo $label['nodecks'];?></p>
	<?php endif;?>
<?php else: ?>
	<?php if ($edit_valid === true): ?>
		<p class="fn-decks-edit"><?php echo link_to_if($edit_valid, 'manage/decks', $label['edit']);?></p>
	<?php endif;?>

	<?php if (isset($decks)): ?>
		<?php if (isset($decks_menu)): ?>
			<div class="fn-decks-menu"><?php echo $decks_menu;?></div>
		<?php endif;?>

		<div class="fn-deck-accordion">
			<?php foreach ($decks as $deck): ?>
				<div class="fn-deck-item">
					<a name="<?php echo $deck['id'];?>"></a>
					<div class="fn-deck-header" data-fn-deck-toggle>
						<span class="fn-deck-name"><?php echo $deck['name'];?></span>
						<span class="fn-deck-arrow">&#9662;</span>
					</div>
					<div class="fn-deck-body">
						<?php echo text_output($deck['content']);?>
					</div>
				</div>
			<?php endforeach;?>
		</div>

		<script type="text/javascript">
		(function () {
			// Progressive enhancement: deck bodies render open (accessible without
			// JS); this collapses them into the mockup accordion and toggles on click.
			var heads = document.querySelectorAll('.fn-deck-header[data-fn-deck-toggle]');
			for (var i = 0; i < heads.length; i++) {
				var body = heads[i].nextElementSibling;
				if (body) { body.style.display = 'none'; heads[i].classList.remove('is-open'); }
				heads[i].addEventListener('click', function () {
					var b = this.nextElementSibling;
					if (!b) { return; }
					var open = b.style.display !== 'none';
					b.style.display = open ? 'none' : 'block';
					this.classList.toggle('is-open', !open);
				});
			}
		})();
		</script>
	<?php else: ?>
		<p class="fn-card-excerpt"><?php echo $label['nodecks'];?></p>
	<?php endif;?>
<?php endif;?>
