<?php 
	if(!class_exists('FullSlider')) {
	
	    class FullSlider extends Component{
	    
	    	function load($footer = false){
	
	
		    	parent::load();
		    	
		    	add_image_size( 'full-slider', 1980 );
	    	}
		    
		}
		
	}
	
	FullSlider::load_post_types(__FILE__);	
	