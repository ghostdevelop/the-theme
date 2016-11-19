<?php $PortalHeader = new PortalHeader($options)?>
<div id="<?php echo $PortalHeader->id?>" class="<?php echo $PortalHeader->type?>">
	<div class="container-fluid">
	    <div class="container top">
	        <div class="block-date">
				MindenÓbudán - A III. Kerület Interaktív Térképe  |  2016 november 15. kedd - Albert napja
	        </div>
	
	        <div class="block-register">
				<?php 
					wp_nav_menu( array(
					    'theme_location' => $options['register-menu'],
					    'container' => '',
					    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
					) );	
				?>    
	        </div>
	
	        <div class="block-search">
				<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				    <label>
				        <input type="search" class="search-field"
				            placeholder="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"
				            value="<?php echo get_search_query() ?>" name="s"
				            title="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
				    </label>
					<button type="submit" name="search-submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
	        </div>
	    </div>
	    <div class="container menu">
		    <div class="block-logo">
			    <img src="http://ld-wp.template-help.com/wordpress_58404_v3/wp-content/themes/king-news/assets/images/logo.png" />
		    </div>
		    <div class="block-menu">
				<?php 
					wp_nav_menu( array(
					    'theme_location' => $options['top-menu'],
					    'container' => '',
					    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
					) );	
				?>    
		    </div>
			<div class="block-social">
		        <ul id="social-list" class="">
		            <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
		            <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		            <li><a href=""><i class="fa fa-rss" aria-hidden="true"></i></a></li>
		        </ul>		
			</div>	    
	    </div>
    </div>
</div>