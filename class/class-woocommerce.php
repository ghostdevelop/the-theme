<?php 
if(!class_exists('CustomWoo')) {

	class CustomWoo{
		
		public static function load(){
		
			add_action( 'after_setup_theme', array('CustomWoo', 'woocommerce_support' ));
		    add_filter('body_class', array('CustomWoo', 'body_classes'));
		}
		
		static function woocommerce_support() {
		    add_theme_support( 'woocommerce' );
		}
		
		    
	    static function front_scripts(){
			wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/css/woocommerce.css', array(), false, '');	
			wp_enqueue_style( 'woocommerce-layout', get_template_directory_uri() . '/css/woocommerce-layout.css', array(), false, '');	
			wp_enqueue_style( 'woocommerce-smallscreen', get_template_directory_uri() . '/css/woocommerce-smallscreen.css', array(), false, 'only screen and (max-width: 768px)');			
		}

		static function body_classes($classes) {
		        $classes[] = 'woocommerce';

		        return $classes;
		}		
	} 
}

if ( class_exists( 'WooCommerce' ) ) {
	CustomWoo::load();
}