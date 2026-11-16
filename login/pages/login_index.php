<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>

<div class="fn-login-sublabel"><?php echo $header;?></div>

<?php echo form_open('login/check_login');?>

	<div class="fn-login-field">
		<label for="email"><?php echo $label['email'];?></label>
		<?php echo form_input(array_merge($inputs['email'], ['placeholder' => 'officer@ship'])); ?>
	</div>

	<div class="fn-login-field">
		<label for="password"><?php echo $label['password'];?></label>
		<?php echo form_password(array_merge($inputs['password'], ['placeholder' => '••••••••••••'])); ?>
	</div>

	<div class="fn-login-row">
		<label class="fn-login-remember">
			<?php echo form_checkbox($inputs['remember_me']); ?>
			<span class="lbl"><?php echo $label['remember'];?></span>
		</label>
		<a class="fn-login-reset" href="<?php echo site_url('login/resetpassword');?>">Reset Password</a>
	</div>

	<div class="fn-login-divider"></div>

	<button type="submit" name="submit" value="login" class="fn-login-submit">
		<svg viewBox="0 0 16 16" width="13" height="13" style="opacity:.7;flex-shrink:0;">
			<rect x="1" y="6" width="14" height="10" rx="1" fill="none" stroke="#c8ddf0" stroke-width="1.2"></rect>
			<path d="M4 6V4a4 4 0 0 1 8 0v2" fill="none" stroke="#c8ddf0" stroke-width="1.2"></path>
			<circle cx="8" cy="11" r="1.5" fill="#c8ddf0"></circle>
		</svg>
		<?php echo lang('actions_login') ? ucwords(lang('actions_login')) : 'Log In';?>
	</button>

<?php echo form_close();?>

<div class="fn-login-back"><a href="<?php echo site_url();?>">&laquo; Back to Site</a></div>
