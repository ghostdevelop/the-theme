<?php $SingleContact = new SingleContact($options)?>
<div id="<?php echo $SingleContact->id?>" class="<?php echo $SingleContact->type?>">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="col-md-4 col-xs-12">
			<div class="entry-content">
				<?php the_content()?>
			</div>
		</div>
		<div class="col-md-8 col-xs-12">
			<?php if (isset($options['form'])):?>
				<?php echo do_shortcode($options['form'])?>		
			<?php endif?>
		</div>
	</div>
</div>