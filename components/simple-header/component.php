<?php 
	if(!class_exists('SimpleHeader')) {
	
	    class SimpleHeader extends Component{
	    
	    	function load($footer = false){

				$this->get_style('slicknav.min', '/css/slicknav.min.css');
				$this->get_style('superfish', '/css/superfish.css');
				wp_enqueue_script( 'modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', array('jquery'), '1.0.0', true );				
				$this->get_script('jquery.slicknav', '/js/jquery.slicknav.js');
				$this->get_script('hoverIntent', '/js/hoverIntent.js');
				$this->get_script('superfish', '/js/superfish.js');
		    	parent::load();
		    	
		    	
	    	}			
		    
		}
		
	}
	