<?php $SimpleFooter = new SimpleFooter($options)?>
<div id="<?php echo $SimpleFooter->id?>" class="<?php echo $SimpleFooter->type?>">
	<div class="container-fluid footer-top">
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
					    'items_wrap' => '<ul id="' . $SimpleFooter->id . '-menu" class="%2$s">%3$s</ul>'
					) );	
				?>    
			</div>
		</div>
	</div>	
	<div class="container-fluid footer-bottom">
		<div class="container">
			<p class=""><span id="copyright-year">© 2016 All Rights Reserved</span> <a href="terms.html">Terms of Use and Privacy Policy</a></p>
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