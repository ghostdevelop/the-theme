<?php
 if (!class_exists('AdsPostType')){ 
	
	class AdsPostType extends PostType{	
	    	
	    /**
	    * register Custom Post Type
	    */
	    static function register() {
	        // register the post type
	        register_post_type('ad', array(
			
				'labels'=> array(
					'name'               => _x( 'Hírdetések', 'the-theme' ),
					'singular_name'      => _x( 'Hírdetés', 'the-theme' ),
					'menu_name'          => _x( 'Hírdetések',  'the-theme' ),
					'name_admin_bar'     => _x( 'Hírdetés',  'the-theme' ),
					'add_new'            => _x( 'Új hírdetés',  'the-theme' ),
					'add_new_item'       => __( 'Új hírdetés hozzáadása', 'the-theme' ),
					'new_item'           => __( 'Új hírdetés', 'the-theme' ),
					'edit_item'          => __( 'Hírdetés szerkesztése', 'the-theme' ),
					'view_item'          => __( 'Hírdetés megtekintése', 'the-theme' ),
					'all_items'          => __( 'Összes hírdetés', 'the-theme' ),
					'search_items'       => __( 'Hírdetés keresése', 'the-theme' ),
					'parent_item_colon'  => __( 'Parent hírdetés:', 'the-theme' ),
					'not_found'          => __( 'Nincsenek hírdetések.', 'the-theme' ),
					'not_found_in_trash' => __( 'Nincsenek hírdetések a kukában.', 'the-theme' )
				),
	            'description' => __('Hírdetések', 'the-theme'),
	            'exclude_from_search' => true,
	            'publicly_queryable' => true,
	            'public' => true,
	            'show_ui' => true,
	            'auto-draft' => false,
	            'show_in_admin_bar' => true,
	            'show_in_nav_menus' => true,
	            'menu_position' => 4,
	            'menu_icon'	=> 'dashicons-tag',
	            'revisions' => false,
	            'hierarchical' => true,
	            'has_archive' => true,
				'supports' => array('title','editor','thumbnail', 'custom-fields'),
	            'rewrite' => false,
	            'can_export' => false,
	            'capabilities' => array (
	                'create_posts' => 'edit_posts',
	                'edit_post' => 'edit_posts',
	                'read_post' => 'edit_posts',
	                'delete_posts' => 'edit_posts',
	                'delete_post' => 'edit_posts',
	                'edit_posts' => 'edit_posts',
	                'edit_others_posts' => 'edit_posts',
	                'publish_posts' => 'edit_posts',
	                'read_private_posts' => 'edit_posts',
	            ),
	            'register_meta_box_cb' => array(__CLASS__, 'add_metabox')               
	        ));
	    }
	    
	    public static function get_fields($fieldblock = false) {
	    	$fields = array();
	    	/*
			$fields['data'][''] = array(
				"label" => __('Test:'),
				"type" => "text",
				"class" => ""
			);							
			*/
			if ($fieldblock == false) return $fields;		
	    
			return $fields[$fieldblock];
	    }	    
	    
	    static function add_metabox(){
		    add_meta_box('ad-options', __('Hírdetés adatok'), array('AdsPostType', 'metabox'), 'ad','side');
	    }
	    
	    static function metabox($post){
		   	// Add an nonce field so we can check for it later.
			wp_nonce_field( 'post-type-options', 'post-type-options_nonce' );
						
			$fieldblocks = self::get_fields();	
			
			if (!empty($fieldblocks)){
				echo '<div class="field-block">';
				foreach ($fieldblocks['data'] as $key => $field){		
					echo '<div class="field-holder">';
					echo '<label>' .$field['label']. '</label>';
					echo '<input type="' .$field['type']. '" class="admin-meta-input ' .$field['class']. '" name="' .$key. '" value="' .get_post_meta( $post->ID, $key, true ). '" />';			
					echo "</div>";
				}
				echo '</div>';				
			}	
			
			
	    }
	       
	 }
	 
	 AdsPostType::load();
 }
