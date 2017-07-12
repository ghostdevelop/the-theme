<?php 
	if(!class_exists('SlitSlider')) {
	
	    class SlitSlider extends Component{
	    
	    	function load($footer = false){

				wp_enqueue_script( 'modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', array('jquery'), '1.0.0', true );			
				$this->get_script('jquery.ba-cond.min', '/js/jquery.ba-cond.min.js');
				$this->get_script('jquery.slitslider', '/js/jquery.slitslider.js');
	    /*
				$this->get_style('slicknav.min', '/css/slicknav.min.css');
				$this->get_style('superfish', '/css/superfish.css');
				$this->get_script('superfish', '/js/superfish.js');
	    */			
		    	parent::load();
		    	
		    	
	    	}
		    
		}
		
	}
	
	SlitSlider::load_post_types(__FILE__);	
	