<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// Skin branding flavor (watermark etc.) — page views render in their own
// scope, so pull the shared defaults in directly.
require dirname(dirname(dirname(__FILE__))).'/_global/config.php';

// Row markup shared between top-level department positions and sub-department
// positions — factored here instead of duplicated per loop level.
if (! function_exists('fn_personnel_crew_row')) {
    function fn_personnel_crew_row($char, $pos_name, $label)
    {
        ?>
        <div class="fn-crew-row <?php echo $char['crew_type'];?>">
            <div class="fn-crew-rank"><?php echo img($char['rank_img']);?></div>
            <div class="fn-crew-main">
                <?php echo anchor('personnel/character/'.$char['char_id'], $char['name'], array('class' => 'fn-crew-name'));?>
                <div class="fn-crew-position">
                    <?php echo $pos_name;?>
                    <?php if (! empty($char['metadata'])): ?>
                        <span class="fn-crew-meta"><?php echo $char['metadata'];?></span>
                    <?php endif;?>
                </div>
            </div>
            <?php if ($char['crew_type'] == 'npc'): ?>
                <span class="fn-crew-badge npc"><?php echo $label['npc'];?></span>
            <?php elseif ($char['crew_type'] == 'inactive'): ?>
                <span class="fn-crew-badge inactive"><?php echo $label['inactive'];?></span>
            <?php endif;?>
            <?php echo anchor('personnel/character/'.$char['char_id'], img($char['combadge']), array('class' => 'fn-crew-combadge'));?>
        </div>
        <?php
    }
}

if (! function_exists('fn_personnel_open_row')) {
    function fn_personnel_open_row($pos, $dept_type, $label)
    {
        if ($pos['open'] <= 0 || $dept_type != 'playing') {
            return;
        }
        ?>
        <div class="fn-crew-row fn-open-row open">
            <div class="fn-crew-rank fn-crew-rank-open"><?php echo img($pos['blank_img']);?></div>
            <div class="fn-crew-main">
                <span class="fn-crew-position-open"><?php echo $label['open'];?></span>
                <div class="fn-crew-position"><?php echo $pos['name'];?></div>
            </div>
            <?php echo anchor('main/join/'.$pos['pos_id'], $label['apply'], array('class' => 'fn-apply-link'));?>
        </div>
        <?php
    }
}
?>

<section class="fn-welcome-panel">
	<div class="fn-watermark"><?php echo $skin_watermark;?></div>

	<div class="fn-panel-title">
		<div class="fn-accent-bar"></div>
		<h2><?php echo $header;?></h2>
		<div class="fn-title-rule"></div>
		<span class="fn-title-cjk"><?php echo $skin_subtitle;?></span>
	</div>

	<div id="loader" class="fn-loader">
		<?php echo img($loader);?>
		<?php echo text_output($label['loading'], 'h3', 'gray');?>
	</div>

	<div id="manifest" class="hidden manifest_table">

		<?php if (isset($manifests)): ?>
			<div class="fn-manifest-tabs">
				<?php foreach ($manifests as $m): ?>
					<?php echo anchor('personnel/index/'.$m['id'], $m['name'], array('class' => 'fn-manifest-tab', 'rel' => 'tooltip', 'title' => $m['desc']));?>
				<?php endforeach;?>
			</div>
		<?php endif;?>

		<?php if (! empty($manifest_header)): ?>
			<div class="fn-manifest-intro"><?php echo $manifest_header;?></div>
		<?php endif;?>

		<div class="fn-filter-bar">
			<span class="fn-filter-label"><?php echo $label['show'];?></span>
			<?php echo anchor('#', $label['all_chars'], array('id' => 'all', 'class' => 'fn-filter-pill'));?>
			<?php echo anchor('#', $label['playing_chars'], array('id' => 'active', 'class' => 'fn-filter-pill'));?>
			<?php echo anchor('#', $label['npcs'], array('id' => 'npc', 'class' => 'fn-filter-pill'));?>
			<?php echo anchor('#', $label['open'], array('id' => 'open', 'class' => 'fn-filter-pill open'));?>
			<?php echo anchor('#', $label['inactive_chars'], array('id' => 'inactive', 'class' => 'fn-filter-pill'));?>

			<span class="fn-filter-toggle">
				<span class="fn-filter-toggle-label"><?php echo $label['toggle'];?></span>
				<?php if ($display != 'open'): ?>
					<?php echo anchor('#', $label['open'], array('id' => 'toggle_open', 'class' => 'fn-filter-toggle-link'));?>
				<?php endif;?>
				<?php echo anchor('#', $label['npcs'], array('id' => 'toggle_npc', 'class' => 'fn-filter-toggle-link'));?>
			</span>
		</div>

		<?php if (isset($top)): ?>
			<div id="top-open" class="hidden fn-dept-block">
				<h3 class="page-subhead"><?php echo $label['top_positions'];?></h3>
				<?php foreach ($top as $t): ?>
					<div class="fn-crew-row fn-open-row open">
						<div class="fn-crew-rank fn-crew-rank-open"><?php echo img($t['blank_img']);?></div>
						<div class="fn-crew-main">
							<span class="fn-crew-position-open"><?php echo $t['name'];?></span>
						</div>
						<?php echo anchor('main/join/'.$t['id'], $label['apply'], array('class' => 'fn-apply-link'));?>
					</div>
				<?php endforeach;?>
			</div>
		<?php endif;?>

		<?php if (isset($depts)): ?>
			<?php foreach ($depts as $dept): ?>
				<div class="fn-dept-block">
					<div class="fn-dept-header"><span><?php echo $dept['name'];?></span></div>

					<?php if (isset($dept['pos'])): ?>
						<?php foreach ($dept['pos'] as $pos): ?>
							<?php if (isset($pos['chars'])): ?>
								<?php foreach ($pos['chars'] as $char): ?>
									<?php fn_personnel_crew_row($char, $pos['name'], $label);?>
								<?php endforeach;?>
							<?php endif;?>
							<?php fn_personnel_open_row($pos, $dept['type'], $label);?>
						<?php endforeach;?>
					<?php endif;?>

					<?php if (isset($dept['sub'])): ?>
						<?php foreach ($dept['sub'] as $sub): ?>
							<div class="fn-subdept-header"><span><?php echo $sub['name'];?></span></div>

							<?php if (isset($sub['pos'])): ?>
								<?php foreach ($sub['pos'] as $spos): ?>
									<?php if (isset($spos['chars'])): ?>
										<?php foreach ($spos['chars'] as $char): ?>
											<?php fn_personnel_crew_row($char, $spos['name'], $label);?>
										<?php endforeach;?>
									<?php endif;?>
									<?php fn_personnel_open_row($spos, $sub['type'], $label);?>
								<?php endforeach;?>
							<?php endif;?>
						<?php endforeach;?>
					<?php endif;?>
				</div>
			<?php endforeach;?>
		<?php endif;?>

	</div>
</section>
