<?php $Services = new Services($options)?>
<div id="<?php echo $Services->id?>" class="<?php echo $Services->type?> clearfix">
<?php $services = new WP_Query($options['query']);?>
<h2><?php if (isset($options['title'])):?><?php echo $options['title']?><?php else:?><?php _e('Szolgáltatásaink', 'the-theme')?><?php endif;?></h2>
<?php if ($services->have_posts()):?>
	<ul class="services-list">
		<?php while ($services->have_posts()):  $services->the_post();?>
			<li class="<?php echo (isset($options['li_class']) ? $options['li_class'] : '')?>">
				<?php if (!$options['disable_link']):?>			
					<a href="<?php the_permalink()?>" class="thumb">
						<?php the_post_thumbnail((isset($options['thumbnail_size']) ? $options['thumbnail_size'] : 'thumbnail'))?>
					</a>
				<?php else: ?>				
					<?php the_post_thumbnail((isset($options['thumbnail_size']) ? $options['thumbnail_size'] : 'thumbnail'))?>
				<?php endif?>
				<?php if (!isset($options['disable_link'])):?>
					<a href="<?php the_permalink()?>" class="item-title">
						<h5><?php the_title()?></h5>
					</a>
				<?php else: ?>
						<h5><?php the_title()?></h5>
				<?php endif; ?>
				<?php if (isset($options['show_desc'])):?>	
					<?php the_excerpt()?>
				<?php endif; ?>
			</li>
		<?php endwhile;?>
	</ul>
<?php endif?> 
</div>