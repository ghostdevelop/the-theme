<?php 
	if(!class_exists('ClassSidebar')) {

	    class ClassSidebar {
	    
		    public static function load(){	
			    add_action( 'widgets_init', array('ClassSidebar', 'widgets_init' ));	
			    add_action( 'widgets_init', array('ClassSidebar', 'sidebar_setup') );		    
		    }
		    
			static function widgets_init() {
				unregister_widget("WP_Widget_Pages");       	 	// Pages Widget
				unregister_widget("WP_Widget_Calendar");    	 	// Calendar Widget
				//unregister_widget("WP_Widget_Archives");    	 	// Archives Widget
				unregister_widget("WP_Widget_Links");     		 	// Links Widget
				unregister_widget("WP_Widget_Meta");     	 	 	// Meta Widget
				unregister_widget("WP_Widget_Search");   	 	 	// Search Widget
				unregister_widget("WP_Widget_Categories");      	// Categories Widget
				unregister_widget("WP_Widget_Recent_Posts");    	// Recent Posts Widget
				unregister_widget("WP_Widget_Recent_Comments"); 	// Recent Comments Widget
				//unregister_widget("WP_Widget_RSS");    				// RSS Widget
				unregister_widget("WP_Widget_Tag_Cloud");	        // Tag Cloud Widget
			
			}	
			
			static function sidebar_setup() {
				register_sidebar( apply_filters('the_theme_home_sidebar_args', array(
					'name' => 'Home sidebar',
					'id' => 'home-sidebar',
					'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
					'after_widget' 		=> '</div>',
					'before_title'		=> '<div class="widget-title"><h3>',
					'after_title' 		=> '</h3><hr /></div>',
				) ) );	
				
				register_sidebar( apply_filters('the_theme_left_sidebar_args', array(
					'name' => 'Left Sidebar',
					'id' => 'left-sidebar',
					'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
					'after_widget' 		=> '</div>',
					'before_title'		=> '<div class="widget-title"><h3>',
					'after_title' 		=> '</h3><hr /></div>',
				) ) );	
				
				register_sidebar( apply_filters('the_theme_right_sidebar_args', array(
					'name' => 'Right sidebar',
					'id' => 'right-sidebar',
					'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
					'after_widget' 		=> '</div>',
					'before_title'		=> '<div class="widget-title"><h3>',
					'after_title' 		=> '</h3><hr /></div>',
				) ) );	
				
				register_sidebar( apply_filters('the_theme_footer_sidebar_args', array(
					'name' => 'Footer sidebar',
					'id' => 'footer-sidebar',
					'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
					'after_widget' 		=> '</div>',
					'before_title'		=> '<div class="widget-title"><h3>',
					'after_title' 		=> '</h3><hr /></div>',
				) ) );																				
			}		
							    				    	    				
		}
		
	}
	
	ClassSidebar::load();
