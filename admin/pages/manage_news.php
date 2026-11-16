<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['activated'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['saved'];?></span></a></li>

			<?php if (Auth::get_access_level('manage/news') == 2): ?>
				<li><a href="#three"><span><?php echo $label['pending'];?></span></a></li>
			<?php endif;?>
		</ul>

		<div id="one">
			<?php echo $activated;?>
		</div>

		<div id="two">
			<?php echo $saved;?>
		</div>

		<?php if (Auth::get_access_level('manage/news') == 2): ?>
			<div id="three">
				<?php echo $pending;?>
			</div>
		<?php endif;?>
	</div>
</div>
