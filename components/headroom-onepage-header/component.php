<?php 
	if(!class_exists('HeadroomOnepageHeader')) {
	
	    class HeadroomOnepageHeader extends Component{
	    
	    	function load($footer = false){
				$this->get_script('Debouncer', '/js/Debouncer.js');
				$this->get_script('features', '/js/features.js');
				$this->get_script('headroom', '/js/Headroom.js');
				$this->get_script('jQuery.headroom', '/js/jQuery.headroom.js');
		    	parent::load();
	    	}			
		    
		}
		
	}
	