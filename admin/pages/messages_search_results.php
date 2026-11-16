<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-msgres">
	<p class="fn-msgres-top"><a href="<?php echo site_url('messages/index');?>" class="fn-write-back"><?php echo $label['back'];?></a></p>

	<div id="loading" class="fn-inbox-loading">
		<?php echo img($loader);?>
		<?php echo $label['loading'];?>
	</div>

	<div id="loaded" class="hidden">
		<?php if (isset($results)): ?>
			<?php if ($results['received_count'] > 0 && $results['sent_count'] > 0) : ?>
				<div id="tabs">
					<ul>
						<li><a href="#one"><span><?php echo $label['received'] . ': ' . $results['received_count'];?></span></a></li>
						<li><a href="#two"><span><?php echo $label['sent'] . ': ' . $results['sent_count'];?></span></a></li>
					</ul>

					<div id="one">
						<?php foreach ($results['received'] as $item): ?>
							<div class="fn-msgres-row">
								<h4 class="fn-msgres-subject">
									<?php echo anchor('messages/read/'. $item['id'], $item['subject']);?>
									<a href="#" rel="popover" class="image" title="<?php echo $label['message_preview'];?>" data-content="<?php echo $item['preview'];?>"><?php echo img($images['preview']);?></a>
								</h4>
								<div class="fn-msgres-meta">
									<span><?php echo img($images['user']).$item['author'];?></span>
									<span><?php echo img($images['clock']).$item['date'];?></span>
								</div>
							</div>
						<?php endforeach;?>
					</div>

					<div id="two">
						<?php foreach ($results['sent'] as $item): ?>
							<div class="fn-msgres-row">
								<h4 class="fn-msgres-subject">
									<?php echo anchor('messages/read/'. $item['id'], $item['subject']);?>
									<a href="#" rel="popover" class="image" title="<?php echo $label['message_preview'];?>" data-content="<?php echo $item['preview'];?>"><?php echo img($images['preview']);?></a>
								</h4>
								<div class="fn-msgres-meta">
									<span><?php echo img($images['user']).$item['author'];?></span>
									<span><?php echo img($images['clock']).$item['date'];?></span>
								</div>
							</div>
						<?php endforeach;?>
					</div>
				</div>
			<?php elseif ($results['received_count'] > 0) : ?>
				<div class="fn-msgres-list">
					<div class="fn-msgres-head"><?php echo $label['received'] . ': ' . $results['received_count'];?></div>
					<?php foreach ($results['received'] as $item): ?>
						<div class="fn-msgres-row">
							<h4 class="fn-msgres-subject">
								<?php echo anchor('messages/read/'. $item['id'], $item['subject']);?>
								<a href="#" rel="popover" class="image" title="<?php echo $label['message_preview'];?>" data-content="<?php echo $item['preview'];?>"><?php echo img($images['preview']);?></a>
							</h4>
							<div class="fn-msgres-meta">
								<span><?php echo img($images['user']).$item['author'];?></span>
								<span><?php echo img($images['clock']).$item['date'];?></span>
							</div>
						</div>
					<?php endforeach;?>
				</div>
			<?php elseif ($results['sent_count'] > 0) : ?>
				<div class="fn-msgres-list">
					<div class="fn-msgres-head"><?php echo $label['sent'] . ': ' . $results['sent_count'];?></div>
					<?php foreach ($results['sent'] as $item): ?>
						<div class="fn-msgres-row">
							<h4 class="fn-msgres-subject">
								<?php echo anchor('messages/read/'. $item['id'], $item['subject']);?>
								<a href="#" rel="popover" class="image" title="<?php echo $label['message_preview'];?>" data-content="<?php echo $item['preview'];?>"><?php echo img($images['preview']);?></a>
							</h4>
							<div class="fn-msgres-meta">
								<span><?php echo img($images['user']).$item['author'];?></span>
								<span><?php echo img($images['clock']).$item['date'];?></span>
							</div>
						</div>
					<?php endforeach;?>
				</div>
			<?php endif ?>
		<?php else: ?>
			<div class="fn-inbox-panel fn-msgres-noresult">
				<div class="fn-inbox-empty"><?php echo $label['no_results'];?></div>
			</div>

			<?php echo form_open('messages/search', array('class' => 'fn-inbox-search'));?>
				<?php echo form_input($inputs['search']);?>
				<?php echo form_button($inputs['submit']);?>
			<?php echo form_close();?>
		<?php endif;?>
	</div>
</div>
