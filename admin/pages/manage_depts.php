<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * One department row (and, via $sub_of, a sub-department row).
 * The facebox hooks (rel, myid, myaction) are read by manage_depts_js.php.
 */
$dept_row = function ($d, $depth, $parent_name) {
    ?>
	<div class="fn-mg-row fn-mg-depth-<?php echo $depth;?>">
		<div class="fn-mg-main">
			<span class="fn-st-name"><?php echo $d->dept_name;?></span>
			<?php if ($parent_name !== false): ?>
				<span class="fn-st-sub"><?php echo $parent_name;?></span>
			<?php endif;?>
			<div class="fn-mg-desc"><?php echo $d->dept_desc;?></div>
		</div>
		<div class="fn-mg-actions">
			<a href="#" rel="facebox" myid="<?php echo $d->dept_id;?>" myaction="duplicate" class="fn-mg-btn"><?php echo ucfirst(lang('actions_duplicate'));?></a>
			<a href="#" rel="facebox" myid="<?php echo $d->dept_id;?>" myaction="edit" class="fn-mg-btn"><?php echo ucfirst(lang('actions_edit'));?></a>
			<a href="#" rel="facebox" myid="<?php echo $d->dept_id;?>" myaction="delete" class="fn-mg-btn fn-mg-btn-danger"><?php echo ucfirst(lang('actions_delete'));?></a>
		</div>
	</div>
	<?php
};
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-struct">
	<div class="fn-st-intro"><?php echo text_output($text);?></div>

	<p class="fn-st-add"><a href="#" rel="facebox" myaction="add" class="fn-mg-btn fn-mg-btn-add"><?php echo $label['add_dept'];?></a></p>

	<?php if (isset($depts)): ?>
		<div id="tabs">
			<ul>
				<li><a href="#one"><span><?php echo $label['assigned'];?></span></a></li>
				<li><a href="#two"><span><?php echo $label['unassigned'];?></span></a></li>
			</ul>

			<div id="one">
				<?php foreach ($depts as $key => $value): ?>
					<?php if ($key > 0): ?>
						<?php echo text_output($manifests[$key], 'h2', 'page-subhead');?>

						<div class="fn-mg-panel fn-st-list">
						<?php foreach ($value as $d): ?>
							<?php $dept_row($d, 0, false);?>
							<?php if (isset($subs[$d->dept_id])): ?>
								<?php foreach ($subs[$d->dept_id] as $k => $v): ?>
									<?php $dept_row($v['data'], 1, $label['sub_of'].$v['parent']);?>
								<?php endforeach;?>
							<?php endif;?>
						<?php endforeach;?>
						</div>
					<?php endif;?>
				<?php endforeach;?>
			</div>

			<div id="two">
				<?php if (isset($depts[0])): ?>
					<?php foreach ($depts as $key => $value): ?>
						<?php if ($key == 0): ?>
							<?php echo text_output($manifests[$key], 'h2', 'page-subhead');?>

							<div class="fn-mg-panel fn-st-list">
							<?php foreach ($value as $d): ?>
								<?php $dept_row($d, 0, false);?>
							<?php endforeach;?>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				<?php else: ?>
					<?php echo text_output($label['no_unassigned'], 'h3', 'orange');?>
				<?php endif;?>
			</div>
		</div>
	<?php endif;?>
</div>
