<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}?>

<div class="fn-section-head">
	<span class="glyph">&#9153;</span>
	<h3><?php echo $header;?></h3>
	<div class="fn-title-rule"></div>
	<span class="lbl">新闻 · NEWS</span>
</div>

<?php if (isset($news)): ?>
	<div id="news">
		<?php if (isset($categories)): ?>
			<div class="fn-news-filter">
				<span class="flabel">Filter &middot;</span>
				<a href="<?php echo site_url('main/news/all');?>" class="all pill is-active" myTitle="<?php echo $header;?>"><?php echo $label['all_news'];?></a>
				<?php foreach ($categories as $cat): ?>
					<a href="<?php echo site_url('main/news/'.$cat['id']);?>" class="show pill" myID="<?php echo $cat['id'];?>" myTitle="<?php echo $header.' '.NDASH.' '.$cat['name'];?>"><?php echo $cat['name'];?></a>
				<?php endforeach;?>
			</div>
		<?php endif;?>

		<div class="fn-news-list">
			<?php foreach ($news as $value): ?>
				<div class="news <?php echo $value['cat_id'];?> fn-news-item">
					<div class="fn-news-item-head">
						<?php echo anchor('main/viewnews/'.$value['id'], '&raquo; '.$value['title'], array('class' => 'fn-news-title'));?>
						<span class="fn-news-badge"><?php echo $value['category'];?></span>
					</div>
					<div class="fn-news-meta">
						<span class="date"><?php echo $value['date'];?></span>
						<span class="sep"></span>
						<span class="author"><?php echo $label['author'];?> <?php echo $value['author'];?><?php if ($value['comment_count'] > 0): ?> &middot; <?php echo $value['comment_count'].' '.$label['comments'];?><?php endif;?></span>
					</div>
					<div class="fn-news-excerpt"><?php echo text_output(word_limiter($value['content'], 50), 'p');?></div>
				</div>
			<?php endforeach;?>
		</div>

		<div class="fn-news-pagination"><?php echo $pagination;?></div>
	</div>

	<script type="text/javascript">
	(function () {
		var pills = document.querySelectorAll('.fn-news-filter .pill');
		var items = document.querySelectorAll('.fn-news-list .fn-news-item');
		for (var i = 0; i < pills.length; i++) {
			pills[i].addEventListener('click', function (e) {
				e.preventDefault();
				var id = this.getAttribute('myID');
				for (var j = 0; j < pills.length; j++) { pills[j].classList.remove('is-active'); }
				this.classList.add('is-active');
				for (var k = 0; k < items.length; k++) {
					items[k].style.display = (!id || items[k].classList.contains(id)) ? '' : 'none';
				}
			});
		}
	})();
	</script>
<?php else: ?>
	<p class="fn-card-excerpt"><?php echo $label['nonews'];?></p>
	<?php if (Auth::is_logged_in()): ?>
		<p class="fn-news-create"><?php echo $label['createnews'];?></p>
	<?php endif;?>
<?php endif;?>
