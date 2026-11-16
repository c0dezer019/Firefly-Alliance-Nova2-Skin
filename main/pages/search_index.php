<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">搜索 · SEARCH</span>
</div>

<?php echo form_open('search/results');?>
	<div class="fn-form-panel">
		<div class="fn-form-fields">
			<div class="fn-field">
				<label><?php echo $label['search_for'];?></label>
				<?php echo form_input($inputs['search']);?>
			</div>
			<div class="fn-field-row">
				<div class="fn-field">
					<label><?php echo $label['type'];?></label>
					<?php echo form_dropdown('type', $type, [], 'class="large"');?>
				</div>
				<div class="fn-field">
					<label><?php echo $label['search_in'];?></label>
					<?php echo form_dropdown('component', $component, [], 'class="large"');?>
				</div>
			</div>
			<div class="fn-form-actions">
				<?php echo form_button($inputs['submit']);?>
			</div>
		</div>
	</div>
<?php echo form_close();?>
