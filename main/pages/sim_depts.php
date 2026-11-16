<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">部门 · DEPARTMENTS</span>
</div>

<?php if ($edit_valid_dept === true || $edit_valid_pos === true): ?>
	<p class="fn-depts-edit">
		<?php echo link_to_if($edit_valid_dept, 'manage/depts', $label['edit_dept']);?>
		<?php echo link_to_if($edit_valid_pos, 'manage/positions', $label['edit_pos']);?>
	</p>
<?php endif;?>

<?php if (isset($msg_error)): ?>
	<p class="fn-card-excerpt"><?php echo $msg_error;?></p>
<?php else: ?>
	<ul class="fn-depts-list">
		<?php foreach ($depts as $value): ?>
			<li class="fn-depts-block">
				<h2 class="fn-depts-name"><?php echo $value['name'];?></h2>
				<div class="fn-depts-desc"><?php echo text_output($value['desc']);?></div>

				<?php if (isset($value['positions'])): ?>
					<?php echo anchor('#', $label['toggle'], array('myID' => $value['id'], 'class' => 'toggle fn-depts-toggle'));?>
					<div id="<?php echo $value['id'];?>" class="hidden fn-depts-positions">
						<?php foreach ($value['positions'] as $pos1): ?>
							<div class="fn-pos-row">
								<div class="fn-pos-name"><?php echo $pos1['name'];?></div>
								<div class="fn-pos-desc"><?php echo text_output($pos1['desc'], '');?></div>
							</div>
						<?php endforeach;?>
					</div>
				<?php endif;?>

				<?php if (isset($value['subs'])): ?>
					<ul class="fn-subdept-list">
						<?php foreach ($value['subs'] as $sub): ?>
							<li>
								<h3 class="fn-subdept-name"><?php echo $sub['name'];?></h3>
								<p class="fn-subdept-desc"><?php echo $sub['desc'];?></p>

								<?php if (isset($sub['positions'])): ?>
									<?php echo anchor('#', $label['toggle'], array('myID' => $sub['id'], 'class' => 'toggle fn-depts-toggle'));?>
									<div id="<?php echo $sub['id'];?>" class="hidden fn-depts-positions">
										<?php foreach ($sub['positions'] as $pos2): ?>
											<div class="fn-pos-row">
												<div class="fn-pos-name"><?php echo $pos2['name'];?></div>
												<div class="fn-pos-desc"><?php echo text_output($pos2['desc'], '');?></div>
											</div>
										<?php endforeach;?>
									</div>
								<?php endif;?>
							</li>
						<?php endforeach;?>
					</ul>
				<?php endif;?>
			</li>
		<?php endforeach;?>
	</ul>
<?php endif;?>
