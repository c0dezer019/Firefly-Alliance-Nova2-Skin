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

		<div id="tabs">
			<ul>
				<li><a href="#one"><span><?php echo $label['active'];?></span></a></li>
				<li><a href="#two"><span><?php echo $label['inactive'];?></span></a></li>
				<li><a href="#three"><span><?php echo $label['pending'];?></span></a></li>
			</ul>

			<div id="one">
				<?php if ($count['active'] > 0): ?>
					<?php foreach ($characters as $c): ?>
						<?php if (isset($c['chars']['active'])): ?>
							<?php if (isset($c['dept'])): ?>
								<h3 class="fn-char-sub"><?php echo $c['dept'];?></h3>
							<?php endif;?>
							<div class="fn-char-list">
								<?php foreach ($c['chars']['active'] as $i): ?>
									<div class="fn-char-row">
										<div class="fn-char-info">
											<strong class="fn-char-name"><?php echo $i['name'];?></strong>

											<?php if (empty($i['uid'])): ?>
												<span class="fn-char-warn"><?php echo $label['nouser'];?></span>
											<?php endif;?>

											<span class="fn-char-pos"><?php echo $i['position_1'];?></span>
										</div>
										<div class="fn-char-actions">
											<?php if (!empty($i['uid']) && $levelcheck['account'] == 2): ?>
												<?php echo anchor('user/account/'. $i['uid'], img($images['account']), array('class' => 'image'));?>
											<?php endif;?>

											<?php echo anchor('personnel/character/'. $i['id'], img($images['view']), array('class' => 'image'));?>

											<?php if ($levelcheck['bio'] == 3): ?>
												<?php echo anchor('user/characterlink', img($images['assign']), array('class' => 'image'));?>
												<a href="#" rel="facebox" myID="<?php echo $i['id'];?>" myAction="delete" class="image">
													<?php echo img($images['delete']);?>
												</a>
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

			<div id="two">
				<?php if ($count['inactive'] > 0): ?>
					<?php foreach ($characters as $c): ?>
						<?php if (isset($c['chars']['inactive'])): ?>
							<?php if (isset($c['dept'])): ?>
								<h3 class="fn-char-sub"><?php echo $c['dept'];?></h3>
							<?php endif;?>
							<div class="fn-char-list">
								<?php foreach ($c['chars']['inactive'] as $i): ?>
									<div class="fn-char-row">
										<div class="fn-char-info">
											<strong class="fn-char-name"><?php echo $i['name'];?></strong>
											<span class="fn-char-pos"><?php echo $i['position_1'];?></span>
										</div>
										<div class="fn-char-actions">
											<?php echo anchor('personnel/character/'. $i['id'], img($images['view']), array('class' => 'image'));?>

											<?php if ($levelcheck['bio'] == 3): ?>
												<a href="#" rel="facebox" myID="<?php echo $i['id'];?>" myAction="delete" class="image">
													<?php echo img($images['delete']);?>
												</a>
												<?php echo anchor('characters/bio/'. $i['id'], img($images['edit']), array('class' => 'image'));?>
											<?php endif;?>
										</div>
									</div>
								<?php endforeach;?>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				<?php else: ?>
					<div class="fn-char-empty"><?php echo text_output($label['noinactive'], 'h3', 'orange');?></div>
				<?php endif;?>
			</div>

			<div id="three">
				<?php if ($count['pending'] > 0): ?>
					<?php foreach ($characters as $c): ?>
						<?php if (isset($c['chars']['pending'])): ?>
							<?php if (isset($c['dept'])): ?>
								<h3 class="fn-char-sub"><?php echo $c['dept'];?></h3>
							<?php endif;?>
							<div class="fn-char-list">
								<?php foreach ($c['chars']['pending'] as $i): ?>
									<div class="fn-char-row fn-char-pending">
										<div class="fn-char-info">
											<strong class="fn-char-name">
												<?php if ($i['pstatus'] == 'pending'): ?>
													<?php echo img($images['new']);?>
												<?php endif;?>
												<?php echo $i['name'];?>
											</strong>

											<?php if (empty($i['uid'])): ?>
												<span class="fn-char-warn"><?php echo $label['nouser'];?></span>
											<?php endif;?>

											<span class="fn-char-pos"><?php echo $i['position_1'];?></span>
										</div>
										<div class="fn-char-contact">
											<?php if ($i['pstatus'] == 'pending'): ?>
												<span class="fn-char-new"><?php echo $label['newuser'];?></span>
											<?php endif;?>
											<span class="fn-char-mail"><?php echo $i['email'];?></span>
										</div>
										<div class="fn-char-actions">
											<?php echo anchor('personnel/character/'. $i['id'], img($images['view']), array('class' => 'image'));?>
											<a href="#" rel="facebox" myID="<?php echo $i['id'];?>" myAction="delete" class="image">
												<?php echo img($images['delete']);?>
											</a>
											<?php echo anchor('characters/bio/'. $i['id'], img($images['edit']), array('class' => 'image'));?>
										</div>
										<div class="fn-char-decide">
											<a href="#" rel="facebox" myID="<?php echo $i['id'];?>" myAction="reject" class="image">
												<?php echo img($images['reject']);?>
											</a>
											<a href="#" rel="facebox" myID="<?php echo $i['id'];?>" myAction="approve" class="image">
												<?php echo img($images['approve']);?>
											</a>
										</div>
									</div>
								<?php endforeach;?>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				<?php else: ?>
					<div class="fn-char-empty"><?php echo text_output($label['nopending'], 'h3', 'orange');?></div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
