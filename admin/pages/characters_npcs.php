<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div id="loader" class="fn-char-loading">
	<?php echo img($images['loading']);?>
	<?php echo $label['loading'];?>
</div>

<div id="loaded" class="hidden">
	<div class="fn-admin-dash fn-char">
		<p class="fn-char-create">
			<?php echo anchor('characters/create', img($images['add']) .' '. $label['create'], array('class' => 'image'));?>
		</p>

		<?php if ($count > 0): ?>
			<?php foreach ($characters as $c): ?>
				<?php if (isset($c['chars'])): ?>
					<?php if (isset($c['dept'])): ?>
						<h3 class="fn-char-sub"><?php echo $c['dept'];?></h3>
					<?php endif;?>
					<div class="fn-char-list">
						<?php foreach ($c['chars'] as $i): ?>
							<div class="fn-char-row">
								<div class="fn-char-info">
									<strong class="fn-char-name"><?php echo $i['name'];?></strong>
									<span class="fn-char-pos">
										<?php echo $i['position_1'];?>

										<?php if (!empty($i['position_2'])): ?>
											&amp; <?php echo $i['position_2'];?>
										<?php endif;?>
									</span>
								</div>
								<div class="fn-char-actions">
									<?php if (!empty($i['pid']) && $levelcheck['account'] == 2): ?>
										<?php echo anchor('user/account/'. $i['pid'], img($images['account']), array('class' => 'image'));?>
									<?php endif;?>

									<?php echo anchor('personnel/character/'. $i['id'], img($images['view']), array('class' => 'image'));?>
									<a href="#" rel="facebox" myID="<?php echo $i['id'];?>" class="image">
										<?php echo img($images['delete']);?>
									</a>

									<?php if ($levelcheck['bio'] == 3): ?>
										<?php echo anchor('characters/bio/'. $i['id'], img($images['edit']), array('class' => 'image'));?>
									<?php endif;?>
								</div>
							</div>
						<?php endforeach;?>
					</div>
				<?php endif;?>
			<?php endforeach;?>
		<?php else: ?>
			<div class="fn-char-empty"><?php echo text_output($label['noactive'], 'h3', 'orange');?></div>
		<?php endif;?>
	</div>
</div>
