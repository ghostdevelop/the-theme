<?php $Slick = new Slick($options)?>
<div id="<?php echo $Slick->id ?>" class="<?php echo $Slick->type ?>">
	<?php $slider = new WP_Query($options['query'])?>
	<?php if ($slider->have_posts()): ?>
		<section class="slider">
			<?php while ($slider->have_posts()): $slider->the_post()?>
				<div>
					<?php the_post_thumbnail('full')?>
				</div>
			<?php endwhile?>
		</section>
	<?php endif;?>
</div>
