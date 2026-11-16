<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-panel-title fn-admin-title">
	<div class="fn-accent-bar"></div>
	<h2>Submit Feedback to Anodyne</h2>
	<div class="fn-title-rule"></div>
</div>

<div class="fn-form-panel fn-feedback">
	<form>
		<div class="fn-form-fields">
			<div class="fn-feedback-types">
				<label class="fn-feedback-opt"><input type="radio" name="feedbackType" value="issue"> I think I found an issue with the Nova software</label>
				<label class="fn-feedback-opt"><input type="radio" name="feedbackType" value="new-feature"> I've got a great idea for a brand new feature in Nova</label>
				<label class="fn-feedback-opt"><input type="radio" name="feedbackType" value="feature-enhancement"> I've got a really cool idea how to make an existing feature better</label>
			</div>

			<div class="fn-field">
				<kbd>Describe</kbd>
				<textarea name="feedbackContent" rows="10"></textarea>
			</div>
		</div>
	</form>
</div>
