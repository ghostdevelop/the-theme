<?php get_header()?>
	<?php load_component( array('id' => 1, 'type' => 'portal-header', 'register-menu' => 'registration-menu', 'top-menu' => 'top-menu') ); ?>	
		<?php if (have_posts()): the_post()?>
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php load_component( array( 'id' => 1, 'type' => 'single-content')); ?>	
						<?php load_component(array(
								'id' => 1, 
								'type' => 'google-map-feed', 
								'query' => array('post_type' => 'location', 'p' => 9), 
								'js_options'=> array(
									'center' => array(
										'lat' => 47.593889, 
										'lng' => 19.054016	
									)
								)
							));
						?>	
						
						<?php load_component(array(
								'id' => 2, 
								'type' => 'google-map-feed', 
								'query' => $_POST, 
								'js_options'=> array(
									'center' => array(
										'lat' => 47.593889, 
										'lng' => 19.054016	
									)
								)
							));
						?>																		
					</div>
					<div class="col-md-4">
						<?php get_sidebar()?>
					</div>
				</div>
			</div>
		<?php endif;?>
	<?php load_component( array('id' => 1, 'type' =>  'portal-footer', 'register-menu' => 'registration-menu', 'top-menu' => 'top-menu') ); ?>
<?php get_footer()?>
