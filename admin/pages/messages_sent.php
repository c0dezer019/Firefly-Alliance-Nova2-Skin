<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<?php
$this->load->helper('text');
$total_count = isset($outbox) ? count($outbox) : 0;
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-inbox fn-sent">
	<div class="fn-inbox-sub">
		<a href="<?php echo site_url('messages/index');?>" class="fn-inbox-sent"><?php echo $label['inbox'];?></a>

		<?php echo form_open('messages/search', array('class' => 'fn-inbox-search'));?>
			<?php echo form_input($inputs['search']);?>
			<?php echo form_button($inputs['submit']);?>
		<?php echo form_close();?>
	</div>

	<div id="loading" class="fn-inbox-loading"><?php echo $label['loading'];?></div>

	<div id="loaded" class="hidden">
		<?php if ( ! isset($outbox)): ?>
			<div class="fn-inbox-panel">
				<div class="fn-inbox-empty"><?php echo $label['no_outbox'];?></div>
			</div>
		<?php else: ?>
			<?php echo form_open('messages/sent');?>

				<?php echo $outbox_pagination;?>

				<div class="fn-inbox-panel">
					<div class="fn-inbox-toolbar">
						<label class="fn-inbox-selectall">
							<?php echo form_checkbox($outbox_check_all);?>
							<span><?php echo ucfirst(lang('actions_select'));?> all</span>
						</label>
						<div class="fn-inbox-sep"></div>
						<?php echo form_button($button['outbox']);?>
						<div class="fn-inbox-spacer"></div>
						<span class="fn-inbox-count"><?php echo $total_count.' '.lang('actions_sent');?></span>
					</div>

					<div class="fn-inbox-cols">
						<span></span>
						<span><?php echo ucfirst(lang('labels_to'));?></span>
						<span><?php echo ucfirst(lang('labels_subject'));?></span>
						<span class="fn-inbox-col-date"><?php echo ucfirst(lang('actions_sent'));?></span>
					</div>

					<?php foreach ($outbox as $item): ?>
						<div class="fn-inbox-row">
							<div class="fn-inbox-check"><?php echo form_checkbox($item['checkbox']);?></div>
							<span class="fn-inbox-from"><?php echo $item['recipients'];?></span>
							<span class="fn-inbox-subject">
								<?php echo anchor('messages/read/'.$item['id'], $item['subject'], array('class' => 'fn-inbox-link'));?>
								<span class="fn-inbox-snippet">&mdash; <?php echo character_limiter(strip_tags(str_replace('<br />', ' ', $item['preview'])), 60);?></span>
							</span>
							<span class="fn-inbox-date"><?php echo $item['date'];?></span>
						</div>
					<?php endforeach;?>
				</div>

				<?php echo $outbox_pagination;?>
			<?php echo form_close();?>
		<?php endif;?>

		<div class="fn-inbox-foot">
			<?php echo anchor('messages/write', $label['write'], array('class' => 'fn-inbox-write'));?>
		</div>
	</div>
</div>
