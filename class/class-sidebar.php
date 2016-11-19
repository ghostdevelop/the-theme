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
				unregister_widget("SiteOrigin_Panels_Widgets_PostLoop");	        // Tag Cloud Widget
				unregister_widget("SiteOrigin_Panels_Widgets_PostContent");	        // Tag Cloud Widget

							
				if (class_exists("WebcreativesHeadlineWidget")) register_widget("WebcreativesHeadlineWidget");	      
				if (class_exists("WebcreativesContactWidget")) register_widget("WebcreativesContactWidget");	      
				if (class_exists("WebcreativesLoginWidget")) register_widget("WebcreativesLoginWidget");	   
				//if (class_exists("WebcreativesTag_Cloud")) register_widget("WebcreativesTag_Cloud");	      
				if (class_exists("WebcreativesPostLoopWidget")) register_widget("WebcreativesPostLoopWidget");
				if (class_exists("WebcreativesCustomPostWidget")) register_widget("WebcreativesCustomPostWidget");
				if (class_exists("WebcreatviesChainsWidget")) register_widget("WebcreatviesChainsWidget");	     
			
			}	
			
			static function sidebar_setup() {
			
				register_sidebar( array(
					'name' => 'Right sidebar',
					'id' => 'right-sidebar',
					'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
					'after_widget' 		=> '</div>',
					'before_title'		=> '<div class="widget-title"><h3>',
					'after_title' 		=> '</h3></div>',
				) );			
				
				register_sidebar( array(
					'name' => 'Footer sidebar 1',
					'id' => 'footer-sidebar-1',
					'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
					'after_widget' 		=> '</div>',
					'before_title'		=> '<div class="widget-title"><h3>',
					'after_title' 		=> '</h3></div>',
				) );
				
				register_sidebar( array(
					'name' => 'Footer sidebar 2',
					'id' => 'footer-sidebar-2',
					'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
					'after_widget' 		=> '</div>',
					'before_title'		=> '<div class="widget-title"><h3>',
					'after_title' 		=> '</h3></div>',
				) );
				
				register_sidebar( array(
					'name' => 'Footer sidebar 3',
					'id' => 'footer-sidebar-4',
					'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
					'after_widget' 		=> '</div>',
					'before_title'		=> '<div class="widget-title"><h3>',
					'after_title' 		=> '</h3></div>',
				) );																				
			}		
							    				    	    				
		}
		
	}
	
	ClassSidebar::load();
