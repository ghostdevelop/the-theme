<?php $ShopLineHeader = new ShopLineHeader($options)?>
<div id="<?php echo $ShopLineHeader->id?>" class="<?php echo $ShopLineHeader->type?>">
	<div id="header-bottom">
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
					    'items_wrap' => '<ul id="' . $ShopLineHeader->id . '-menu" class="%2$s sf-menu">%3$s</ul>'
					) );	
				?>    
			</div>
			<?php if (function_exists('pll_the_languages')):?>
				<div class="language-switcher">
					<ul><?php pll_the_languages(array('hide_current' => true, 'show_names' => false, 'show_flags' => true));?></ul>				
				</div>	
			<?php endif;?>
			<?php echo woocommerce_mini_cart() ?>			
		</div>
	</div>
</div>