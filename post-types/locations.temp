<?php
class LocationsPostType {

    /**
    * hooks
    */
    public static function load() {
        add_action('init', array('LocationsPostType', 'register'));
        add_action( 'save_post', array('LocationsPostType', 'save_metabox' ) );
        //add_action('save_post', array(&$this, 'save_metabox'), 1, 2); // save the custom fields

    }

    /**
    * admin_init action
    */
    static function init() {

    }

    /**
    * register Custom Post Type
    */
    static function register() {
        // register the post type
        register_post_type('location', array(
		
			'labels'=> array(
				'name'               => _x( 'Helyszínek', 'the-theme' ),
				'singular_name'      => _x( 'Helyszín', 'the-theme' ),
				'menu_name'          => _x( 'Helyszínek',  'the-theme' ),
				'name_admin_bar'     => _x( 'Helyszín',  'the-theme' ),
				'add_new'            => _x( 'Új helyszín',  'the-theme' ),
				'add_new_item'       => __( 'Új helyszín hozzáadása', 'the-theme' ),
				'new_item'           => __( 'Új helyszín', 'the-theme' ),
				'edit_item'          => __( 'Helyszín szerkesztése', 'the-theme' ),
				'view_item'          => __( 'Helyszín megtekintése', 'the-theme' ),
				'all_items'          => __( 'Összes helyszín', 'the-theme' ),
				'search_items'       => __( 'Helyszín keresése', 'the-theme' ),
				'parent_item_colon'  => __( 'Parent helyszín:', 'the-theme' ),
				'not_found'          => __( 'Nincsenek helyszínek.', 'the-theme' ),
				'not_found_in_trash' => __( 'Nincsenek helyszínek a kukában.', 'the-theme' )
			),
            'description' => __('Helyszínek', 'the-theme'),
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
            'register_meta_box_cb' => array('LocationsPostType', 'add_metabox')               
        ));
    }
    
    static function add_metabox(){
	    add_meta_box('flat-options', __('Helyszín adatok'), array('LocationsPostType', 'metabox'), 'location','side');
    }
    
    static function metabox($post){
	   	// Add an nonce field so we can check for it later.
		wp_nonce_field( 'flat-options', 'flat-options_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
		$lat = get_post_meta( $post->ID, '_lat', true );
		$lng = get_post_meta( $post->ID, '_lng', true );
		$address = get_post_meta( $post->ID, 'address', true );
		
		echo '<style>';
		echo '.admin-meta-input{display:block; margin-top: 10px;}';
		echo '</style>';
		
		echo '<label>' . __('Cím:') . '</label>';
		echo '<input type="text" class="admin-meta-input" name="address" value="'.$address.'" />';
		echo '<br clear="all">';

		echo '<label>' . __('Latitude:') . '</label>';
		echo '<input type="text" class="admin-meta-input" name="_lat" value="'.$lat.'" />';
		echo '<br clear="all">';		
				
		echo '<label>' . __('Longitude:') . '</label>';
		echo '<input type="text" class="admin-meta-input" name="_lng" value="'.$lng.'" />';
		echo '<br clear="all">';
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

		// Sanitize the user input.
		$lat = (int) $_POST['_lat'];
		$lng = sanitize_text_field( $_POST['_lng'] );
		$size = (int) $_POST['size'];

		// Update the meta field.
		update_post_meta( $post_id, '_lat', $lat );
		update_post_meta( $post_id, '_lng', $lng );
		update_post_meta( $post_id, 'size', $size );
	    
    }  
    
 }

 LocationsPostType::load();

