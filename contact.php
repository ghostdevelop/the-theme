<?php /* Template Name: Contact */ ?>
<?php get_header()?>
		<?php load_component( array('id' => 1, 'type' => 'simple-header', 'js_options' => array(), 'menu' => 'top-menu', 'search_btn_class' => 'hvr-rectangle-out') ); ?>		
		<div class="breadcrumb">
			<div class="container">
				<?php if ( function_exists('yoast_breadcrumb') ):?>
					<?php yoast_breadcrumb('<div id="breadcrumbs">','</div>'); ?>
				<?php endif?>
			</div>
		</div>		
		<?php load_component(array(
				'id' => 1, 
				'type' => 'google-map-feed', 
				'js_options'=> array(
					'center' => array(
						'lat' => 47.593889, 
						'lng' => 19.054016	
					)
				),
				'locations' => array(
					array(
						'latitude' => 47.593889, 
						'longitude' => 19.054016,
						'icon' => array(
							'image' => get_template_directory_uri() . '/images/map-marker.png',
							'iconsize' => array(50, 50),
							'iconanchor' => array(50, 50)							
						)						
					)								
				)
			));
		?>			
		<div id="main-content">
			<div class="container">
				<div class="col-md-4">
					<?php if (have_posts()): the_post()?>
						<?php load_component( array( 'id' => 1, 'type' => 'single-content')); ?>	
					<?php endif;?>
				</div>	
				<div class="col-md-8 contact-page-form">
					<?php echo do_shortcode('[contact-form-7 id="50" title="Írjon nekünk"]') ?>
				</div>
			</div>
		</div>
		<sidebar id="footer-sidebar">
			<div class="container">	
				<?php dynamic_sidebar('footer-sidebar')?>
			</div>
		</sidebar>		
	<?php load_component( array('id' => 1, 'type' => 'simple-footer', 'menu' => 'footer-menu') ); ?>		
<?php get_footer()?>