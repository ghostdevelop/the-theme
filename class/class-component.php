<?php 
	if(!class_exists('Component')) {
	
	    class Component {
	    	
	    	var $id, $type, $style, $options, $js_options;
	    
		    public function __construct($options){
		    	$this->id =  (string) $options['type'] . '-' . $options['id'];
		    	$this->type = (string) $options['type'];
		    	$this->style = $this->get_stylesheet($options);
		    	$this->options = $options;
		    	if (isset($options['js_options'])) $this->populate_js_options($options['js_options']);
		    	
		    	$this->load();    	    	
		    }
		    
		    function load($footer = false){
					$this->get_style($this->id, '/css/' . $this->style);
					$this->get_script($this->id, '/js/' . $this->type . '.js', $footer);				    

					if (!empty($this->js_options)) wp_localize_script( $this->id, get_class($this), $this->js_options );
		    }
		    
		    function create_js_options(){
			    $js_options = array();
			    
			    $js_options['id'] = $this->id;
			    
			    return $js_options;
		    }
		    
		    function populate_js_options($options){
			    $js_options = $this->create_js_options();
			    
			    $js_options = array_merge($js_options, $options);
			    
			    $this->js_options = $js_options;
		    }
		    
		    static function load_post_types($file){  
				$explode = explode("/", $file);
				array_pop($explode);
				
				$parent_url = get_template_directory() . '/components/' . end($explode) . '/post-types/';
				$child_url = get_stylesheet_directory() . '/components/' . end($explode) . '/post-types/';

				$parent_post_types = glob($parent_url . '*.php');		    
				$child_post_types = glob($child_url . '*.php');		    
				
				$post_types = array_merge($parent_post_types, $child_post_types); 
				   
				foreach ($post_types as $post_type){
					$explode = explode("/", $post_type);
					
					if (file_exists($child_url . end($explode))){
						require_once($child_url . end($explode));
					} else {
						require_once($parent_url . end($explode));
					}
				}
		    }
		    
		    function get_stylesheet($options){
		    	if (isset($options['style'])){
		    		return (string) $options['style'] . '.css';			    
		    	} else {
			    	return 'default.css';	
		    	}
		    }
		    
		    function get_template_path(){
			    return get_template_directory() . '/components/' . $this->type;
		    }
		    
		    function get_child_template_path(){
			    return get_stylesheet_directory() . '/components/' . $this->type;			    
		    }
		    
		    function get_template_url(){
			    return get_template_directory_uri() . '/components/' . $this->type;
		    }
		    
		    function get_child_template_url(){
			    return get_stylesheet_directory_uri() . '/components/' . $this->type;			    
		    }	
		    
		    function get_style($handler, $file){
				if (file_exists($this->get_child_template_path() . $file)){
					wp_enqueue_style( $handler, $this->get_child_template_url() . $file, array(), false, '');	
				} elseif (file_exists($this->get_template_path() . $file)) {
					wp_enqueue_style( $handler, $this->get_template_url() . $file, array(), false, '');		
				}				    
		    }	 
		       
		    function get_script($handler, $file, $footer = false){
				if (file_exists($this->get_child_template_path() . $file)){
					wp_enqueue_script( $handler, $this->get_child_template_url() . $file, array('jquery'), '1.0.0', $footer );				
				} elseif (file_exists($this->get_template_path() . $file)) {
					wp_enqueue_script( $handler, $this->get_template_url()  . $file, array('jquery'), '1.0.0', $footer );				
				}	 			    
		    }
		    
		}
		
	}