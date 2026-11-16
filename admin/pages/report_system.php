<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2><?php echo $header;?></h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash">
	<div class="fn-specs-panel">
		<div class="fn-specs-panel-title"><?php echo $label['systeminfo'];?></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['url'];?></span><span class="v"><?php echo base_url();?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['version_files'];?></span><span class="v"><?php echo $version['files'];?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['version_db'];?></span><span class="v"><?php echo $version['database'];?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['version_ci'];?></span><span class="v"><?php echo $version['ci'];?></span></div>
		<div class="fn-spec-row"><span class="k"><?php echo $label['version_php'];?></span><span class="v"><?php echo $version['php'];?></span></div>
	</div>

	<div class="fn-specs-panel fn-rpt-body">
		<div class="fn-specs-panel-title"><?php echo $label['versions'];?></div>
		<?php echo text_output($label['versions_redirect']);?>
	</div>

	<div class="fn-specs-panel fn-rpt-body">
		<div class="fn-specs-panel-title">Nova 3</div>

		<p>Nova 3 is coming in 2026. Below is some information about your site's readiness to be able to run Nova 3 as well as some basic information about migrating your site's data to Nova 3. More information will be available as Nova 3's release gets closer.</p>

		<h4>Requirements</h4>

		<p>Below is a report of Nova 3's requirements and how your server configuration stands against those requirements. If there's something that doesn't pass you should reach out to your web host to discuss the possibility of enabling the extension or updating the version of PHP your site is using.</p>

		<div class="fn-rpt-checks">
			<?php foreach ($nova3 as $check) { ?>
				<div class="fn-rpt-check">
					<span class="k"><?php echo $check['label'];?></span>
					<?php if ($check['result'] === true) { ?>
						<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fn-rpt-icon green"><g fill="currentColor"><path d="M20.25 12c0 4.55-3.7 8.25-8.25 8.25 -4.56 0-8.25-3.7-8.25-8.25 0-4.56 3.69-8.25 8.25-8.25 4.55 0 8.25 3.69 8.25 8.25Zm1.5 0c0-5.39-4.37-9.75-9.75-9.75 -5.39 0-9.75 4.36-9.75 9.75 0 5.38 4.36 9.75 9.75 9.75 5.38 0 9.75-4.37 9.75-9.75Z"/><path d="M7.91 12.86l2.16 2.16 .53-.54 .53-.54 -.02-.02 -.54.53 .53.53 4.88-4.89c.29-.3.29-.77 0-1.07 -.3-.3-.77-.3-1.07 0l-4.89 4.88c-.3.29-.3.76 0 1.06l.01.01c.7.7 1.76-.36 1.06-1.07l-2.17-2.17c-.3-.3-.77-.3-1.07 0 -.3.29-.3.76 0 1.06Z"/></g><path fill="none" d="M0 0h24v24H0Z"/></svg>
					<?php } else { ?>
						<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fn-rpt-icon red"><path fill="none" d="M0 0h24v24H0Z"/><g fill="currentColor"><path d="M14.29 8.63l-5.66 5.66c-.3.29-.3.76 0 1.06 .29.29.76.29 1.06 0l5.66-5.66c.29-.3.29-.77 0-1.07 -.3-.3-.77-.3-1.07 0Z"/><path d="M15.36 14.29L9.7 8.63c-.3-.3-.77-.3-1.07 0 -.3.29-.3.76 0 1.06l5.66 5.66c.29.29.76.29 1.06 0 .29-.3.29-.77 0-1.07Z"/><path d="M12 20.25c-4.56 0-8.25-3.7-8.25-8.25 0-4.56 3.69-8.25 8.25-8.25 4.55 0 8.25 3.69 8.25 8.25 0 4.55-3.7 8.25-8.25 8.25Zm0 1.5c5.38 0 9.75-4.37 9.75-9.75 0-5.39-4.37-9.75-9.75-9.75 -5.39 0-9.75 4.36-9.75 9.75 0 5.38 4.36 9.75 9.75 9.75Z"/></g></svg>
					<?php } ?>
				</div>
			<?php } ?>
		</div>

		<h4>Migrating your site</h4>

		<p>Like previous major upgrades to Nova, we'll be providing a migration script that will move as much of your data as possible to Nova 3. To see the migration guide as well as information about what will and will not be migrated, please visit the <a href="https://anodyne-productions.com/docs/3.0/migrating-from-nova2" target="_blank" class="fn-rpt-link">migration guide</a>.</p>
	</div>
</div>
