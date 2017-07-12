<?php
/** 
 * The Class.
 */
class GalleryMetabox {

	/**
	 * Hook into the appropriate actions when the class is constructed.
	 */
	public function __construct() {
		add_action('admin_enqueue_scripts', array(&$this, 'admin_scripts'));			
		add_action('admin_notices', array(&$this, 'admin_notice'));				
		add_action( 'wp_ajax_upload_image',  array(&$this, 'upload_image_callback') );
		add_action( 'wp_ajax_remove_image',  array(&$this, 'remove_image_callback') );
		add_action('add_meta_boxes', array( $this, 'add_metabox' ) );
	}
	
	public function add_metabox(){
	    add_meta_box('post_gallery',__( 'Galéria', 'the-theme' ), array(&$this, 'metabox') , 'page','normal' ,'high'	);
	}
		
	
	public function admin_scripts(){
		wp_enqueue_script( 'jquery-gallery_metabox', get_template_directory_uri().'/js/gallery_metabox.js', array('jquery') );   
		wp_enqueue_style( 'gallery_metabox', get_template_directory_uri().'/css/gallery_metabox.css');   
	}
	
	public function admin_notice() {
		global $current_user ;
		$error = false;
		
		$files = array('/js/gallery_metabox.js', '/css/gallery_metabox.css');
		
		foreach ($files as $f){			
			$file = get_template_directory().$f;			
			if (!file_exists($file)){
				$error = true;
				$filename = $f;
			}
		}
	    
		if ($error) {
	        echo '<div class="error"><p>'; 
	        _e('Youtube videók metaboxhoz '.$filename.' hiányzik!');
	        echo "</p></div>";
		}
	}	
	
	public function upload_image_callback(){
		foreach ($_POST['attachment'] as $attachment){
			$array[$attachment['id']] = array(
										'id' => $attachment['id'],									
										'title' => $attachment['title'],									
										'url' => $attachment['url'],									
										'thumb' => $attachment['sizes']['thumbnail']['url'],									
									);
		}
		
		$id = (int) $_POST['id'];
		$old = unserialize(get_post_meta($id, 'gallery', true));

		if (is_array($old)){
			$attachments = $old + $array;			
		} else {
			$attachments = $array;
		}
		update_post_meta($id, 'gallery', serialize($attachments));
		
		foreach ($array as $img){
			$this->the_img($img, $id);
		}
		
		die();	
	}
	
	public function remove_image_callback(){
		$id = (int) $_POST['id'];
		$imgid = (int) $_POST['imgid'];
		
		$old = unserialize(get_post_meta($id, 'gallery', true));
		
		unset($old[$imgid]);
			
		update_post_meta($id, 'gallery', serialize($old));
	
		foreach ($old as $img){
			$this->the_img($img, $id);
		}
		echo '<br class="clear" clear="all">';
		
		die();
	}

	public function metabox( $post ) {
		$old = unserialize(get_post_meta($post->ID, 'gallery', true));
		?>
		    <input id="post_id" type="hidden" size="36" name="post_id" value="<?=$post->ID?>" /> 
		    <input id="upload_image" type="hidden" size="36" name="ad_image" value="http://" /> 
		    <input id="upload_image_button" class="button" type="button" value="Képek feltöltése" />
		    <div id="gallery">
		    <?php if(is_array($old)): ?>
		    	<?php foreach ($old as $img): ?>
		    		<?php self::the_img($img); ?>
				<?php endforeach; ?>
			<?php endif; ?>
				<br clear="all" class="clear">		   
		    </div>

		<?php
	}
	
	public function the_img($img, $id = false){
		global $post;
		if (!$id) $id = $post->ID;
		
		echo '<div class="item">';
		echo '<div class="control">';
		echo '<div class="buttons">';
		echo '<a href="'.$img['url'].'"><div class="dashicons dashicons-search"></div></a>';
		echo '<a class="image_delete" data-id="'.$id.'" data-imgid="'.$img['id'].'"><div class="dashicons dashicons-trash"></div></a>';
		echo '<br clear="all">';
		echo '</div>';
		echo '</div>';
		echo '<img id="up_image" src="'.$img['thumb'].'" title="'.$img['title'].'"/>';
		echo '</div>';
	}
}

$GalleryMetabox = new GalleryMetabox();
