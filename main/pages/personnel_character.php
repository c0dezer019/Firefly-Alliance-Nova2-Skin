<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">档案 · PERSONNEL</span>
</div>

<?php if (isset($character)): ?>
	<div class="fn-char-grid">
		<aside class="fn-char-aside">
			<?php if (isset($character['image']['src'])): ?>
				<div class="fn-char-avatar" id="gallery">
					<a href="<?php echo $character['image']['src'];?>" class="image" rel="prettyPhoto[gallery]"><?php echo img($character['image']);?></a>
					<div class="hidden">
						<?php if (count($character['image_array']) > 0): ?>
							<?php foreach ($character['image_array'] as $image): ?>
								<a href="<?php echo $image['src'];?>" class="image" rel="prettyPhoto[gallery]"><?php echo img($image);?></a>
							<?php endforeach;?>
						<?php endif;?>
					</div>
				</div>
			<?php else: ?>
				<div class="fn-char-avatar"><?php echo img($character['noavatar']);?></div>
			<?php endif;?>

			<ul class="fn-char-links">
				<?php if ($postcount > 0): ?><li><?php echo anchor('personnel/viewposts/c/'.$character['id'], $label['view_all_posts']);?></li><?php endif;?>
				<?php if ($logcount > 0): ?><li><?php echo anchor('personnel/viewlogs/c/'.$character['id'], $label['view_all_logs']);?></li><?php endif;?>
				<?php if ($awardcount > 0): ?><li><?php echo anchor('personnel/viewawards/c/'.$character['id'], $label['view_all_awards']);?></li><?php endif;?>
				<?php if (Auth::is_logged_in() and $character['user'] !== null): ?><li><?php echo anchor('personnel/user/'.$character['user'], $label['view_user']);?></li><?php endif;?>
				<?php if ($edit_valid): ?><li><?php echo anchor('characters/bio/'.$character['id'], $label['edit']);?></li><?php endif;?>
			</ul>

			<?php if ($postcount > 0 or $logcount > 0 or $newscount > 0): ?>
				<div class="fn-char-substat"><?php echo $label['stats'];?></div>
				<ul class="fn-char-statlist">
					<?php if ($postcount > 0): ?><li><strong><?php echo $postcount;?></strong> <?php echo $label['mission_posts'];?></li><?php endif;?>
					<?php if ($logcount > 0): ?><li><strong><?php echo $logcount;?></strong> <?php echo $label['personal_logs'];?></li><?php endif;?>
					<?php if ($newscount > 0): ?><li><strong><?php echo $newscount;?></strong> <?php echo $label['news_items'];?></li><?php endif;?>
				</ul>
			<?php endif;?>

			<?php if ($last_post !== false): ?>
				<div class="fn-char-substat"><?php echo $label['last_post'];?></div>
				<p class="fn-char-lastpost"><?php echo $last_post;?></p>
			<?php endif;?>
		</aside>

		<div class="fn-char-main">
			<?php if (isset($msg_error)): ?><p class="fn-card-excerpt"><?php echo $msg_error;?></p><?php endif;?>

			<?php if (isset($character_info)): ?>
				<div class="fn-kv-list">
					<?php foreach ($character_info as $a): ?>
						<?php if (! empty($a['value'])): ?>
							<div class="fn-kv"><span class="k"><?php echo $a['label'];?></span><span class="v"><?php echo $a['value'];?></span></div>
						<?php endif;?>
					<?php endforeach;?>
				</div>
			<?php endif;?>

			<?php
            // Flatten Nova's character-bio #tabs into stacked bio-section panels.
            if (isset($tabs)) {
                foreach ($tabs as $tab) {
                    if (! isset($sections[$tab['id']])) {
                        continue;
                    }
                    foreach ($sections[$tab['id']] as $sec) {
                        echo '<div class="fn-specs-panel"><div class="fn-specs-panel-title">'.$sec['name'].'</div>';
                        if (isset($fields[$sec['id']])) {
                            foreach ($fields[$sec['id']] as $f) {
                                if (! empty($f['value'])) {
                                    echo '<div class="fn-spec-row"><span class="k">'.$f['label'].'</span><span class="v">'.text_output($f['value'], '').'</span></div>';
                                }
                            }
                        }
                        echo '</div>';
                    }
                }
            } elseif (isset($sections)) {
                foreach ($sections as $sec) {
                    echo '<div class="fn-specs-panel"><div class="fn-specs-panel-title">'.$sec['name'].'</div>';
                    if (isset($fields[$sec['id']])) {
                        foreach ($fields[$sec['id']] as $f) {
                            if (! empty($f['value'])) {
                                echo '<div class="fn-spec-row"><span class="k">'.$f['label'].'</span><span class="v">'.$f['value'].'</span></div>';
                            }
                        }
                    }
                    echo '</div>';
                }
            }
            ?>
		</div>
	</div>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $msg_error;?></p>
<?php endif;?>
