<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<?php
$this->load->helper('text');
$unread_count = 0;
$total_count = 0;

if (isset($inbox)) {
    foreach ($inbox as $item) {
        $total_count++;

        if ($item['unread']) {
            $unread_count++;
        }
    }
}
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-inbox">
	<div class="fn-inbox-sub">
		<a href="<?php echo site_url('messages/sent');?>" class="fn-inbox-sent"><?php echo $label['sent'];?></a>

		<?php echo form_open('messages/search', array('class' => 'fn-inbox-search'));?>
			<?php echo form_input($inputs['search']);?>
			<?php echo form_button($inputs['submit']);?>
		<?php echo form_close();?>
	</div>

	<div id="loading" class="fn-inbox-loading"><?php echo $label['loading'];?></div>

	<div id="loaded" class="hidden">
		<?php if ( ! isset($inbox)): ?>
			<div class="fn-inbox-panel">
				<div class="fn-inbox-empty"><?php echo $label['no_inbox'];?></div>
			</div>
		<?php else: ?>
			<?php echo form_open('messages/index');?>

				<?php echo $inbox_pagination;?>

				<div class="fn-inbox-panel">
					<div class="fn-inbox-toolbar">
						<label class="fn-inbox-selectall">
							<?php echo form_checkbox($inbox_check_all);?>
							<span><?php echo ucfirst(lang('actions_select'));?> all</span>
						</label>
						<div class="fn-inbox-sep"></div>
						<a href="#" id="mark_read" data-user="<?php echo $this->session->userdata('userid');?>" class="fn-inbox-btn"><?php echo $label['mark_read'];?></a>
						<?php echo form_button($button['inbox']);?>
						<div class="fn-inbox-spacer"></div>
						<span class="fn-inbox-count"><?php echo $unread_count.' '.lang('status_unread').' · '.$total_count.' '.lang('labels_total');?></span>
					</div>

					<div class="fn-inbox-cols">
						<span></span>
						<span><?php echo ucfirst(lang('labels_from'));?></span>
						<span><?php echo ucfirst(lang('labels_subject'));?></span>
						<span class="fn-inbox-col-date"><?php echo ucfirst(lang('labels_date'));?></span>
					</div>

					<?php foreach ($inbox as $item): ?>
						<div class="fn-inbox-row<?php echo $item['unread'] ? ' unread' : '';?>">
							<div class="fn-inbox-check"><?php echo form_checkbox($item['checkbox']);?></div>
							<span class="fn-inbox-from"><?php echo $item['author'];?></span>
							<span class="fn-inbox-subject">
								<?php echo anchor('messages/read/'.$item['id'], $item['subject'], array('class' => 'fn-inbox-link'));?>
								<span class="fn-inbox-snippet">&mdash; <?php echo character_limiter(strip_tags(str_replace('<br />', ' ', $item['preview'])), 60);?></span>
							</span>
							<span class="fn-inbox-date"><?php echo $item['date'];?></span>
						</div>
					<?php endforeach;?>
				</div>

				<?php echo $inbox_pagination;?>
			<?php echo form_close();?>
		<?php endif;?>

		<div class="fn-inbox-foot">
			<?php echo anchor('messages/write', $label['write'], array('class' => 'fn-inbox-write'));?>
		</div>
	</div>
</div>
