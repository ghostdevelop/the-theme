<?php get_header()?>
	<?php load_component( array('id' => 1, 'type' => 'simple-header', 'js_options' => array(), 'menu' => 'top-menu') ); ?>	
		<div id="main-content">
			<div class="container">
				<div class="col-md-9">
					<div class="breadcrumb">
						<?php if ( function_exists('yoast_breadcrumb') ):?>
							<?php yoast_breadcrumb('<div id="breadcrumbs">','</div>'); ?>
						<?php endif?>
					</div>					
					<?php load_component( array( 'id' => 1, 'type' => 'page-404', 'btn_class' => 'btn btn-dark hvr-shutter-out-horizontal')); ?>	
				</div>	
				<div class="col-md-3 right-sidebar">
					<?php dynamic_sidebar('right-sidebar')?>
				</div>
			</div>
		</div>
	<?php load_component( array('id' => 1, 'type' =>  'simple-footer', 'menu' => 'footer-menu') ); ?>
<?php get_footer()?>