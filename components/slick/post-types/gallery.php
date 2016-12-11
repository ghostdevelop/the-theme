<?php
 if (!class_exists('GalleriesPostType')){ 
	
	class GalleriesPostType extends PostType{	
	    	
	    /**
	    * register Custom Post Type
	    */
	    static function load() {
		    parent::load();
		    add_action( 'init', array('GalleriesPostType', 'create_taxonomies'), 0 );  
	    }
	    
	    static function register() {
	        // register the post type
	        register_post_type('gallery', array(
			
				'labels'=> array(
					'name'               => _x( 'Galériák', 'the-theme' ),
					'singular_name'      => _x( 'Galéria', 'the-theme' ),
					'menu_name'          => _x( 'Galériák',  'the-theme' ),
					'name_admin_bar'     => _x( 'Galéria',  'the-theme' ),
					'add_new'            => _x( 'Új kép',  'the-theme' ),
					'add_new_item'       => __( 'Új kép hozzáadása', 'the-theme' ),
					'new_item'           => __( 'Új kép', 'the-theme' ),
					'edit_item'          => __( 'Galéria szerkesztése', 'the-theme' ),
					'view_item'          => __( 'Galéria megtekintése', 'the-theme' ),
					'all_items'          => __( 'Összes kép', 'the-theme' ),
					'search_items'       => __( 'Galéria keresése', 'the-theme' ),
					'parent_item_colon'  => __( 'Parent galéria:', 'the-theme' ),
					'not_found'          => __( 'Nincsenek képek.', 'the-theme' ),
					'not_found_in_trash' => __( 'Nincsenek képek a kukában.', 'the-theme' )
				),
	            'description' => __('Galériák', 'the-theme'),
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
	            ),       
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
	    
		static function create_taxonomies() {
			// Add new taxonomy, make it hierarchical (like categories)
			$labels = array(
				'name'              => __( 'Galéria'),
				'singular_name'     => __( 'Galéria' ),
				'search_items'      => __( 'Galéria keresése' ),
				'all_items'         => __( 'Összes galéria' ),
				'parent_item'       => __( 'Szülő galéria' ),
				'parent_item_colon' => __( 'Szülő galériák:' ),
				'edit_item'         => __( 'Galéria szerkesztése' ),
				'update_item'       => __( 'Galéria frissítése' ),
				'add_new_item'      => __( 'Új galéria hozzáadása' ),
				'new_item_name'     => __( 'Új galéria neve' ),
				'menu_name'         => __( 'Galériák' ),
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
	 }
	 
	 GalleriesPostType::load();
 }
