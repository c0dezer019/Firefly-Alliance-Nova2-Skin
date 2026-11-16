<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="fn-inbox">
	<?php if (isset($msg)): ?>
		<div class="fn-panel-title fn-admin-title">
			<div class="fn-accent-bar"></div>
			<?php echo $header;?>
			<div class="fn-title-rule"></div>
		</div>

		<div class="fn-inbox-panel">
			<div class="fn-inbox-empty"><?php echo $msg;?></div>
		</div>

		<div class="fn-inbox-foot">
			<?php echo anchor('messages/index', $label['inbox'], array('class' => 'fn-inbox-btn'));?>
		</div>
	<?php else: ?>
		<div class="fn-msg-back">
			<?php echo anchor('messages/index', $label['inbox'], array('class' => 'fn-inbox-btn'));?>
		</div>

		<article class="fn-msg-read">
			<?php echo $header;?>

			<div class="fn-msg-meta">
				<span><?php echo ucfirst(lang('labels_from'));?> <strong><?php echo $author;?></strong></span>
				<span><?php echo ucfirst(lang('labels_to'));?> <strong><?php echo $to;?></strong></span>
				<span><?php echo $label['sent'];?> <strong><?php echo $date;?></strong></span>
			</div>

			<div class="fn-msg-rule"></div>

			<div class="fn-msg-body"><?php echo text_output($content);?></div>

			<div class="fn-msg-actions">
				<?php echo anchor('messages/write/reply/'. $id, $label['reply'], array('class' => 'fn-inbox-write'));?>

				<?php if ($to_count > 1): ?>
					<?php echo anchor('messages/write/replyall/'. $id, $label['replyall'], array('class' => 'fn-inbox-btn'));?>
				<?php endif;?>

				<?php echo anchor('messages/write/forward/'. $id, $label['forward'], array('class' => 'fn-inbox-btn'));?>
			</div>
		</article>
	<?php endif;?>
</div>
