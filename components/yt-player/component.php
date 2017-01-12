<?php 
	if(!class_exists('YTPlayer')) {
	
	    class YTPlayer extends Component{
	    
	    	function load($footer = false){
				$this->get_script('jquery.youtubebackground', '/js/jquery.youtubebackground.js');
		    	parent::load();
		    	
		    	
	    	}			
		    
		}
		
	}
	