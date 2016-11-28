<?php 
	if(!class_exists('ClassConctactForm')) {
	
	    class ClassConctactForm {
	    
		    public static function load(){
				add_action('after_setup_theme', array( 'ClassConctactForm', 'wpcf7_add_submit_button'));
				//remove_action( 'wpcf7_admin_init', 'wpcf7_add_tag_generator_submit', 55 );				
		    }    	    
			
			static function wpcf7_add_submit_button() {
		        if(function_exists('wpcf7_remove_shortcode')) {
	                wpcf7_remove_shortcode('submit');
	                remove_action( 'admin_init', 'wpcf7_add_tag_generator_submit', 55 );
	                $cf7_module = TEMPLATEPATH . '/contact-form/submit-button.php';
	                require_once $cf7_module;
		        }
			}
		    
	    }
	    
	}
	
	ClassConctactForm::load();
