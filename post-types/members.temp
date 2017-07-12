<?php
 if (!class_exists('MembersPostType')){ 
	class MembersPostType extends PostType{
		
	    /**
	    * register Custom Post Type
	    */
	    static function register() {
	        // register the post type
	        register_post_type('member', array(
			
				'labels'=> array(
					'name'               => _x( 'Munkatársaink', 'the-theme' ),
					'singular_name'      => _x( 'Munkatárs', 'the-theme' ),
					'menu_name'          => _x( 'Munkatársaink',  'the-theme' ),
					'name_admin_bar'     => _x( 'Munkatárs',  'the-theme' ),
					'add_new'            => _x( 'Új munkatárs',  'the-theme' ),
					'add_new_item'       => __( 'Új munkatárs hozzáadása', 'the-theme' ),
					'new_item'           => __( 'Új munkatárs', 'the-theme' ),
					'edit_item'          => __( 'Munkatárs szerkesztése', 'the-theme' ),
					'view_item'          => __( 'Munkatárs megtekintése', 'the-theme' ),
					'all_items'          => __( 'Összes munkatárs', 'the-theme' ),
					'search_items'       => __( 'Munkatárs keresése', 'the-theme' ),
					'parent_item_colon'  => __( 'Parent munkatárs:', 'the-theme' ),
					'not_found'          => __( 'Nincsenek munkatársak.', 'the-theme' ),
					'not_found_in_trash' => __( 'Nincsenek munkatársak a kukában.', 'the-theme' )
				),
	            'description' => __('Munkatársaink', 'the-theme'),
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
	            'register_meta_box_cb' => array('MembersPostType', 'add_metabox')               
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
	    
	    static function add_metabox(){
		    add_meta_box('members-options', __('Munkatárs adatok'), array('MembersPostType', 'metabox'), 'member','side');
	    }
	    
	    static function metabox($post){
		   	// Add an nonce field so we can check for it later.
			wp_nonce_field( 'post-type-options', 'post-type-options_nonce' );
						
			$fieldblocks = self::get_fields();		
			
			if (!empty($fieldblocks)){
				
				echo '<div class="field-block">';
				echo '<h2>Alapadatok</h2>';
				foreach ($fieldblocks['data'] as $key => $field){		
					echo '<div class="field-holder">';
					echo '<label>' .$field['label']. '</label>';
					echo '<input type="' .$field['type']. '" class="admin-meta-input ' .$field['class']. '" name="' .$key. '" value="' .get_post_meta( $post->ID, $key, true ). '" />';			
					echo "</div>";
				}
				echo '</div>';				
		
				echo '<div class="field-block">';
				echo '<h2>Elérhetőségek</h2>';
				foreach ($fieldblocks['contact'] as $key => $field){		
					echo '<div class="field-holder">';
					echo '<label>' .$field['label']. '</label>';
					echo '<input type="' .$field['type']. '" class="admin-meta-input ' .$field['class']. '" name="' .$key. '" value="' .get_post_meta( $post->ID, $key, true ). '" />';			
					echo "</div>";
				}
				echo '</div>';
			}
			
	    }       
	    
	 }
	 
	 MembersPostType::load();
 }


