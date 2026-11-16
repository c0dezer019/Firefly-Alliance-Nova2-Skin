<?php defined('BASEPATH') or exit('No direct script access allowed');?>

<?php
/*
 * One tab per image directory. Keys mirror the _base page exactly:
 * tab id, access flag, $directory key, form target, tab label key, empty label key.
 * NOTE: _base gated the "specs" tab <li> on $access['missions'] but its panel on
 * $access['specs']; both now use $access['specs'] so tab and panel always match.
 */
$sections = array(
    array('id' => 'one',   'access' => 'bio',      'dir' => 'bio',     'target' => 'bio',      'tab' => 'bioimages',     'none' => 'nobio'),
    array('id' => 'two',   'access' => 'awards',   'dir' => 'award',   'target' => 'awards',   'tab' => 'awardimages',   'none' => 'noaward'),
    array('id' => 'three', 'access' => 'missions', 'dir' => 'mission', 'target' => 'missions', 'tab' => 'missionimages', 'none' => 'nomission'),
    array('id' => 'four',  'access' => 'specs',    'dir' => 'specs',   'target' => 'specs',    'tab' => 'specsimages',   'none' => 'nospecs'),
    array('id' => 'five',  'access' => 'tour',     'dir' => 'tour',    'target' => 'tour',     'tab' => 'tourimages',    'none' => 'notour'),
);
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<div class="fn-rpt-intro"><?php echo text_output($text);?></div>

	<p class="fn-up-manage"><?php echo anchor('upload/index', $label['upload'], array('class' => 'fn-rpt-btn'));?></p>

	<div id="tabs">
		<ul>
			<?php foreach ($sections as $s): ?>
				<?php if ($access[$s['access']] === true): ?>
					<li><a href="#<?php echo $s['id'];?>"><span><?php echo $label[$s['tab']];?></span></a></li>
				<?php endif;?>
			<?php endforeach;?>
		</ul>

		<?php foreach ($sections as $s): ?>
			<?php if ($access[$s['access']] === true): ?>
				<div id="<?php echo $s['id'];?>">
					<?php echo form_open('upload/manage/'. $s['target']);?>
						<?php if (isset($directory[$s['dir']])): ?>
							<div class="fn-up-grid">
								<?php foreach ($directory[$s['dir']] as $i): ?>
									<div class="fn-up-card">
										<div class="fn-up-thumb"><?php echo img($i['image']);?></div>
										<div class="fn-up-file"><?php echo $i['filename'];?></div>
										<div class="fn-up-info">
											<?php echo $label['uploadedby'] .' '. $i['user'];?>
											<?php echo $label['on'] .' '. $i['date'];?>
										</div>
										<label class="fn-up-del">
											<?php echo form_checkbox($i['check']);?>
											<span><?php echo $label['delete'];?></span>
										</label>
									</div>
								<?php endforeach;?>
							</div>

							<div class="fn-up-submit"><?php echo form_button($button['submit']);?></div>
						<?php else: ?>
							<div class="fn-rpt-empty"><?php echo $label[$s['none']];?></div>
						<?php endif;?>
					<?php echo form_close();?>
				</div>
			<?php endif;?>
		<?php endforeach;?>
	</div>
</div>
