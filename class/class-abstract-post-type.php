<?php
	if(!class_exists('PostType')) {

	    abstract class PostType {
			
			static $fields = array();	
	    	
	    	static function load(){
		        add_action('init', array(get_called_class(), 'register'));
		        add_action( 'save_post', array(get_called_class(), 'save_metabox'));    		
	    	}
		    
			static function register() {
				
			}
			
			public static function get_fields($fieldblock = false) {
				
			}		
				
		    static function save_metabox($post_id){
				// Check if our nonce is set.
				if ( ! isset( $_POST['post-type-options_nonce'] ) )
					return $post_id;
		
				$nonce = $_POST['post-type-options_nonce'];
		
				// Verify that the nonce is valid.
				if ( ! wp_verify_nonce( $nonce, 'post-type-options' ) )
					return $post_id;
		
				// If this is an autosave, our form has not been submitted,
		                //     so we don't want to do anything.
				if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
					return $post_id;
		
				// Check the user's permissions.
				if ( 'page' == $_POST['post_type'] ) {
		
					if ( ! current_user_can( 'edit_page', $post_id ) )
						return $post_id;
			
				} else {
		
					if ( ! current_user_can( 'edit_post', $post_id ) )
						return $post_id;
				}
				
		
				/* OK, its safe for us to save the data now. */
		
				$fieldblocks = static::get_fields();
				
				foreach ($fieldblocks as $key => $fields){
					foreach ($fields as $key => $field){			
						if ($field['type'] == "text") $value = sanitize_text_field($_POST[$key]);
						if ($field['type'] == "number") $value = (int) $_POST[$key];
						
						update_post_meta( $post_id, $key, $value );
					}
				}	
			    
		    }
	    }
	    
	}
	