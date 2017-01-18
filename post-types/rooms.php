<?php
 if (!class_exists('RoomsPostType')){ 
	class RoomsPostType extends PostType{
		
	    /**
	    * register Custom Post Type
	    */
	    static function register() {
	        // register the post type
	        register_post_type('room', array(
			
				'labels'=> array(
					'name'               => _x( 'Szobák', 'the-theme' ),
					'singular_name'      => _x( 'Szoba', 'the-theme' ),
					'menu_name'          => _x( 'Szobák',  'the-theme' ),
					'name_admin_bar'     => _x( 'Szoba',  'the-theme' ),
					'add_new'            => _x( 'Új szoba',  'the-theme' ),
					'add_new_item'       => __( 'Új szoba hozzáadása', 'the-theme' ),
					'new_item'           => __( 'Új szoba', 'the-theme' ),
					'edit_item'          => __( 'Szoba szerkesztése', 'the-theme' ),
					'view_item'          => __( 'Szoba megtekintése', 'the-theme' ),
					'all_items'          => __( 'Összes szoba', 'the-theme' ),
					'search_items'       => __( 'Szoba keresése', 'the-theme' ),
					'parent_item_colon'  => __( 'Parent szoba:', 'the-theme' ),
					'not_found'          => __( 'Nincsenek szobák.', 'the-theme' ),
					'not_found_in_trash' => __( 'Nincsenek szobák a kukában.', 'the-theme' )
				),
	            'description' => __('Szobák', 'the-theme'),
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
	            )      
	        ));
	    }
	    
	    public static function get_fields($fieldblock = false) {
			$fields['contact']['email'] = array(
				"label" => __('Email:'),
				"type" => "text",
				"class" => ""
			);
			
			$fields['contact']['phone'] = array(
				"label" => __('Telefonszám:'),
				"type" => "text",
				"class" => ""
			);		
			
			$fields['data']['rank'] = array(
				"label" => __('Beosztás:'),
				"type" => "text",
				"class" => ""
			);							
			
			if ($fieldblock == false) return $fields;		
	    
			return $fields[$fieldblock];
	    }	    
	 }
	 
	 RoomsPostType::load();
 }


