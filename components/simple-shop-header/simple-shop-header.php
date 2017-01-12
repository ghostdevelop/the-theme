<?php $SimpleShopHeader = new SimpleShopHeader($options)?>
<div id="<?php echo $SimpleShopHeader->id?>" class="<?php echo $SimpleShopHeader->type?>">
	<div class="container-fluid" id="header-top">
		<div class="container">
			<div class="header-search">
				<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'the-shop' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'the-shop' ) ?>" />
				    <button type="submit" class="search-submit <?php echo (isset($options['search_btn_class']) ? $options['search_btn_class'] : 'btn')?>" ><?php echo esc_attr_x( 'Search', 'the-shop' ) ?></button>
				</form>		
			</div>
			<?php echo woocommerce_mini_cart() ?>
			<div class="header-login">
				<?php wp_nav_menu(array( 
					'menu' => '', 
					'container' => '', 
					'items_wrap' => '<ul id="%1$s" class="%2$s links">%3$s</ul>',
					'theme_location' => 'registration-menu' 
				))?>				
			</div>			
		</div>
	</div>
	<div class="container-fluid" id="header-bottom">
		<div class="container">
			<div class="logo-holder">
				<a href="<?php echo home_url()?>">
					<img class="logo" src="<?php echo get_option('logo')?>" />
				</a>
			</div>
			<div class="navigation-holder">
				<?php 
					wp_nav_menu( array(
					    'theme_location' => $options['menu'],
					    'container' => '',
					    'items_wrap' => '<ul id="' . $SimpleShopHeader->id . '-menu" class="%2$s sf-menu">%3$s</ul>'
					) );	
				?>    
			</div>
		</div>
	</div>
</div>