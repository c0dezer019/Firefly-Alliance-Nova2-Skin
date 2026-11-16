<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">加入 · JOIN</span>
</div>

<div class="fn-join-advisory">
	<div class="fn-join-advisory-head">
		<span class="badge">Content Advisory &middot; M / 18+</span>
	</div>
	<div class="fn-join-advisory-body"><?php echo text_output($msg);?></div>
</div>

<?php echo form_open('main/join');?>
	<?php echo form_hidden('agree', 'yes');?>
	<?php if (isset($position)): ?>
		<?php echo form_hidden('position', $position);?>
	<?php endif;?>
	<div class="fn-form-actions fn-join-submit">
		<?php echo form_button($button['agree']);?>
	</div>
<?php echo form_close();?>
