<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $label['sitemanifests'] .' &ndash; '. $label['assign'];?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-site">
	<div class="fn-site-links">
		<?php echo anchor('site/manifests', $label['back']);?>
		<?php echo anchor('site/manifests/assign', $label['refresh']);?>
	</div>

	<div class="fn-set-intro"><?php echo text_output($text);?></div>

	<?php if (isset($manifests)): ?>
		<h3 class="fn-site-group"><?php echo $label['unassigned'];?></h3>

		<div mid="0" class="droppable fn-site-drop">
			<?php if (isset($unassigned)): ?>
				<?php foreach ($unassigned as $id => $d): ?>
					<span class="draggable ui-widget-header fn-site-chip" did="<?php echo $id;?>" rel="tooltip" title="<?php echo $d['desc'];?>"><?php echo $d['name'];?></span>
				<?php endforeach;?>
			<?php endif;?>
		</div>

		<?php foreach ($manifests as $id => $m): ?>
			<h3 class="fn-site-group">
				<?php echo $m['manifest'];?>
				<?php if ($m['display'] == 'n'): ?>
					<span class="fn-site-off">[ <?php echo $label['off'];?> ]</span>
				<?php endif;?>
			</h3>

			<div mid="<?php echo $id;?>" class="droppable fn-site-drop">
				<?php if (isset($m['depts'])): ?>
					<?php foreach ($m['depts'] as $i => $dept): ?>
						<span class="draggable ui-widget-header fn-site-chip" did="<?php echo $i;?>" rel="tooltip" title="<?php echo $dept['desc'];?>"><?php echo $dept['name'];?></span>
					<?php endforeach;?>
				<?php endif;?>
			</div>
		<?php endforeach;?>
	<?php endif;?>
</div>
