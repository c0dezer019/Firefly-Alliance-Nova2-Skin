<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/* One tab body: a list of message rows (name/key, content, edit/delete). */
$render_messages = function ($items) use ($label) { ?>
	<?php if (isset($items)): ?>
		<div class="fn-site-list">
			<div class="fn-site-row fn-site-head">
				<span class="fn-site-main narrow"><?php echo $label['name'];?></span>
				<span class="fn-site-content"><?php echo $label['content'];?></span>
				<span class="fn-site-actions"></span>
			</div>
			<?php foreach ($items as $m): ?>
				<div class="fn-site-row">
					<div class="fn-site-main narrow">
						<div class="fn-site-name"><?php echo $m['label'];?></div>
						<div class="fn-site-sub"><?php echo $label['key'] .' '. $m['key'];?></div>
					</div>
					<div class="fn-site-content"><?php echo $m['content'];?></div>
					<div class="fn-site-actions">
						<a href="#" rel="facebox" class="edit" myAction="edit" myID="<?php echo $m['id'];?>" title="<?php echo $label['edit'];?>"><?php echo $label['edit'];?></a>
						<a href="#" rel="facebox" class="delete" myAction="delete" myID="<?php echo $m['id'];?>" title="<?php echo $label['delete'];?>"><?php echo $label['delete'];?></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php else: ?>
		<div class="fn-set-empty"><?php echo $label['no_messages'];?></div>
	<?php endif; ?>
<?php };
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-site">
	<div class="fn-set-intro"><?php echo text_output($text);?></div>

	<p class="fn-set-manage">
		<a href="#" class="fn-set-add" rel="facebox" myAction="add" myID="0"><span class="fn-set-plus">+</span><?php echo $label['add'];?></a>
	</p>

	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['titles'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['messages'];?></span></a></li>
			<li><a href="#three"><span><?php echo $label['other'];?></span></a></li>
		</ul>

		<div id="one">
			<?php $render_messages(isset($messages['title']) ? $messages['title'] : null);?>
		</div>

		<div id="two">
			<?php $render_messages(isset($messages['message']) ? $messages['message'] : null);?>
		</div>

		<div id="three">
			<?php $render_messages(isset($messages['other']) ? $messages['other'] : null);?>
		</div>
	</div>
</div>
