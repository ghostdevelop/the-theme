<?php $Members = new Members($options)?>
<div id="<?php echo $Members->id?>" class="<?php echo $Members->type?> clearfix">
<?php $members = new WP_Query($options['query']);?>
<?php if ($members->have_posts()):?>
	<ul class="members-list">
		<?php while ($members->have_posts()):  $members->the_post();?>
			<li>
				<?php the_post_thumbnail('medium')?>
				<div class="caption">
					<h5><?php the_title()?></h5>
					<span><?php echo get_post_meta(get_the_ID(), 'rank', true) ?></span>
					<div class="more">
						<a href="mailto:<?php echo get_post_meta(get_the_ID(), 'email', true) ?>" class="fa fa-envelope"></a>
						<a href="callto:<?php echo get_post_meta(get_the_ID(), 'phone', true) ?>" class="fa fa-phone"></a>
					</div>
				</div>
			</li>
		<?php endwhile;?>
	</ul>
<?php endif?> 
</div>