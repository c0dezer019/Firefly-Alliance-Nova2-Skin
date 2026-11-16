<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-char">
<?php if (!isset($characters)): ?>
	<h3 class="fn-char-name-head"><?php echo $name;?></h3>

	<p class="fn-char-back"><?php echo anchor('characters/awards', $label['back']);?></p>

	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['give'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['all'];?></span></a></li>
		</ul>

		<div id="one">
			<?php if (isset($awards)): ?>
				<?php echo form_open('characters/awards');?>
					<div class="fn-form-fields">
						<div class="fn-field">
							<kbd><?php echo $label['award'];?></kbd>
							<?php echo form_dropdown('award', $awards, '', 'id="awards"');?>
							<span id="loading" class="hidden fn-char-spin"><?php echo img($images['loading']);?></span>
							<div class="award-desc fn-char-desc"></div>
						</div>

						<div class="fn-field">
							<kbd><?php echo $label['reason'];?></kbd>
							<?php echo form_textarea($inputs['reason']);?>
						</div>
					</div>

					<div class="fn-char-submit">
						<?php echo form_hidden('id', $id);?>
						<?php echo form_button($buttons['submit']);?>
					</div>
				<?php echo form_close();?>
			<?php else: ?>
				<div class="fn-char-empty"><?php echo text_output($label['no_awards_to_give'], 'h3', 'orange');?></div>
			<?php endif;?>
		</div>

		<div id="two">
			<?php if (isset($user)): ?>
				<h3 class="fn-char-sub"><?php echo $label['ooc'];?></h3>
				<table class="zebra fn-char-awards">
					<tbody>
					<?php foreach ($user['awards'] as $u): ?>
						<tr id="<?php echo $u['id'];?>">
							<td class="fn-char-award-img"><?php echo img($u['image']);?></td>
							<td>
								<strong><?php echo $u['award'];?></strong>
								<span class="fn-char-award-meta">
									<?php echo $label['given'] .' '. $u['date'];?><br />
									<?php echo text_output($u['reason'], '');?>
								</span>
							</td>
							<td class="fn-char-award-act">
								<a href="#" myID="<?php echo $u['id'];?>" class="remove image"><?php echo img($images['remove']);?></a>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			<?php endif;?>

			<?php if (isset($character)): ?>
				<h3 class="fn-char-sub"><?php echo $label['ic'];?></h3>
				<table class="zebra fn-char-awards">
					<tbody>
					<?php foreach ($character['awards'] as $c): ?>
						<tr id="<?php echo $c['id'];?>">
							<td class="fn-char-award-img"><?php echo img($c['image']);?></td>
							<td>
								<strong><?php echo $c['award'];?></strong>
								<span class="fn-char-award-meta">
									<?php echo $label['given'] .' '. $c['date'];?><br />
									<?php echo text_output($c['reason'], '');?>
								</span>
							</td>
							<td class="fn-char-award-act">
								<a href="#" myID="<?php echo $c['id'];?>" class="remove image"><?php echo img($images['remove']);?></a>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			<?php else: ?>
				<div class="fn-char-empty"><?php echo text_output($label['no_awards'], 'h3', 'orange');?></div>
			<?php endif;?>
		</div>
	</div>
<?php else: ?>
	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['active'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['npc'];?></span></a></li>
			<li><a href="#three"><span><?php echo $label['inactive'];?></span></a></li>
		</ul>

		<div id="one">
			<h2><?php echo $label['active'];?></h2>
			<?php if (isset($characters['active'])): ?>
				<ul class="fn-char-pick">
				<?php foreach ($characters['active'] as $i): ?>
					<li><?php echo anchor('characters/awards/'. $i['id'], $i['name']);?></li>
				<?php endforeach;?>
				</ul>
			<?php else: ?>
				<div class="fn-char-empty"><?php echo text_output($label['nochars'], 'h3', 'orange');?></div>
			<?php endif;?>
		</div>

		<div id="two">
			<h2><?php echo $label['npc'];?></h2>
			<?php if (isset($characters['npc'])): ?>
				<ul class="fn-char-pick">
				<?php foreach ($characters['npc'] as $i): ?>
					<li><?php echo anchor('characters/awards/'. $i['id'], $i['name']);?></li>
				<?php endforeach;?>
				</ul>
			<?php else: ?>
				<div class="fn-char-empty"><?php echo text_output($label['nochars'], 'h3', 'orange');?></div>
			<?php endif;?>
		</div>

		<div id="three">
			<h2><?php echo $label['inactive'];?></h2>
			<?php if (isset($characters['inactive'])): ?>
				<ul class="fn-char-pick">
				<?php foreach ($characters['inactive'] as $i): ?>
					<li><?php echo anchor('characters/awards/'. $i['id'], $i['name']);?></li>
				<?php endforeach;?>
				</ul>
			<?php else: ?>
				<div class="fn-char-empty"><?php echo text_output($label['nochars'], 'h3', 'orange');?></div>
			<?php endif;?>
		</div>
	</div>
<?php endif;?>
</div>
