<?php $Flexslider = new Flexslider($options)?>
<div id="<?php echo $Flexslider->id ?>" class="<?php echo $Flexslider->type ?>">
	<?php $slider = new WP_Query($options['query'])?>
	<?php if ($slider->have_posts()): ?>
		<ul class="slides">
			<?php while ($slider->have_posts()): $slider->the_post()?>
				<li>
					<?php the_post_thumbnail('full-slider')?>
					<div class="caption">
						<h2><?php the_title()?></h2>
						<p><?php the_excerpt()?></p>
					</div>
				</li>
			<?php endwhile?>
		</ul>
	<?php endif;?>
</div>
