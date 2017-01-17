<?php $Content = new Content($options)?>
<div id="<?php echo $Content->id?>" class="<?php echo $Content->type?>">
	<?php $content = new WP_Query($options['query']);?>
	<?php if ($content->have_posts()): $content->the_post()?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="title-holder">
				<h1 class="single-title"><?php the_title()?></h1>
				<hr>
			</div>
			<div class="entry-content">
				<?php the_content()?>
			</div>
		</div>
	<?php endif;?>
</div>