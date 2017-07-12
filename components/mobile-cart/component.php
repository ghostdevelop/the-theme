<?php 
	if(!class_exists('MobileCart')) {
	
	    class MobileCart extends Component{
	    
	    	function load($footer = false){
				wp_enqueue_script('jquery-ui-dialog');
				wp_enqueue_style( 'jquery-ui', 'http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');				

		    	parent::load();
		    	
		    	
	    	}	
	    	
		    function create_js_options(){
			    $options = parent::create_js_options();
			    
				$options['title'] = __('Kosár', 'the-theme');
			    
			    return $options;

		    }	    	    	
		    
		}
		
	}