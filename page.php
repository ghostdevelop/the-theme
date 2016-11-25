<?php get_header()?>
	<?php load_component( array('id' => 1, 'type' => 'simple-header', 'js_options' => array(), 'menu' => 'top-menu') ); ?>	
		<div class="container">
			<div class="col-md-9">
			<?php if (have_posts()): the_post()?>
				<?php load_component( array( 'id' => 1, 'type' => 'single-content')); ?>	
			<?php else: ?>
				<?php load_component( array( 'id' => 1, 'type' => 'page-404')); ?>	
			<?php endif;?>
			</div>	
		</div>
	<?php load_component( array('id' => 1, 'type' =>  'simple-footer', 'menu' => 'footer-menu') ); ?>
<?php get_footer()?>