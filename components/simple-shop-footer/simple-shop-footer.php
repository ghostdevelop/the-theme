<?php $SimpleShopFooter = new SimpleShopFooter($options)?>
<div id="<?php echo $SimpleShopFooter->id?>" class="<?php echo $SimpleShopFooter->type?>">
	<div class="footer-top">
		<div class="container">
			<div class="logo-holder">
				<a href="<?php echo home_url()?>">			
					<img class="logo" src="<?php echo get_option('logo')?>" />
				</a>
			</div>
			<div class="navigation-holder">
				<?php 
					wp_nav_menu( array(
					    'menu' => $options['menu'],
					    'container' => '',
					    'items_wrap' => '<ul id="' . $SimpleShopFooter->id . '-menu" class="%2$s">%3$s</ul>'
					) );	
				?>    
			</div>
		</div>
	</div>	
	<div class="footer-bottom">
		<div class="container">
			<p class=""><span id="copyright-year">© <?php echo date("Y"); ?> <?php _e('All Rights Reserved', 'the-theme')?></span></p>
			<ul class="list-inline pull-sm-right offset-3">
				<li><a href="#" class="fa fa-facebook"></a></li>
				<li><a href="#" class="fa fa-twitter"></a></li>
				<li><a href="#" class="fa fa-pinterest-p"></a></li>
				<li><a href="#" class="fa fa-vimeo"></a></li>
				<li><a href="#" class="fa fa-google"></a></li>
				<li><a href="#" class="fa fa-rss"></a></li>
			</ul>		
		</div>	
	</div>	
</div>