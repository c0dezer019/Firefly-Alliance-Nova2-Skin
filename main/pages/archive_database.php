<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">档案 · ARCHIVE</span>
</div>

<?php if (isset($entries)): ?>
	<p class="fn-per-back"><?php echo anchor('archive/index', LARROW .' Back to Archive Index');?></p>

	<div class="fn-specs-list">
		<?php foreach ($entries as $key => $value): ?>
			<div class="fn-specs-list-row">
				<?php if ($value['type'] == 'entry'): ?>
					<?php echo anchor('archive/database/'. $key, $value['title'], array('class' => 'name'));?>
				<?php else: ?>
					<span class="name fn-arch-plain"><?php echo $value['title'];?></span>
				<?php endif;?>
				<span class="summary"><?php echo $value['desc'];?></span>
			</div>
		<?php endforeach;?>
	</div>
<?php elseif (isset($entry)): ?>
	<p class="fn-per-back"><?php echo anchor('archive/database', LARROW .' Back to Database Entries');?></p>

	<div class="fn-doc-stack">
		<div class="fn-doc-panel accent">
			<p><strong>Description:</strong> <?php echo text_output($entry['desc'], '');?></p>
			<hr />
			<?php echo $entry['content'];?>
		</div>
	</div>
<?php endif;?>
