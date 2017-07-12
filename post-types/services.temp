<?php
 if (!class_exists('ServicesPostType')){ 
	class ServicesPostType extends PostType{
	
	    /**
	    * register Custom Post Type
	    */
	    static function register() {
	        // register the post type
	        register_post_type('service', array(
			
				'labels'=> array(
					'name'               => _x( 'Szolgáltatásaink', 'the-theme' ),
					'singular_name'      => _x( 'Szolgáltatás', 'the-theme' ),
					'menu_name'          => _x( 'Szolgáltatásaink',  'the-theme' ),
					'name_admin_bar'     => _x( 'Szolgáltatás',  'the-theme' ),
					'add_new'            => _x( 'Új szolgáltatás',  'the-theme' ),
					'add_new_item'       => __( 'Új szolgáltatás hozzáadása', 'the-theme' ),
					'new_item'           => __( 'Új szolgáltatás', 'the-theme' ),
					'edit_item'          => __( 'Szolgáltatás szerkesztése', 'the-theme' ),
					'view_item'          => __( 'Szolgáltatás megtekintése', 'the-theme' ),
					'all_items'          => __( 'Összes szolgáltatás', 'the-theme' ),
					'search_items'       => __( 'Szolgáltatás keresése', 'the-theme' ),
					'parent_item_colon'  => __( 'Parent szolgáltatás:', 'the-theme' ),
					'not_found'          => __( 'Nincsenek szolgáltatásak.', 'the-theme' ),
					'not_found_in_trash' => __( 'Nincsenek szolgáltatásak a kukában.', 'the-theme' )
				),
	            'description' => __('Szolgáltatásaink', 'the-theme'),
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
				'supports' => array('title','editor','thumbnail', 'custom-fields', 'page-attributes'),
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
		    
	 }
	 
	 ServicesPostType::load();
 }


