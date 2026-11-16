<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-struct">
<?php if (isset($specs)): ?>
	<div class="fn-mg-panel">
		<ul class="fn-st-linkset">
		<?php foreach ($specs as $k => $s): ?>
			<li><?php echo anchor('manage/decks/'.$k, $s, array('class' => 'fn-st-link'));?></li>
		<?php endforeach;?>
		</ul>
	</div>
<?php else: ?>
	<div class="fn-st-intro"><?php echo text_output($text);?></div>

	<p class="fn-st-links"><?php echo anchor('manage/decks', $label['back']);?></p>

	<div class="fn-st-loader">
		<div id="loading" class="hidden">
			<?php echo img($loading);?><br />
			<?php echo $label['processing'];?>
		</div>
	</div>

	<div class="fn-st-addbar">
		<?php echo form_input($inputs['deck']);?>
		<?php echo form_dropdown('item', $values['specs'], $this->uri->segment(3));?>
		<?php echo form_button($buttons['add']);?>
	</div>

	<div class="fn-st-decks">
		<ul id="list" class="UITheme">
			<?php if (isset($decks)): ?>
				<?php foreach ($decks as $key => $value): ?>
					<li class="ui-state-default" id="decks_<?php echo $key;?>">
						<div class="float_right"><a href="#" class="remove image" name="remove" id="<?php echo $key;?>">x</a></div>
						<a href="#" rel="facebox" class="image" myID="<?php echo $key;?>"><?php echo $value;?></a>
					</li>
				<?php endforeach; ?>
			<?php endif;?>
		</ul>
	</div>

	<div id="update_button_div" class="<?php if (! isset($decks)): echo 'hidden'; endif;?>">
		<div class="fn-st-deck-actions"><?php echo form_button($buttons['submit']);?></div>
	</div>

	<?php echo form_open().form_close();?>
<?php endif;?>
</div>
