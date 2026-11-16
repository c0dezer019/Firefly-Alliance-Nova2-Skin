<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">百科 · WIKI</span>
</div>

<?php echo $syspage;?>

<?php if ($access): ?>
	<p class="fn-per-edit"><?php echo link_to_if($access, 'wiki/managecategories', $label['edit']);?></p>
<?php endif;?>

<?php echo text_output($label['text']);?>

<?php if (isset($categories)): ?>
	<ul class="square">
		<?php foreach ($categories as $k => $c): ?>
			<li><?php echo anchor('wiki/category/'.$k, $c);?></li>
		<?php endforeach;?>
	</ul>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['nocats'];?></p>
<?php endif;?>
