<?php
 if (!class_exists('GalleriesPostType')){ 
	
	class GalleriesPostType extends PostType{	
	    	
	    /**
	    * register Custom Post Type
	    */
	    static function load() {
		    parent::load();
		    add_action( 'add_meta_boxes', array('GalleriesPostType', 'add_metabox' ));
		    add_action( 'init', array('GalleriesPostType', 'create_taxonomies'), 0 );  
	    }
	    
	    static function register() {
	        // register the post type
	        register_post_type('gallery', array(
			
				'labels'=> array(
					'name'               => __( 'Galleries', 'the-theme' ),
					'singular_name'      => __( 'Gallery', 'the-theme' ),
					'menu_name'          => __( 'Galleries',  'the-theme' ),
					'name_admin_bar'     => __( 'Gallery',  'the-theme' ),
					'add_new'            => __( 'New image',  'the-theme' ),
					'add_new_item'       => __( 'Add new image', 'the-theme' ),
					'new_item'           => __( 'New image', 'the-theme' ),
					'edit_item'          => __( 'Edit gallery', 'the-theme' ),
					'view_item'          => __( 'View gallery', 'the-theme' ),
					'all_items'          => __( 'All image', 'the-theme' ),
					'search_items'       => __( 'Search gallery', 'the-theme' ),
					'parent_item_colon'  => __( 'Parent gallery:', 'the-theme' ),
					'not_found'          => __( 'There are no images.', 'the-theme' ),
					'not_found_in_trash' => __( 'There are no images in trash.', 'the-theme' )
				),
	            'description' => __('Galleries', 'the-theme'),
	            'exclude_from_search' => true,
	            'publicly_queryable' => true,
	            'public' => true,
	            'show_ui' => true,
	            'auto-draft' => false,
	            'show_in_admin_bar' => true,
	            'show_in_nav_menus' => true,
	            'menu_position' => 4,
	            'menu_icon'	=> 'dashicons-format-image',
	            'revisions' => false,
	            'hierarchical' => true,
	            'has_archive' => true,
				'supports' => array('title','editor','thumbnail'),
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
	            )	            
	        ));
	    }
	    
	    public static function get_fields($fieldblock = false) {
	    	$fields = array();

			$fields['gallery']['gallery'] = array(
				"label" => __('Gallery:', 'the-theme'),
				"type" => "text",
				"class" => ""
			);							

			if ($fieldblock == false) return $fields;		
	    
			return $fields[$fieldblock];
	    }	    
	    
		static function create_taxonomies() {
			// Add new taxonomy, make it hierarchical (like categories)
			$labels = array(
				'name'              => __( 'Gallery', 'the-theme'),
				'singular_name'     => __( 'Gallery', 'the-theme' ),
				'search_items'      => __( 'Gallery keresése', 'the-theme' ),
				'all_items'         => __( 'All gallery', 'the-theme' ),
				'parent_item'       => __( 'Parent gallery', 'the-theme' ),
				'parent_item_colon' => __( 'Parent galleries:', 'the-theme' ),
				'edit_item'         => __( 'Edit gallery', 'the-theme' ),
				'update_item'       => __( 'Update gallery', 'the-theme' ),
				'add_new_item'      => __( 'New gallery', 'the-theme' ),
				'new_item_name'     => __( 'New gallery name', 'the-theme' ),
				'menu_name'         => __( 'Galleries', 'the-theme' ),
			);
		
			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'gallery' ),
			);
		
			register_taxonomy( 'gallery', array( 'gallery' ), $args );
		       
		 }
		 
	    static function add_metabox(){
		    add_meta_box('members-options', __('Gallery', 'the-theme'), array('GalleriesPostType', 'metabox'), 'page','side', 'low');
		    add_meta_box('members-options', __('Gallery', 'the-theme'), array('GalleriesPostType', 'metabox'), 'room','side', 'low');
	    }
	    
	    static function metabox($post){
		   	// Add an nonce field so we can check for it later.
			wp_nonce_field( 'post-type-options', 'post-type-options_nonce' );
						
			$fieldblocks = self::get_fields();		
			
			if (!empty($fieldblocks)){
				echo '<div class="field-block">';
				foreach ($fieldblocks['gallery'] as $key => $field){		
					echo '<div class="field-holder">';
					wp_dropdown_categories(array('taxonomy' => 'gallery', 'name' => $key, 'selected' => get_post_meta( $post->ID, $key, true ), 'class' => $field['class']));
					echo "</div>";
				}
				echo '</div>';				
			}
			
	    }   		 
	 }
	 
	 GalleriesPostType::load();
 }
