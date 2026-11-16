<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require dirname(dirname(dirname(__FILE__))).'/_global/config.php';
?>

<div class="fn-panel-title fn-admin-title fn-has-kicker">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
	<span class="fn-title-cjk"><?php echo $skin_msg_write_kicker;?></span>
</div>

<div class="fn-write">
	<div class="fn-msg-back">
		<?php echo anchor('messages/index', $label['inbox'], array('class' => 'fn-inbox-btn'));?>
	</div>

	<div class="fn-write-panel">
		<?php echo form_open('messages/write');?>

			<div class="fn-write-grid">
				<div class="fn-write-field fn-write-full fn-write-picker">
					<kbd><?php echo $label['to'];?></kbd>
					<span id="chosen-incompat" class="gray fontSmall bold hidden"><?php echo $label['chosen_incompat'];?></span>
					<?php echo form_multiselect('recipients[]', $characters, $recipient_list, 'id="recip" class="chosen" title="'.$label['select'].'"');?>
				</div>

				<div class="fn-write-field fn-write-full fn-write-title">
					<kbd><?php echo $label['subject'];?></kbd>
					<?php echo form_input($inputs['subject']);?>
				</div>

				<div class="fn-write-field fn-write-full">
					<kbd><?php echo $label['message'];?></kbd>
					<?php echo form_textarea($inputs['message']);?>
				</div>
			</div>

			<div class="fn-write-actions">
				<?php echo form_button($inputs['submit']);?>
				<?php echo anchor('messages/index', $label['inbox'], array('class' => 'fn-write-back'));?>
			</div>

		<?php echo form_close();?>
	</div>

	<?php if (isset($previous)): ?>
		<div id="comments" class="fn-write-quote">
			<div class="fn-write-quote-head"><?php echo $label['on'].' '.$previous['date'].' '.$previous['from'].' '.$label['wrote'];?></div>
			<div class="fn-write-quote-body"><?php echo text_output($previous['content'], '');?></div>
		</div>
	<?php endif; ?>
</div>
