<?php 
	if(!class_exists('Slick')) {
	
	    class Slick extends Component{
	    
	    	function load($footer = false){
	
				$this->get_script('slick.min', '/js/slick.min.js');
				$this->get_style('slick-theme', '/css/slick-theme.css');
				$this->get_style('slick', '/css/slick.css');
	
		    	parent::load();
		    	
		    	
	    	}
	    	
	    	static function load_scripts(){
				wp_enqueue_script('slick.min', get_template_directory_uri() . '/components/slick/js/slick.min.js', array('jquery'), '1.0.0', true);
				wp_enqueue_style('slick-theme', get_template_directory_uri() . '/components/slick/css/slick-theme.css');
				wp_enqueue_style('slick', get_template_directory_uri() . '/components/slick/css/slick.css');    	
	    	}
		    
		}
		
	}
	
	