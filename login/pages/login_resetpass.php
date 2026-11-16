<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-login-sublabel"><?php echo $header;?></div>

<p class="fn-login-note"><?php echo $message;?></p>

<?php echo form_open('login/reset_password');?>

	<div class="fn-login-field">
		<label for="email"><?php echo $label['email'];?></label>
		<?php echo form_input($inputs['email']);?>
	</div>

	<div class="fn-login-field">
		<label for="question"><?php echo $label['question'];?></label>
		<?php echo form_dropdown('question', $questions);?>
	</div>

	<div class="fn-login-field">
		<label for="answer"><?php echo $label['answer'];?></label>
		<?php echo form_input($inputs['answer']);?>
	</div>

	<div class="fn-login-divider"></div>

	<?php echo form_button($button_submit);?>

<?php echo form_close();?>

<div class="fn-login-back"><a href="<?php echo site_url('login');?>">&laquo; Back to Log In</a></div>
