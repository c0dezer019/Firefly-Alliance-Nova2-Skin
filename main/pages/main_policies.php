<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">条例 · POLICIES</span>
</div>

<div class="fn-doc-policies">
	<span class="head">Policies</span>
	<?php $i = 1; ?>
	<?php foreach ($policies as $key => $value): ?>
		<?php echo anchor('main/policies/'.$key, $value);?>
		<?php if ($i < count($policies)): ?>
			<span class="sep">·</span>
		<?php endif; ?>
		<?php ++$i; ?>
	<?php endforeach;?>
</div>

<div class="fn-doc-stack">
	<div class="fn-doc-panel accent">
		<?php echo text_output($message);?>
	</div>
</div>
