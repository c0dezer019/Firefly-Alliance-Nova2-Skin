<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-modal-title"><?php echo $header;?></div>

<div class="fn-modal-text"><?php echo text_output($text);?></div>

<?php if (isset($list)): ?>
	<ul class="fn-modal-list">
	<?php foreach ($list as $l): ?>
		<li><strong><?php echo $l;?></strong></li>
	<?php endforeach;?>
	</ul>
<?php else: ?>
	<div class="fn-modal-empty"><?php echo $label['notfound'];?></div>
<?php endif;?>
