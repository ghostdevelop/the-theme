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
			
			$post_types = glob(dirname(__FILE__) . '/post-types/*.php');
			
			if (!empty($post_types)){
				foreach ($post_types as $post_type){
					require_once($post_type);
				}
			}			
			
			$widgets = glob(dirname(__FILE__) . '/widgets/*.php');

			if (!empty($widgets)){
				foreach ($widgets as $widget){
					require_once($widget);
				}
			}	
			
			$metaboxes = glob(dirname(__FILE__) . '/metaboxes/*.php');
			
			if (!empty($metaboxes)){
				foreach ($metaboxes as $metabox){
					require_once($metabox);
				}
			}					
						
			TheTheme::load_actions();		
				
		}
		
		static function load_actions(){
			add_action( 'init', array('TheTheme', 'navigations_setup' ));				
			add_action( 'init', array('TheTheme', 'images_setup' ));				
			add_action('admin_menu', array('TheTheme', 'create_pages'));		
			add_action('admin_init', array('TheTheme', 'register_settings') );	
			add_action( 'after_setup_theme', array('TheTheme', 'theme_setup') );			
		}
		
		static function theme_setup(){
			load_theme_textdomain( 'the-theme', get_template_directory() . '/languages' );			
		}
		
		static function navigations_setup(){
			register_nav_menu( 'top-menu', __( 'Top menu', 'the-theme' ) );			
			register_nav_menu( 'footer-menu', __( 'Footer menu', 'the-theme' ) );			
			register_nav_menu( 'registration-menu', __( 'Registration menu', 'the-theme' ) );			
		}
		
		static function images_setup(){		
			add_theme_support( 'post-thumbnails' );			
		
			//Add image sizes	
			add_image_size( 'full-slider', 1600 );							
		}
		
		static function register_settings(){
			register_setting('the-theme-group', 'logo'); 	
			register_setting('the-theme-group', 'page-contact'); 	
		}				
		
		static function create_pages(){
			add_submenu_page('options-general.php', 'Téma beállítások', 'Téma beállítások', 'administrator', 'the-theme', array('TheTheme', 'the_theme_settings_page'));			
		}
		
		static function the_theme_settings_page(){
			include(sprintf("%s/admin/the-theme-settings.php", dirname(__FILE__)));	
		}
						
	}
	
}

TheTheme::load();

				