<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $label['choose_char'];?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-char">
	<?php if (isset($characters)): ?>
		<?php if (isset($characters['active'])): ?>
			<h3 class="fn-char-sub"><?php echo $label['type_active'];?></h3>
			<ul class="fn-char-pick">
				<?php foreach ($characters['active'] as $k => $c): ?>
					<li><?php echo anchor('characters/bio/'. $k, $c);?></li>
				<?php endforeach;?>
			</ul>
		<?php endif;?>

		<?php if (isset($characters['npc'])): ?>
			<h3 class="fn-char-sub"><?php echo $label['type_npc'];?></h3>
			<ul class="fn-char-pick">
				<?php foreach ($characters['npc'] as $k => $c): ?>
					<li><?php echo anchor('characters/bio/'. $k, $c);?></li>
				<?php endforeach;?>
			</ul>
		<?php endif;?>

		<?php if (isset($characters['inactive'])): ?>
			<h3 class="fn-char-sub"><?php echo $label['type_inactive'];?></h3>
			<ul class="fn-char-pick">
				<?php foreach ($characters['inactive'] as $k => $c): ?>
					<li><?php echo anchor('characters/bio/'. $k, $c);?></li>
				<?php endforeach;?>
			</ul>
		<?php endif;?>
	<?php endif;?>
</div>
