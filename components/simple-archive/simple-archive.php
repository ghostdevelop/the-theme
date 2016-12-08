<?php $SimpleArchive = new SimpleArchive($options)?>
<div id="<?php echo $SimpleArchive->id ?>" class="<?php echo $SimpleArchive->type ?>">
	<?php $news = new WP_Query(array($options['query']));?>
	<?php $img_size = (isset($options['img_size']) ? $options['img_size'] : 'thumbnail')?>
	<?php if (isset($options['title'])):?><h2><?php echo $options['title']?></h2><?php endif;?>
	<?php if ($news->have_posts()):?>
		<?php while ($news->have_posts()): $news->the_post()?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if (has_post_thumbnail()):?>
					<div class="archive-thumbnail">
						<?php the_post_thumbnail($img_size)?>
					</div>
				<?php endif;?>
				<div class="archive-content">
					<h1><?php the_title()?></h1>
					<hr>
					<div class="entry-excerpt">
						<?php the_excerpt()?>
					</div>
					<a href="<?php the_permalink()?>" class="more <?php echo (isset($options['btn_class']) ? $options['btn_class'] : 'btn btn-default')?>">
						<?php _e('Tovább', 'the-theme')?>
					</a>					
				</div>
			</div>	
		<?php endwhile;?>
	<?php else:?>
		<div class="no-posts-found">
			<p><?php _e('Jelenleg nincs egyetlen találat sem.', 'the-theme')?></p>
		</div>
	<?php endif;?>
</div>