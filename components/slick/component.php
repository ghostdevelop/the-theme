<?php 
	if(!class_exists('Slick')) {
	
	    class Slick extends Component{
	    
	    	function load($footer = false){
	
				$this->get_script('slick.min', '/js/slick.min.js');
				$this->get_style('slick-theme', '/css/slick-theme.css');
				$this->get_style('slick', '/css/slick.css');
	
		    	parent::load();
		    	
		    	
	    	}
		    
		}
		
	}
	
	Slick::load_post_types(__FILE__);	
	