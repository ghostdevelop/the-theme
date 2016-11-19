<?php 
if(!class_exists('TheTheme')) {
	
	class TheTheme{
		
		public static function load(){
			$classes = glob(dirname(__FILE__) . '/class/*.php');
			
			if (!empty($classes)){
				foreach ($classes as $class){
					require_once($class);
				}
			}
			
			TheTheme::load_actions();
				
		}
		
		static function load_actions(){
			add_action( 'init', array('TheTheme', 'navigations_setup' ));				
			add_action( 'init', array('TheTheme', 'images_setup' ));				
		}
		
		static function navigations_setup(){
			register_nav_menu( 'top-menu', __( 'Top menu', 'the-theme' ) );			
			register_nav_menu( 'registration-menu', __( 'Registration menu', 'the-theme' ) );			
		}
		
		static function images_setup(){		
			add_theme_support( 'post-thumbnails' );			
		
			//Add image sizes
			add_image_size( 'product-big-thumb', 270, 270, true );					
		}	
		
		
	}
	
}

TheTheme::load();
