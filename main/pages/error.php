<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3 class="fn-err-title"><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">错误 · ERROR</span>
</div>

<div class="fn-flash fn-flash-error"><?php echo text_output($msg_error, '');?></div>
