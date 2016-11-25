<?php get_header()?>
	<?php load_component( array('id' => 1, 'type' => 'simple-header', 'js_options' => array(), 'menu' => 'top-menu') ); ?>	
		<?php if (have_posts()): the_post()?>
			<div class="container-fluid light-bg">
				<div class="container">
					<?php load_component( array( 'id' => 1, 'type' => 'jumbotron', 'query' => array('post_type' => 'any', 'p' => 48), 'hide_button' => true)); ?>	
				</div>
			</div>
			<?php load_component( array( 'id' => 1, 'type' => 'single-thumb-content', 'query' => array('p' => 30, 'post_type' => 'any'))); ?>
			<div class="container-fluid light-bg">
				<div class="container">				
					<?php load_component( array( 'id' => 1, 'type' => 'jumbotron', 'query' => array('post_type' => 'any', 'p' => 2), 'title' => 'Inkább ez legyen', 'btn_class' => 'btn-dark hvr-shutter-out-horizontal')); ?>	
				</div>
			</div>
			<?php load_component( array( 'id' => 1, 'type' => 'members', 'query' => array('post_type' => 'member'))); ?>	
		<?php endif;?>
		<div class="container-fluid">
			<div class="row">
			<?php load_component(array(
					'id' => 2, 
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
							'longitude' => 19.054016	
						)
					)
				));
			?>		
			</div>			
		</div>
	<?php load_component( array('id' => 1, 'type' =>  'simple-footer', 'menu' => 'footer-menu') ); ?>			
<?php get_footer()?>
