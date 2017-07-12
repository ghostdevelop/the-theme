<?php $Marque = new Marque($options)?>
<div id="<?php echo $Marque->id ?>" class="<?php echo $Marque->type ?>">
	<?php $content = new WP_Query($options['query']);?>
	<?php if ($content->have_posts()):?>
		<div class="marquee">
			<?php while ($content->have_posts()): $content->the_post()?>
				<a href="<?php the_permalink()?>"><?php the_title()?></a>
			<?php endwhile;?>
		</div>
	<?php endif;?>
</div>