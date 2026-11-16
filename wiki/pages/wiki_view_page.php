<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<?php if (isset($page)): ?>
	<div class="fn-section-head">
		<span class="glyph">&#9153;</span>
		<h3><?php echo $header;?></h3>
		<div class="fn-title-rule"></div>
		<span class="lbl">百科 · WIKI</span>
	</div>

	<?php if (Auth::is_logged_in()): ?>
		<div class="wiki-subnav">
			<div class="subnav-options"></div>
			<div class="subnav-content">
				<ul>
					<li>
						<a href="#" myAction="comment" rel="facebox" myID="<?php echo $id;?>" class="image">
							<span><?php echo $label['addcomment'];?></span>
						</a>
					</li>
					<?php if ($edit): ?>
						<li><?php echo anchor('wiki/page/'.$id.'/edit', '<span>'.$label['edit'].'</span>', array('class' => 'image edit'));?></li>
					<?php endif;?>
				</ul>
			</div>
		</div>
	<?php endif;?>

	<?php if (Auth::is_logged_in()): ?>
		<div id="tabs">
			<ul>
				<li><a href="#one"><span>Article</span></a></li>
				<?php if ($access): ?><li><a href="#two"><span><?php echo $label['history'];?></span></a></li><?php endif;?>
				<li><a href="#three"><span><?php echo $label['comments'];?></span></a></li>
			</ul>
	<?php endif;?>

			<div id="one">
				<p class="fn-wiki-created"><?php echo ucfirst($label['created']).' '.$label['by'].' '.$page['created'].' '.$label['on'].' '.$page['created_date'];?></p>
				<?php echo text_output($page['content'], 'div', 'prose', false);?>
				<div class="fn-wiki-created"><?php echo text_output($label['categories'], 'strong').' '.$page['categories'];?></div>
			</div>

	<?php if (Auth::is_logged_in()): ?>
		<?php if ($access): ?>
			<div id="two">
				<?php echo text_output($label['history'], 'h2', 'page-subhead');?>
				<?php if (isset($history)): ?>
					<table class="table100 zebra">
						<tbody>
						<?php foreach ($history as $h): ?>
							<tr>
								<td>
									<?php if ($h['old_id'] === false): ?>
										<?php echo $h['created'].' '.$label['created'].' '.anchor('wiki/view/draft/'.$h['draft'], text_output($h['title'], 'strong')).' '.$label['on'].' '.$h['created_date'];?>
									<?php else: ?>
										<?php echo $h['created'].' '.$label['reverted'].' '.$label['to'].' '.anchor('wiki/view/draft/'.$h['old_id'], text_output($h['title'], 'strong')).' '.$label['on'].' '.$h['created_date'];?>
									<?php endif;?>
									<?php if (! empty($h['changes'])): ?><br /><?php echo text_output($h['changes'], 'em', 'fontSmall gray');?><?php endif;?>
								</td>
								<td class="align_right"><?php echo anchor('wiki/view/draft/'.$h['draft'], $label['view'], array('class' => 'image'));?></td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				<?php else: ?>
					<p class="fn-card-excerpt"><?php echo $label['nohistory'];?></p>
				<?php endif;?>
			</div>
		<?php endif;?>

			<div id="three">
				<?php echo text_output($label['comments'], 'h2', 'page-subhead');?>
				<?php if (isset($comments)): ?>
					<div id="comments">
					<?php foreach ($comments as $c): ?>
						<div class="fn-comment">
							<div class="fn-comment-by"><?php echo ucfirst($label['by']).' '.$c['author'].' '.$label['on'].' '.$c['date'];?></div>
							<div class="fn-comment-body"><?php echo text_output($c['content'], '');?></div>
						</div>
					<?php endforeach;?>
					</div>
				<?php else: ?>
					<p class="fn-card-excerpt"><?php echo $label['nocomments'];?></p>
				<?php endif;?>
			</div>
		</div>
	<?php endif;?>
<?php else: ?>
	<div class="fn-section-head">
		<span class="glyph">&#9153;</span>
		<h3><?php echo $header;?></h3>
		<div class="fn-title-rule"></div>
		<span class="lbl">百科 · WIKI</span>
	</div>
	<p class="fn-card-excerpt"><?php echo $label['nopage'];?></p>
<?php endif;?>
