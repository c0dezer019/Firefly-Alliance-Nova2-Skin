<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div id="loader" class="align_center fn-usr-loader">
	<?php echo img($images['loading']);?><br />
	<?php echo text_output($label['loading'], 'span', 'fn-usr-hint');?>
</div>

<div id="loaded" class="hidden">
	<div class="fn-panel-title fn-admin-title">
		<div class="fn-accent-bar"></div>
		<h2><?php echo $header;?></h2>
		<div class="fn-title-rule"></div>
	</div>

	<div class="fn-admin-dash fn-set fn-usr">
		<div id="tabs">
			<ul>
				<?php if (isset($users['active'])): ?>
					<li><a href="#one"><span><?php echo $label['active'];?></span></a></li>
				<?php endif;?>

				<?php if (isset($users['inactive'])): ?>
					<li><a href="#two"><span><?php echo $label['inactive'];?></span></a></li>
				<?php endif;?>

				<?php if (isset($users['pending'])): ?>
					<li><a href="#three"><span><?php echo $label['pending'];?></span></a></li>
				<?php endif;?>
			</ul>

			<?php foreach ($users as $key => $u): ?>
				<?php if ($key == 'active'): ?>
					<div id="one">
				<?php elseif ($key == 'inactive'): ?>
					<div id="two">
				<?php else: ?>
					<div id="three">
				<?php endif;?>

				<?php if (count($u) > 0): ?>
					<div class="fn-usr-list">
						<div class="fn-usr-row fn-usr-row-head">
							<div><?php echo $label['name'];?></div>
							<div><?php echo $label['character'];?></div>
							<div></div>
						</div>
						<?php foreach ($u as $i): ?>
							<div class="fn-usr-row">
								<div class="fn-usr-main">
									<strong class="fn-usr-name"><?php echo $i['name'];?></strong>
									<span class="fn-usr-sub">
										<strong><?php echo $i['email'];?></strong>
										<?php if (!empty($i['left'])): ?>
											<br />
											<?php echo $label['left'] .' '. $i['left'] .' '. $label['ago'];?>
										<?php endif;?>
									</span>
								</div>
								<div class="fn-usr-aux"><?php echo $i['main_char'];?></div>
								<div class="fn-usr-actions">
									<?php echo anchor('personnel/user/'. $i['id'], img($images['view']), array('class' => 'image'));?>
									<?php echo anchor('user/account/'. $i['id'], img($images['edit']), array('class' => 'image'));?>
									<a href="#" rel="facebox" myID="<?php echo $i['id'];?>" class="image">
										<?php echo img($images['delete']);?>
									</a>
								</div>
							</div>
						<?php endforeach;?>
					</div>
				<?php else: ?>

				<?php endif;?>

				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
