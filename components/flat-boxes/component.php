<?php 
	if(!class_exists('FlatBoxes')) {
	
	    class FlatBoxes extends Component{
	    
	    	function load($footer = false){
	
	
		    	parent::load();
		    	
		    	
	    	}
		    
		}
		
	}
	
	FlatBoxes::load_post_types(__FILE__);	
	