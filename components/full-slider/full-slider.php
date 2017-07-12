<?php $FullSlider = new FullSlider($options)?>
<div id="<?php echo $FullSlider->id ?>" class="<?php echo $FullSlider->type ?> carousel slide">
	<?php $slider = new WP_Query($options['query'])?>
	<?php if ($slider->have_posts()): ?>
        <ol class="carousel-indicators">
			<?php while ($slider->have_posts()): $slider->the_post()?>   
	        <!-- Indicators -->
	            <li data-target="#<?php echo $FullSlider->id ?>" data-slide-to="<?php echo $slider->current_post?>" class="<?php echo ($slider->current_post == 0 ? "active" : "")?>"></li>
	        <?php endwhile?>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
			<?php while ($slider->have_posts()): $slider->the_post()?>     
	            <div class="item <?php echo ($slider->current_post == 0 ? "active" : "")?>">
	                <!-- Set the third background image using inline CSS below. -->
	                <div class="fill" style="background-image:url('<?php the_post_thumbnail_url("full-slider")?>');"></div>
					<?php if (!$options['hide_title']):?>
		                <div class="carousel-caption">
		                    <h2><?php the_title()?></h2>
		                </div>
					<?php endif;?>
	            </div>
			<?php endwhile;?>            
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#<?php echo $FullSlider->id ?>" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#<?php echo $FullSlider->id ?>" data-slide="next">
            <span class="icon-next"></span>
        </a>
	<?php endif;?>
</div>