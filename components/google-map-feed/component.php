<?php 
	if(!class_exists('GoogleMapFeed')) {
	
	    class GoogleMapFeed extends Component{
	    	var $locations = array();
	    	
	    	function load(){
				wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAMJwJDzVaVBt0jK1Vi3AbRKao54Cu9Ne0', array('jquery'), '1.0.0', true );
				$this->get_script('gMap', '/js/jquery.gMap.min.js');
		    	parent::load();
		    	
		    	
	    	}
			
			function populate_locations($query){
				$locations = new WP_Query($query);		
				
				if ($locations->have_posts()){
					while ($locations->have_posts()){ $locations->the_post();
						$location['latitude'] = get_post_meta(get_the_ID(), '_lat', true);
						$location['longitude'] = get_post_meta(get_the_ID(), '_lng', true);
						$location['html'] = '<a class="">' . get_the_title() . '</a>';
						
						$this->locations[] = $location;
					} 				
				}
			} 
			
		    function create_js_options(){
			    $options = parent::create_js_options();
			    $this->populate_locations($this->options['query']);		    
			    $options['locations'] = $this->locations;
			    
			    return $options;

		    }			
		    
		}
		
	}
	
	GoogleMapFeed::load_post_types(__FILE__);	