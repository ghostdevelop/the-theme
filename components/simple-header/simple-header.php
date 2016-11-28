<?php $SimpleHeader = new SimpleHeader($options)?>
<div id="<?php echo $SimpleHeader->id?>" class="<?php echo $SimpleHeader->type?>">
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
				    'items_wrap' => '<ul id="' . $SimpleHeader->id . '-menu" class="%2$s sf-menu">%3$s</ul>'
				) );	
			?>    
		</div>
	</div>
</div>