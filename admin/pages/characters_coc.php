<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<?php /* The flash messages from coc JS are prepended to the grandparent of #add/#update (read by its class attr), so .fn-char-coc must stay a single-class element. */ ?>
<div class="fn-char-coc">
	<div class="fn-char-coc-intro"><?php echo text_output($text);?></div>

	<div class="fn-char-coc-status">
		<div id="loading" class="hidden">
			<?php echo img($loading);?>
			<?php echo $label['processing'];?>...
		</div>
	</div>

	<div class="fn-char-coc-add">
		<?php echo form_dropdown_characters('characters', '', 'id="crew"', 'user_npc', true);?>
		<?php echo form_button($buttons['add']);?>
	</div>

	<div class="UITheme fn-char-coc-list">
		<ul id="list">
			<?php if (isset($coc)): ?>
				<?php foreach ($coc as $key => $value): ?>
					<li class="ui-state-default" id="coc_<?php echo $key;?>">
						<div class="float_right"><a href="#" class="remove image" name="remove" id="<?php echo $key;?>">x</a></div>
						<?php echo $value;?>
					</li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>

	<div class="submit-div hidden">
		<?php echo form_button($buttons['submit']);?>
	</div>

	<?php echo form_open().form_close();?>
</div>
