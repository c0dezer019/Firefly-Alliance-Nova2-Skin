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
    'href' => APPFOLDER.'/views/'.$current_skin.'/dist/css/wiki.css',
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

$this->load->helper('panel');

$panel = [
    'inbox' => ['src' => APPFOLDER.'/views/'.$current_skin.'/dist/images/panel-inbox.svg'],
    'writing' => ['src' => APPFOLDER.'/views/'.$current_skin.'/dist/images/panel-writing.svg'],
    'dashboard' => ['src' => APPFOLDER.'/views/'.$current_skin.'/dist/images/panel-dashboard.svg'],
];

$shipHeaderWebp = APPFOLDER.'/views/'.$current_skin.'/dist/images/ship-header.webp';
$shipHeaderJpg = APPFOLDER.'/views/'.$current_skin.'/dist/images/ship-header.jpg';
$shipHeaderPng = APPFOLDER.'/views/'.$current_skin.'/dist/images/ship-header.png';

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

		<?php include_once MODFOLDER.'/assets/include_head_main_next.php';?>

		<?php echo $javascript;?>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#userpanel').click(function(){
					$('.panel-wrapper').toggleClass('hidden');
					return false;
				});

				$('.panel-close').click(function(){
					$('.panel-wrapper').toggleClass('hidden');
					return false;
				});
			});

			$(document).keyup(function (e) {
				if (e.keyCode == 27) {
					$('.panel-wrapper').addClass('hidden');
				}
			});
		</script>
	</head>
	<body>
		<noscript>
			<div class="system_warning"><?php echo lang_output('text_javascript_off', '');?></div>
		</noscript>

		<?php if (Auth::is_logged_in()): ?>
			<div class="panel-wrapper hidden">
				<div class="panel-overlay"></div>

				<div id="panel">
					<div class="panel-body">
						<button type="button" class="panel-close">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
						</button>

						<ul>
							<li><?php echo $panel_1;?></li>
							<li><?php echo $panel_2;?></li>
							<li><?php echo $panel_3;?></li>
						</ul>
					</div>
				</div>
			</div>
		<?php endif;?>

		<header>
			<div class="fn-header-depth"></div>
			<div class="fn-space-bg"></div>
			<div class="fn-header-grid"></div>

			<?php if (file_exists($shipHeaderWebp) || file_exists($shipHeaderJpg) || file_exists($shipHeaderPng)): ?>
				<?php $shipSrc = file_exists($shipHeaderWebp) ? $shipHeaderWebp : (file_exists($shipHeaderJpg) ? $shipHeaderJpg : $shipHeaderPng); ?>
				<div class="fn-header-ship"><img src="<?php echo base_url($shipSrc);?>" alt=""></div>
			<?php endif;?>

			<svg class="fn-reticle" viewBox="0 0 100 100" width="100" height="100">
				<circle class="fn-reticle-spin" cx="50" cy="50" r="46" fill="none" stroke="#3a62c8" stroke-width=".7" stroke-dasharray="5 4"></circle>
				<circle cx="50" cy="50" r="34" fill="none" stroke="#2850a8" stroke-width=".6"></circle>
				<circle cx="50" cy="50" r="18" fill="none" stroke="#1e3c88" stroke-width=".6"></circle>
				<line x1="50" y1="4" x2="50" y2="28" stroke="#3060b8" stroke-width=".8"></line>
				<line x1="50" y1="72" x2="50" y2="96" stroke="#3060b8" stroke-width=".8"></line>
				<line x1="4" y1="50" x2="28" y2="50" stroke="#3060b8" stroke-width=".8"></line>
				<line x1="72" y1="50" x2="96" y2="50" stroke="#3060b8" stroke-width=".8"></line>
				<line x1="17" y1="17" x2="26" y2="26" stroke="#2040a0" stroke-width=".6"></line>
				<line x1="83" y1="17" x2="74" y2="26" stroke="#2040a0" stroke-width=".6"></line>
				<line x1="17" y1="83" x2="26" y2="74" stroke="#2040a0" stroke-width=".6"></line>
				<line x1="83" y1="83" x2="74" y2="74" stroke="#2040a0" stroke-width=".6"></line>
				<circle cx="50" cy="50" r="2.5" fill="#3a62c8"></circle>
			</svg>

			<div class="fn-readout">
				<?php foreach ($skin_readout as $line): ?><div><?php echo $line;?></div><?php endforeach;?>
			</div>
			<div class="fn-header-dot"></div>

			<div class="fn-corner fn-corner-tr"></div>
			<div class="fn-corner fn-corner-br"></div>
			<div class="fn-corner fn-corner-bl"></div>

			<div class="fn-brand">
				<?php if ($skin_registry_left !== '' || $skin_registry_right !== ''): ?>
					<div class="fn-brand-registry">
						<?php if ($skin_registry_left !== ''): ?><span class="lbl"><?php echo $skin_registry_left;?></span><?php endif;?>
						<?php if ($skin_registry_left !== '' && $skin_registry_right !== ''): ?><div class="rule"></div><?php endif;?>
						<?php if ($skin_registry_right !== ''): ?><span class="code"><?php echo $skin_registry_right;?></span><?php endif;?>
					</div>
				<?php endif;?>
				<h1 class="flicker-heading"><?php echo $this->options['sim_name'];?></h1>
				<?php if ($skin_subtitle !== ''): ?><div class="subtitle-cjk"><?php echo $skin_subtitle;?></div><?php endif;?>
				<?php if ($skin_tagline !== ''): ?>
					<div class="fn-brand-tagline">
						<div class="rule"></div>
						<span><?php echo $skin_tagline;?></span>
					</div>
				<?php endif;?>
			</div>

			<div class="fn-header-baseline"><div class="a"></div><div class="b"></div></div>
		</header>

		<nav class="nav-main">
			<div class="wrapper fn-nav-bar">
				<ul>
					<?php echo $nav_main;?>
				</ul>

				<div class="signin-container">
					<?php if (Auth::is_logged_in()): ?>
						<div class="logged-in-controls">
							<span>
								<?php echo panel_inbox(true, true, false, '(x)');?>
							</span>
							<span>
								<?php echo panel_writing(true, true, false, '(x)');?>
							</span>
							<span>
								<?php echo panel_dashboard(true);?>
							</span>
						</div>

						<a href="<?php echo site_url('login/logout');?>" class="signin"><?php echo ucfirst(lang('actions_logout'));?></a>
					<?php else: ?>
						<a href="<?php echo site_url('login');?>" class="signin"><?php echo ucfirst(lang('actions_login'));?></a>
					<?php endif;?>
				</div>
			</div>
		</nav>

		<div class="status-strip">
			<div class="wrapper">
				<?php foreach ($skin_status_items as $i => $item): ?>
					<?php if ($i > 0): ?><div class="fn-status-sep"></div><?php endif;?>
					<div class="fn-status-item<?php echo $i === 0 ? ' lead' : '';?>">
						<?php if ($i === 0): ?><span class="iff-dot"></span><?php endif;?>
						<span><?php echo $item;?></span>
					</div>
				<?php endforeach;?>
			</div>
		</div>

		<div class="wrapper">
			<main>
				<div class="content">
					<?php echo $flash_message;?>
					<div class="wiki-article">
						<?php echo $content;?>
					</div>
					<?php echo $ajax;?>

					<div class="clear_both"></div>
				</div>

				<nav class="nav-sub">
					<?php echo $nav_sub;?>
				</nav>
			</main>

			<footer>
				<span>
					Powered by <strong><?php echo APP_NAME;?></strong> from <a href="https://anodyne-productions.com" target="_blank">Anodyne</a>
				</span>
				<span><?php echo anchor('main/credits', 'Site Credits');?></span>
				<span><?php echo anchor('main/policies', 'Privacy Policy'); ?></span>
			</footer>
		</div>
	</body>
</html>
