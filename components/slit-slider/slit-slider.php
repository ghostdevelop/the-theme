<?php $SlitSlider = new SlitSlider($options)?>
<div id="<?php echo $SlitSlider->id ?>" class="<?php echo $SlitSlider->type ?>">
	<?php $slider = new WP_Query($options['query'])?>
	<?php if ($slider->have_posts()): $nav = "";?>
	<?php $orientation = array('horizontal', 'vertical')?>
    <div id="<?php echo $SlitSlider->id ?>-slider" class="sl-slider-wrapper">
		<div class="sl-slider">
			
			<?php while ($slider->have_posts()): $slider->the_post()?>
				<?php $or = array_rand($orientation, 1);?>
				<div class="sl-slide" data-orientation="<?php echo $orientation[$or]?>" data-slice1-rotation="<?php echo rand(-25, 25)?>" data-slice2-rotation="<?php echo rand(-25, 25)?>" data-slice1-scale="<?php echo rand(-2, 2)?>" data-slice2-scale="<?php echo rand(-2, 2)?>" >
					<div class="sl-slide-inner">
						<div class="bg-img" style="background: url(<?php echo the_post_thumbnail_url('full')?>); background-size: cover;"></div>
						<h2><?php the_title() ?></h2>
						<blockquote><?php the_excerpt()?></blockquote>
					</div>
				</div>
				<?php 
					if ($slider->current_post == 0){
						$nav .= '<span class="nav-dot-current"></span>';
					} else {
						$nav .= '<span></span>';
					}
				?>
			<?php endwhile;?>
			
		</div><!-- /sl-slider -->

		<nav id="nav-dots" class="nav-dots">
			<?php echo $nav?>
		</nav>

	</div><!-- /slider-wrapper -->
	<?php endif;?>
</div>
<noscript>
	<style>
		.sl-slider-wrapper {
			overflow: visible !important;
			margin: 0 auto;
		}
		
		/* Slide wrapper and slides */
		
		.sl-slider,
		.sl-slide,
		.sl-slides-wrapper,
		.sl-slide-inner {
			position: relative;
			width: 100%;
			height: 100%;
			background: #fff;
		} 
		
		.sl-slide .bg-img {
			padding: 0;
			top: 0;
			left: 0;
		}
		
		.nav-arrows,
		.nav-dots {
			display: none;
		}		
	</style>
</noscript>