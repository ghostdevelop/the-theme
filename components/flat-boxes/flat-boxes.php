<?php $FlatBoxes = new FlatBoxes($options)?>
<div id="<?php echo $FlatBoxes->id ?>" class="<?php echo $FlatBoxes->type ?>">
	<?php 
		if (isset($options['query'])){
			$boxes = new WP_Query($options['query']);			
		} else {
			$boxes = $wp_query;			
		}

	?>

	<?php if ($boxes->have_posts()):?>
		<div class="boxes-holder clearfix">
			<?php while ($boxes->have_posts()): $boxes->the_post()?>
				<div class="box col-md-<?php echo (isset($options['col']) ? $options['col'] : "6")?> col-xs-12" style="background: url(<?php the_post_thumbnail_url()?>)">
					<div class="caption">
						<h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
						<span><?php the_excerpt()?></span>
						<a href="<?php the_permalink()?>" class="btn <?php echo (isset($options['btn_class']) ? $options['btn_class'] : 'btn-default')?>"><?php echo (isset($options['btn_txt']) ? $options['btn_txt'] : __('Megnézem', 'the-theme'))?></a>
					</div>
				</div>
			<?php endwhile;?>
		</div>
	<?php endif;?>
</div>