<?php $SingleThumbContent = new SingleThumbContent($options)?>
<div id="<?php echo $SingleThumbContent->id ?>" class="<?php echo $SingleThumbContent->type ?>">
<?php $single = new WP_Query($options['query']);?>
<?php if ($single->have_posts()): $single->the_post();?>
	<div style="background-image:url(<?php echo the_post_thumbnail_url('full')?>)" class="<?php echo (isset($options['right']) ? 'right' : '')?>">
		<?php if (!isset($options['right'])): ?>
			<div class="col-md-<?php echo (isset($options['right']) ? $options['right'] : 6)?> col-xs-12 thumbnail-holder" ></div>
		<?php endif?>
		<div class="col-md-6 col-xs-12 content">
			<h2><?php the_title()?></h2>
			<hr>
			<div class="entry-content">
				<?php the_content()?>
			</div>
		</div>
		<?php if (isset($options['right'])): ?>	
			<div class="col-md-6 col-xs-12 thumbnail-holder" ></div>
		<?php endif?>			
	</div>
<?php endif;?>
</div>