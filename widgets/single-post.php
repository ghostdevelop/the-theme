<?php
/**
 * Plugin Name: Single Post
 * Plugin URI: 
 * Description: Display a single post in your sidebar
 * Version: 1.0.0
 * Author: Ghost
 * Author URI: 
 * Text Domain: the-theme
 * Domain Path: Optional. Plugin's relative directory path to .mo files. Example: /locale/
 * Network:true
 * License:GPL2
 */


class SinglePostWidget extends WP_Widget {


/* ------------------------------------------------
	Widget Setup
------------------------------------------------ */

    public function __construct() {
		$widget_ops = array(
		    'classname' => 'single-post-widget',
		    'description' => __('Single Post Widget', 'the-theme')
        );

		parent::__construct( 'single-post-widget', __('Single Post Widget', 'the-theme'), $widget_ops );
	}

/* ------------------------------------------------
	Display Widget
------------------------------------------------ */
	
	function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;
		 global $post; 
			
			$args = array(
					'post_type'=> 'any',
					'p' => $instance['selected_post']
				);

			$loop = new WP_Query($args);

			if($loop->have_posts()) : ?>
				<?php while($loop->have_posts()) : $loop->the_post(); ?>
					<?php if (isset($instance['disable_link']) && $instance['disable_link'] != false): ?>
						<a href="<?php the_permalink();?>">
					<?php endif;?>
						<?php if($instance['thumbnail']!=''){ the_post_thumbnail(); }?>
						<div class="widget-content">
							<?php if($instance['title']!=''){ ?><h4> <?php the_title(); ?></h4><?php }?>
							<?php if($instance['excerpt']!=''){ the_excerpt(); }?>
						</div>
					<?php if (isset($instance['disable_link']) && $instance['disable_link'] != false): ?>
						</a>
					<?php endif;?>
					<?php if(!isset($instance['button']) or $instance['button'] == ''):?>
						<a href="<?php echo (isset($instance['button_url']) ? $instance['button_url'] : get_the_permalink())?>" class="link">
							<?php _e('Jelentkezem', 'the-theme')?>
						</a>
					<?php endif?>
				<?php endwhile;?>
			<?php else : ?>

				<p><?php _e('<h4>No post selected yet </h4>','the-theme'); ?></p>
			
			<?php endif;
		
		echo $after_widget;
	}	
	
	
/* ------------------------------------------------
	Update Widget
------------------------------------------------ */
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['selected_post'] = ( ! empty( $new_instance['selected_post'] ) ) ? strip_tags( $new_instance['selected_post'] ) : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['thumbnail'] = ( ! empty( $new_instance['thumbnail'] ) ) ? strip_tags( $new_instance['thumbnail'] ) : '';
		$instance['excerpt'] = ( ! empty( $new_instance['excerpt'] ) ) ? strip_tags( $new_instance['excerpt'] ) : '';
		$instance['button'] = ( ! empty( $new_instance['button'] ) ) ? strip_tags( $new_instance['button'] ) : '';
		$instance['button_url'] = ( ! empty( $new_instance['button_url'] ) ) ? strip_tags( $new_instance['button_url'] ) : '';
		$instance['disable_link'] = ( ! empty( $new_instance['disable_link'] ) ) ? strip_tags( $new_instance['disable_link'] ) : '';
		return $instance;
	}
	
	
/* ------------------------------------------------
	Widget Input Form
------------------------------------------------ */
	 
	function form( $instance ) { 
		$defaults = array(
		'selected_post' => '0',
		'title' => '',
		'thumbnail' => '',
		'button' => '',
		'button_url' => '',
		'excerpt' => '',
		'disable_link' => false
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'selected_post' ); ?>"><?php _e('Select your post:', 'the-theme'); ?></label>
			<select style="width: 100%;" id='<?php echo $this->get_field_id( 'selected_post' ); ?>' name="<?php echo $this->get_field_name( 'selected_post' ); ?>" >
				<?php $args=array(
						'post_type' => 'any',
						'posts_per_page' => -1
				);
				$wp_query = new WP_Query($args);
				if($wp_query->have_posts()):
						while($wp_query->have_posts()):$wp_query->the_post();
								?>
								<option value="<?php echo get_the_ID();?>" <?php echo ($instance['selected_post']==get_the_ID())?'selected':''; ?>><?php the_title();?></option>
								<?php
						endwhile;
				endif;?>
			</select>
		</p>

		<p>
		<h4><?php _e('Choose the layout options:', 'the-theme') ?></h4>
			<label for="<?php echo $this->get_field_id( 'thumbnail' ); ?>"><?php _e('Show thumbnail:', 'the-theme') ?></label>
			<input type="checkbox" class="widefat" id="<?php echo $this->get_field_id( 'thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" value="thumbnail" <?php echo ($instance['thumbnail']=='thumbnail')?'checked':''; ?> />
			
			<label for="<?php echo $this->get_field_id( 'disable_link' ); ?>"><?php _e('Disable link:', 'the-theme') ?></label>
			<input type="checkbox" class="widefat" id="<?php echo $this->get_field_id( 'disable_link' ); ?>" name="<?php echo $this->get_field_name( 'disable_link' ); ?>" value="disable_link" <?php echo ($instance['disable_link']=='disable_link')?'checked':''; ?> />
		
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Post title:', 'the-theme') ?></label>
			<input type="checkbox" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="title" <?php echo ($instance['title']=='title')?'checked':''; ?> />

			<label for="<?php echo $this->get_field_id( 'excerpt' ); ?>"><?php _e('Post excerpt:', 'the-theme') ?></label>
			<input type="checkbox" class="widefat" id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" value="excerpt" <?php echo ($instance['excerpt']=='excerpt')?'checked':''; ?> />	
			
			<label for="<?php echo $this->get_field_id( 'button' ); ?>"><?php _e('Button:', 'the-theme') ?></label>
			<input type="checkbox" class="widefat" id="<?php echo $this->get_field_id( 'button' ); ?>" name="<?php echo $this->get_field_name( 'button' ); ?>" value="excerpt" <?php echo ($instance['button']=='button')?'checked':''; ?> />	
			
			<label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php _e('Button URL:', 'the-theme') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_url' ); ?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" value="<?php echo $instance['button_url'] ?>"/>				
		</p>
		
	<?php
	}	
	
}

// Add widget function to widgets_init
add_action( 'widgets_init', 'sinlge_post_widget_init' );

// Register Widget
function sinlge_post_widget_init() {
	register_widget( 'SinglePostWidget' );
}