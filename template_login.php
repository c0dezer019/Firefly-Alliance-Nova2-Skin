<?php

$path = explode('/', dirname(__FILE__));

if (count($path) <= 1) {
    $path = explode('\\', dirname(__FILE__));
}

$pcount = count($path);
$skin_loc = $pcount - 1;
$current_skin = $path[$skin_loc];

require dirname(__FILE__).'/_global/config.php';

$stylesheet = [
    'href' => APPFOLDER.'/views/'.$current_skin.'/dist/css/login.css',
    'rel' => 'stylesheet',
    'type' => 'text/css',
    'media' => 'screen',
    'charset' => 'utf-8'
];

$utilities = [
    'href' => MODFOLDER.'/tailwind/utilities.css',
    'rel' => 'stylesheet',
    'type' => 'text/css',
    'media' => 'screen',
    'charset' => 'utf-8'
];

$colors = [
    'href' => APPFOLDER.'/views/'.$current_skin.'/dist/css/colors.css',
    'rel' => 'stylesheet',
    'type' => 'text/css',
    'media' => 'screen',
    'charset' => 'utf-8'
];

?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title;?></title>

		<meta name="description" content="<?php echo $this->config->item('meta_desc');?>" />
		<meta name="keywords" content="<?php echo $this->config->item('meta_keywords');?>" />
		<meta name="author" content="<?php echo $this->config->item('meta_author');?>" />

		<?php echo $_redirect;?>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Special+Elite&family=EB+Garamond:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

		<?php echo link_tag($stylesheet);?>
		<?php echo link_tag($utilities);?>
		<?php echo link_tag($colors);?>

		<?php include_once MODFOLDER.'/assets/include_head_login_next.php';?>

		<?php echo $javascript;?>

	</head>
	<body>
		<noscript>
			<div class="system_warning"><?php echo lang_output('text_javascript_off', '');?></div>
		</noscript>

		<div class="fn-login-wrap">
			<div class="fn-space-bg fn-space-bg-fixed"></div>
			<div class="fn-login-gridlines"></div>

			<div class="fn-login-topbar">
				<div class="inner">
					<div class="left">
						<span class="fn-login-dot"></span>
						<span class="txt"><?php echo $skin_status_items[0];?><?php echo isset($skin_status_items[1]) ? ' · '.$skin_status_items[1] : '';?></span>
					</div>
					<span class="txt code"><?php echo $skin_registry_right;?> · <?php echo $skin_subtitle;?></span>
				</div>
			</div>

			<div class="fn-login-main">
				<div class="fn-login-brand">
					<div class="reticle">
						<svg viewBox="0 0 80 80" width="60" height="60">
							<circle class="fn-reticle-spin" cx="40" cy="40" r="36" fill="none" stroke="#3a62c8" stroke-width=".8" stroke-dasharray="5 4"></circle>
							<circle cx="40" cy="40" r="26" fill="none" stroke="#2850a8" stroke-width=".6"></circle>
							<circle cx="40" cy="40" r="13" fill="none" stroke="#1e3c88" stroke-width=".6"></circle>
							<line x1="40" y1="4" x2="40" y2="20" stroke="#3060b8" stroke-width=".8"></line>
							<line x1="40" y1="60" x2="40" y2="76" stroke="#3060b8" stroke-width=".8"></line>
							<line x1="4" y1="40" x2="20" y2="40" stroke="#3060b8" stroke-width=".8"></line>
							<line x1="60" y1="40" x2="76" y2="40" stroke="#3060b8" stroke-width=".8"></line>
							<circle cx="40" cy="40" r="2" fill="#3a62c8"></circle>
						</svg>
					</div>
					<h1><?php echo $this->options['sim_name'];?></h1>
					<div class="subtitle"><?php echo $skin_subtitle;?></div>
					<div class="tagline"><?php echo $skin_tagline;?></div>
				</div>

				<div class="fn-login-card">
					<div class="fn-login-cardhead">
						<div class="bar"></div>
						<span class="title">Cortex Access Terminal</span>
						<div class="rule"></div>
						<div class="dot"></div>
					</div>

					<div class="fn-login-body">
						<?php echo $flash_message;?>
						<?php echo $content;?>
					</div>
				</div>

				<div class="fn-login-foot"><?php echo $skin_footer_cjk;?></div>
			</div>
		</div>
	</body>
</html>
