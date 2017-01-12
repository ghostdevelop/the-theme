<?php 
	if(!class_exists('SimpleShopHeader')) {
	
	    class SimpleShopHeader extends Component{
	    
	    	function load($footer = false){

				$this->get_style('slicknav.min', '/css/slicknav.min.css');
				$this->get_style('superfish', '/css/superfish.css');
				wp_enqueue_script( 'modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', array('jquery'), '1.0.0', true );				
				$this->get_script('jquery.slicknav', '/js/jquery.slicknav.js');
				$this->get_script('hoverIntent', '/js/hoverIntent.js');
				$this->get_script('superfish', '/js/superfish.js');
				add_filter( 'wp_nav_menu_items', array(&$this, 'loginout_menu_link'), 10, 2 );	
		    	parent::load();
		    	
		    	
	    	}	
	    			
			function loginout_menu_link( $items, $args ) {
			   if ($args->theme_location == 'registration-menu') {
			      if (is_user_logged_in()) {
			         $items .= '<li><a href="'. get_the_permalink(woocommerce_get_page_id('myaccount')) .'"><i class="fa fa-user"></i> '.__('My Account', 'the-theme').'</a></li>';
			         $items .= '<li><a href="'. wp_logout_url(home_url()) .'"><i class="fa fa-sign-out"></i> '.__('Logout', 'the-theme').'</a></li>';
			      } else {
			         $items .= '<li><a href="'. get_the_permalink(woocommerce_get_page_id('myaccount')) .'?action=login"><i class="fa fa-sign-in"></i> '.__('Log in', 'the-theme').'</a></li>';
			         $items .= '<li><a href="'. get_the_permalink(woocommerce_get_page_id('myaccount')) .'"><i class="fa fa-user-plus"></i> '.__('Register', 'the-theme').'</a></li>';
			         $items .= '<li><a href="'. wp_lostpassword_url() .'"><i class="fa fa-key"></i> '.__('Lost Password', 'the-theme').'</a></li>';
			      }
			   }
			   return $items;
			}	
		    
		}
		
	}