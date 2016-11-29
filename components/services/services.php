<?php $Services = new Services($options)?>
<div id="<?php echo $Services->id?>" class="<?php echo $Services->type?> clearfix">
<?php $services = new WP_Query($options['query']);?>
<h2><?php if (isset($options['title'])):?><?php echo $options['title']?><?php else:?><?php _e('Szolgáltatásaink', 'the-theme')?><?php endif;?></h2>
<?php if ($services->have_posts()):?>
	<ul class="services-list">
		<?php while ($services->have_posts()):  $services->the_post();?>
			<li class="<?php echo (isset($options['li_class']) ? $options['li_class'] : '')?>">
				<a href="<?php the_permalink()?>" class="thumb">
					<?php the_post_thumbnail('thumbnail')?>
				</a>
				<a href="<?php the_permalink()?>" class="item-title">
					<h5><?php the_title()?></h5>
				</a>
			</li>
		<?php endwhile;?>
	</ul>
<?php endif?> 
</div>