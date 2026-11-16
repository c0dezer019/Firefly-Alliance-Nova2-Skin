<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

$color_scales = array('Slate', 'Gray', 'Zinc', 'Neutral', 'Stone', 'Red', 'Orange', 'Amber', 'Yellow', 'Lime', 'Green', 'Emerald', 'Teal', 'Cyan', 'Sky', 'Blue', 'Indigo', 'Violet', 'Purple', 'Fuchsia', 'Pink', 'Rose');
?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2>Generate Customized Skin Colors</h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-admin-dash fn-set fn-site">
	<div class="fn-set-intro">
		<p>The new versions of Pulsar and Titan that ship with Nova 2.7 include the ability to change the overall color scheme with only a handful of lines of CSS. You can generate the CSS code needed to change the different colors for those skins by using the form below. <strong>Please note:</strong> this will only apply to the new versions of Pulsar and Titan.</p>
	</div>

	<div class="fn-site-colors">
		<div>
			<?php echo form_open('site/skincolors');?>
				<div class="fn-set-stack">
					<kbd class="fn-set-label">Color type to generate</kbd>
					<select name="color_type">
						<option value="primary">Primary</option>
						<option value="success">Success</option>
						<option value="warning">Warning</option>
						<option value="danger">Danger</option>
						<option value="info">Info</option>
					</select>
				</div>

				<div class="fn-set-stack">
					<kbd class="fn-set-label">What color would you like to use?</kbd>
					<select name="color_scale" id="color_scale">
						<option value="custom">Custom color</option>
						<?php foreach ($color_scales as $scale): ?>
							<option value="<?php echo $scale;?>"><?php echo $scale;?></option>
						<?php endforeach;?>
					</select>
				</div>

				<div class="fn-set-stack custom">
					<kbd class="fn-set-label">Custom color</kbd>
					<?php echo form_input($inputs['custom']);?>
				</div>

				<div class="fn-set-actions"><?php echo form_button($buttons['generate']);?></div>
			<?php echo form_close();?>
		</div>

		<div>
			<?php if (isset($generatedStyles)): ?>
				<pre class="fn-site-code">--<?php echo $generatedType;?>-100: <?php echo $generatedStyles[100];?>;
--<?php echo $generatedType;?>-200: <?php echo $generatedStyles[200];?>;
--<?php echo $generatedType;?>-300: <?php echo $generatedStyles[300];?>;
--<?php echo $generatedType;?>-400: <?php echo $generatedStyles[400];?>;
--<?php echo $generatedType;?>-500: <?php echo $generatedStyles[500];?>;
--<?php echo $generatedType;?>-600: <?php echo $generatedStyles[600];?>;
--<?php echo $generatedType;?>-700: <?php echo $generatedStyles[700];?>;
--<?php echo $generatedType;?>-800: <?php echo $generatedStyles[800];?>;
--<?php echo $generatedType;?>-900: <?php echo $generatedStyles[900];?>;</pre>

				<p class="fn-site-hint">Copy the code above and replace the <?php echo $generatedType;?> colors in the skin's <code>dist/colors.css</code> file. Once you have saved it and uploaded it back to your server, you should see your changes reflected in the skin.</p>

				<?php foreach ($generatedStyles as $code => $rgb): ?>
					<div class="fn-site-swatch">
						<span class="fn-site-swatch-code"><?php echo $code;?></span>
						<svg viewBox="0 0 100 10" preserveAspectRatio="none" aria-hidden="true"><rect width="100" height="10" fill="rgb(<?php echo $rgb;?>)"/></svg>
					</div>
				<?php endforeach;?>
			<?php endif; ?>
		</div>
	</div>
</div>
