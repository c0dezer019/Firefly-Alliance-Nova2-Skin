<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<p class="fn-wiki-search-trigger"><a href="#" id="search-trigger" class="image"><?php echo $label['search_in'];?></a></p>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">百科 · WIKI</span>
</div>

<div id="search-panel" class="info-full hidden">
	<?php echo form_open('search/results');?>
		<p>
			<kbd><?php echo $label['search_in'];?></kbd>
			<?php echo form_dropdown('component', $component);?>
		</p>
		<p>
			<kbd><?php echo $label['search_for'];?></kbd>
			<?php echo form_input($inputs['search']);?>
		</p>
		<p>
			<?php echo form_hidden('type', 'wiki');?>
			<?php echo form_button($inputs['submit']);?>
		</p>
	<?php echo form_close();?>
</div>

<?php echo $syspage;?>
