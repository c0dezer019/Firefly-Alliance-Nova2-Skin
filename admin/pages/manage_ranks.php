<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-struct">
	<div class="fn-st-intro"><?php echo text_output($text);?></div>

	<div class="fn-st-nav">
		<?php if (isset($allranks)): ?>
			<div class="fn-st-nav-label"><?php echo $label['sets'];?></div>
			<div class="fn-st-pills">
				<?php foreach ($allranks as $a => $b): ?>
					<?php echo anchor('manage/ranks/'. $a, img($b), array('class' => 'image fn-st-pill fn-st-pill-img'));?>
				<?php endforeach;?>
			</div>
		<?php endif;?>

		<?php if (isset($allclasses)): ?>
			<div class="fn-st-nav-label"><?php echo $label['classes'];?></div>
			<div class="fn-st-pills">
				<?php foreach ($allclasses as $k => $v): ?>
					<?php echo anchor('manage/ranks/'. $set .'/'. $k, img($v), array('class' => 'image fn-st-pill fn-st-pill-img'));?>
				<?php endforeach;?>
			</div>
		<?php endif;?>
	</div>

	<p class="fn-st-add">
		<a href="#" rel="facebox" myClass="<?php echo $class;?>" mySet="<?php echo $set;?>" class="fn-mg-btn fn-mg-btn-add"><?php echo $label['addrank'];?></a>
	</p>

	<?php if (isset($ranks)): ?>
		<div class="fn-mg-panel fn-st-poslist">
		<?php echo form_open('manage/ranks/'. $set .'/'. $class .'/edit');?>

			<?php foreach ($ranks as $r): ?>
				<div id="<?php echo $r['id'];?>" class="fn-st-rank">
					<div class="fn-st-rank-main">
						<div class="fn-st-rank-img"><?php echo img($r['img']);?></div>
						<div>
							<span class="fn-st-label"><?php echo $label['name'];?></span>
							<?php echo form_input($r['name']);?>
						</div>
						<div>
							<span class="fn-st-label"><?php echo $label['image'];?></span>
							<?php echo form_input($r['image']) . text_output($ext, 'span', 'fn-st-ext');?>
						</div>
						<div class="fn-st-pos-del">
							<?php echo form_label($label['delete'], $r['id'] .'_id');?>?
							<?php echo form_checkbox($r['delete']);?>
						</div>
					</div>

					<div id="tr_<?php echo $r['id'];?>" class="hidden">
						<div class="fn-st-rank-more-panel">
							<div>
								<span class="fn-st-label"><?php echo $label['order'];?></span>
								<?php echo form_input($r['order']);?>
							</div>
							<div>
								<span class="fn-st-label"><?php echo $label['class'];?></span>
								<?php echo form_input($r['class']);?>
							</div>
							<div>
								<span class="fn-st-label"><?php echo $label['display'];?></span>
								<?php echo form_dropdown($r['id'] .'_display', $values['display'], $r['display']);?>
							</div>
							<div>
								<span class="fn-st-label"><?php echo $label['shortname'];?></span>
								<?php echo form_input($r['shortname']);?>
							</div>
						</div>
					</div>

					<div class="fn-st-rank-more UITheme">
						<button class="button-small" curAction="more" id="<?php echo $r['id'];?>">
							<span class="ui-icon ui-icon-triangle-1-s float_right"></span>
							<span class="text"><?php echo $label['more'];?></span>&nbsp;
						</button>
					</div>
				</div>
			<?php endforeach;?>

			<div class="fn-st-actions">
				<?php echo form_button($buttons['update']);?>
			</div>
		<?php echo form_close();?>
		</div>
	<?php endif;?>
</div>
