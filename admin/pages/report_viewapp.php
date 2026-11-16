<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<?php if (isset($app)): ?>
		<div class="fn-specs-panel">
			<div class="fn-spec-row"><span class="k"><?php echo $label['date'];?></span><span class="v"><?php echo $app['date'];?></span></div>
			<div class="fn-spec-row"><span class="k"><?php echo $label['pname'];?></span><span class="v"><?php echo $app['user'];?></span></div>
			<div class="fn-spec-row"><span class="k"><?php echo $label['email'];?></span><span class="v"><?php echo $app['email'];?></span></div>
			<div class="fn-spec-row"><span class="k"><?php echo $label['cname'];?></span><span class="v"><?php echo $app['character'];?></span></div>
			<div class="fn-spec-row"><span class="k"><?php echo $label['position'];?></span><span class="v"><?php echo $app['position'];?></span></div>
			<div class="fn-spec-row"><span class="k"><?php echo $label['action'];?></span><span class="v"><?php echo $app['action'];?></span></div>
		</div>

		<div class="fn-specs-panel fn-rpt-body">
			<h4><?php echo $label['message'];?></h4>
			<?php echo text_output($app['message'] ?? '', '');?>
		</div>

		<?php if ($use_sample_post): ?>
			<div class="fn-specs-panel fn-rpt-body">
				<h4><?php echo $label['sample_post'];?></h4>
				<?php echo text_output($app['sample_post'] ?? '', '');?>
			</div>
		<?php endif;?>
	<?php else: ?>
		<div class="fn-rpt-empty"><?php echo $label['none'];?></div>
	<?php endif;?>
</div>
