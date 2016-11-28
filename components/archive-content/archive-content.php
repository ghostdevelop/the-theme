<?php $ArchiveContent = new ArchiveContent($options)?>
<div id="<?php echo $ArchiveContent->id?>" class="<?php echo $ArchiveContent->type?>">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<a href="<?php the_permalink()?>"><h1><?php the_title()?></h1></a>
		<hr>
		<?php if (has_post_thumbnail()):?>
			<a href="<?php the_permalink()?>" class="archive-thumbnail">
				<?php the_post_thumbnail('thumbnail')?>
			</a>
		<?php endif?>
		<div class="entry-excerpt">
			<?php the_excerpt()?>
		</div>
		<a href="<?php the_permalink()?>" class="archive-content-btn <?php echo (isset($options['btn_class']) ? $options['btn_class'] : 'btn btn-default') ?>"><?php _e('Tovább', 'the-theme')?></a>
	</div>
</div>