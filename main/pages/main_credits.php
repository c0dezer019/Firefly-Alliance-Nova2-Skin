<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">致谢 · CREDITS</span>
</div>

<?php if ($edit_valid): ?>
	<p class="fn-doc-edit"><?php echo link_to_if($edit_valid, 'site/messages', $label['edit']);?></p>
<?php endif;?>

<div class="fn-doc-stack">
	<div class="fn-doc-panel accent">
		<?php echo text_output($msg_credits);?>
	</div>
	<div class="fn-doc-panel">
		<?php echo text_output($msg_credits_perm);?>
	</div>
</div>
