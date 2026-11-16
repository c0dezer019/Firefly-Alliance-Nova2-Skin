<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require dirname(dirname(dirname(__FILE__))).'/_global/config.php';
$fn_reg = $skin_registry_right;
?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">任务 · MISSIONS</span>
</div>

<?php if ($edit_valid): ?>
	<p class="fn-mis-edit"><?php echo link_to_if($edit_valid, 'manage/missions', $label['edit']);?></p>
<?php endif;?>

<?php if (isset($missions['current'])): ?>
	<div class="fn-mis-sec active">
		<span class="dot"></span>
		<span class="lbl"><?php echo $label['s_current'];?></span>
		<span class="rule"></span>
	</div>
	<?php foreach ($missions['current'] as $cur): ?>
		<div class="fn-mis-active">
			<div class="fn-mis-head">
				<div>
					<div class="fn-mis-num"><?php echo $fn_reg;?></div>
					<h3 class="fn-mis-title"><?php echo anchor('sim/missions/id/'.$cur['id'], $cur['title']);?></h3>
				</div>
				<div class="fn-mis-status"><span class="dot"></span><span><?php echo $label['s_current'];?></span></div>
			</div>
			<div class="fn-mis-hr"></div>
			<div class="fn-mis-desc"><?php echo text_output($cur['desc']);?></div>
			<div class="fn-mis-tally">
				<div><span class="num"><?php echo $cur['count'];?></span><span class="lbl"><?php echo $label['count'];?></span></div>
			</div>
			<div class="fn-mis-actions">
				<?php echo anchor('sim/listposts/mission/'.$cur['id'], '&raquo; '.$label['posts']);?>
				<?php if (is_array($cur['group'])): ?>
					<span class="sep"></span>
					<?php echo anchor('sim/missions/group/'.$cur['group']['misgroup_id'], '&raquo; '.$cur['group']['misgroup_name']);?>
				<?php endif;?>
			</div>
		</div>
	<?php endforeach;?>
<?php endif;?>

<?php if (isset($missions['upcoming'])): ?>
	<div class="fn-mis-sec upcoming">
		<span class="lbl"><?php echo $label['s_upcoming'];?></span>
		<span class="rule"></span>
	</div>
	<div class="fn-mis-grid">
		<?php foreach ($missions['upcoming'] as $upc): ?>
			<div class="fn-mis-card">
				<span class="queued"><?php echo $label['s_upcoming'];?></span>
				<div class="fn-mis-num"><?php echo $fn_reg;?></div>
				<h3 class="fn-mis-card-title"><?php echo anchor('sim/missions/id/'.$upc['id'], $upc['title']);?></h3>
				<div class="fn-mis-hr"></div>
				<div class="fn-mis-card-desc"><?php echo text_output($upc['desc'], '');?></div>
				<?php if (is_array($upc['group'])): ?>
					<div class="fn-mis-card-meta">
						<?php echo $label['partof'];?> <?php echo anchor('sim/missions/group/'.$upc['group']['misgroup_id'], $upc['group']['misgroup_name']);?>
					</div>
				<?php endif;?>
			</div>
		<?php endforeach;?>
	</div>
<?php endif;?>

<?php if (isset($missions['completed'])): ?>
	<div class="fn-mis-sec completed">
		<span class="lbl"><?php echo $label['s_completed'];?></span>
		<span class="rule"></span>
	</div>
	<?php foreach ($missions['completed'] as $com): ?>
		<div class="fn-mis-done">
			<span class="fn-mis-done-title"><?php echo anchor('sim/missions/id/'.$com['id'], $com['title']);?></span>
			<span class="badge"><?php echo $label['s_completed'];?></span>
		</div>
	<?php endforeach;?>
<?php endif;?>

<?php if (! isset($missions['current']) && ! isset($missions['upcoming']) && ! isset($missions['completed'])): ?>
	<p class="fn-card-excerpt"><?php echo $label['nomissions'];?></p>
<?php endif;?>
