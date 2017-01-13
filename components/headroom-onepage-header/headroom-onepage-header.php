<?php $HeadroomOnepageHeader = new HeadroomOnepageHeader($options)?>
<div id="<?php echo $HeadroomOnepageHeader->id?>" class="<?php echo $HeadroomOnepageHeader->type?>">
	<header>
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
				    'items_wrap' => '<ul id="' . $HeadroomOnepageHeader->id . '-menu" class="%2$s headroom-menu">%3$s</ul>'
				) );	
			?>    
		</div>
	</div>
	</header>
</div>
