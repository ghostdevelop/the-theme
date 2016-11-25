<?php
 if (!class_exists('MembersPostType')){ 
	class MembersPostType {
	
	
	    static $fields = array();	
	    /**
	    * hooks
	    */
	    public static function load() {
	        add_action('init', array('MembersPostType', 'register'));
	        add_action( 'save_post', array('MembersPostType', 'save_metabox' ) );      
	
	    }
	
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
		    add_meta_box('flat-options', __('Munkatárs adatok'), array('MembersPostType', 'metabox'), 'member','side');
	    }
	    
	    static function metabox($post){
		   	// Add an nonce field so we can check for it later.
			wp_nonce_field( 'flat-options', 'flat-options_nonce' );
			
			echo '<style>';
			echo '.admin-meta-input{display:block; margin-top: 10px;}';
			echo 'div.field-holder{display: block;float: left; margin: 10px 20px; height: 80px;}';
			echo '.field-block{display: inline-block;clear: both;float: none;}';
			echo '.postbox .inside .field-block h2{padding: 8px 12px;font-weight: 600;font-size: 18px;margin: 0;line-height: 1.4}';
			echo '</style>';
						
			$fieldblocks = self::get_fields();		
			
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
	    
	    static function save_metabox($post_id){
			// Check if our nonce is set.
			if ( ! isset( $_POST['flat-options_nonce'] ) )
				return $post_id;
	
			$nonce = $_POST['flat-options_nonce'];
	
			// Verify that the nonce is valid.
			if ( ! wp_verify_nonce( $nonce, 'flat-options' ) )
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
	
			$fieldblocks = self::get_fields();;
			
			foreach ($fieldblocks as $key => $fields){
				foreach ($fields as $key => $field){			
					if ($field['type'] == "text") $value = sanitize_text_field($_POST[$key]);
					if ($field['type'] == "number") $value = (int) $_POST[$key];
					
					update_post_meta( $post_id, $key, $value );
				}
			}	
		    
	    }
	       
	    
	 }
	 
	 MembersPostType::load();
 }


