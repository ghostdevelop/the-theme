<?php 
	if(!class_exists('Flexslider')) {
	
	    class Flexslider extends Component{
	    
	    	function load($footer = false){
	
				$this->get_script('jquery.flexslider-min', '/js/jquery.flexslider-min.js');
				$this->get_style('flexslider', '/css/flexslider.css');
	
		    	parent::load();
		    	
		    	
	    	}
	    	
	    	static function load_scripts(){
	    	
	    	}
		    
		}
		
	}
	
	