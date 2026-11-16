<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">百科 · WIKI</span>
</div>

<div class="wiki-subnav">
	<div class="subnav-content">
		<ul>
			<li><?php echo anchor('wiki/recent/updates', $label['updates']);?></li>
			<li><?php echo anchor('wiki/recent/created', $label['created']);?></li>
		</ul>
	</div>
</div>

<?php if (isset($recent['updates'])): ?>
	<div class="fn-per-subhead"><?php echo $label['updates'];?></div>
	<table class="table100 zebra">
		<thead><tr><th><?php echo $label['page'];?></th><th></th><th><?php echo $label['update_summary'];?></th></tr></thead>
		<tbody>
		<?php foreach ($recent['updates'] as $r): ?>
			<tr>
				<td>
					<?php if ($r['type'] == 'system'): ?><span class="label-system"><?php echo $label['system'];?></span><?php endif;?>
					<strong><?php echo ($r['type'] == 'system') ? $r['title'] : anchor('wiki/view/page/'.$r['id'], $r['title']);?></strong><br />
					<span class="fontSmall gray"><?php echo $label['by'].' '.$r['author'].' '.$r['timespan'];?></span>
				</td>
				<td></td>
				<td class="gray fontSmall"><?php if (! empty($r['comments'])): ?><em><?php echo text_output($r['comments'], '');?></em><?php endif;?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
<?php endif;?>

<?php if (isset($recent['created'])): ?>
	<div class="fn-per-subhead"><?php echo $label['created'];?></div>
	<table class="table100 zebra">
		<thead><tr><th><?php echo $label['page'];?></th><th></th><th><?php echo $label['summary'];?></th></tr></thead>
		<tbody>
		<?php foreach ($recent['created'] as $r): ?>
			<tr>
				<td>
					<?php if ($r['type'] == 'system'): ?><span class="label-system"><?php echo $label['system'];?></span><?php endif;?>
					<strong><?php echo ($r['type'] == 'system') ? $r['title'] : anchor('wiki/view/page/'.$r['id'], $r['title']);?></strong>
					<?php if ($r['type'] == 'standard'): ?><br /><span class="fontSmall gray"><?php echo $label['by'].' '.$r['author'].' '.$r['timespan'].' '.$label['ago'];?></span><?php endif;?>
				</td>
				<td></td>
				<td class="gray fontSmall"><?php if (! empty($r['summary'])): ?><em><?php echo text_output($r['summary'], '');?></em><?php endif;?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
<?php endif;?>
