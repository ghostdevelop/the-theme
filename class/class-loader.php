<?php 
	if(!class_exists('ClassLoader')) {
	
	    class ClassLoader {
	    
		    public static function load(){
		    	ClassLoader::load_components();
		    	add_action( 'wp_enqueue_scripts', array('ClassLoader', 'load_default_css_js' ));
		    }
		    
		    static function load_components(){
				$components = glob(get_template_directory() . '/components/*');

				if (!empty($components)){
					foreach ($components as $component){
						$path = explode("/", $component);
						require_once(get_template_directory() . '/components/' . end($path) . '/component.php');
					}
				}			  
		    }	
		    
		    static function load_default_css_js(){
		    	
		    	//Styles	    			    
				wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, '');			    
				wp_enqueue_style( 'font-awesome.min', get_template_directory_uri() . '/css/font-awesome.min.css', array(), false, '');			    
				wp_enqueue_style( 'the-theme-default', get_template_directory_uri() . '/style.css', array(), false, '');			    
				wp_enqueue_style( 'style-name', get_stylesheet_uri() );
			   
				//wp_enqueue_style( 'sample', get_template_directory_uri() . '/css/sample.css', array(), false, '');		    
			   			   
			   
			   //Scripts
			   wp_enqueue_script( 'jquery');			    
			   wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', false );			    
			   wp_enqueue_script( 'device.min', get_template_directory_uri() . '/js/device.min.js', array('jquery'), '1.0.0', false );			    
			   wp_enqueue_script( 'scripts-loader', get_template_directory_uri() . '/js/scripts-loader.js', array('jquery'), '1.0.0', true );			    
			   wp_localize_script( 'scripts-loader', 'urls', array('theme_url' => get_template_directory_uri()));			    	    	    
			   
			   //wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array('jquery'), '1.0.0', true );			    
		    }	    
		    
	    }
	    
	}
	
	ClassLoader::load();
