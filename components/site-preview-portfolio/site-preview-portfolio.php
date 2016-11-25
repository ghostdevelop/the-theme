<?php $PortalHeader = new PortalHeader($options)?>
<div id="<?php echo $PortalHeader->id?>" class="<?php echo $PortalHeader->type?>">
	<?php if (have_posts()): the_post(); ?>
		<div id="navigation" class="container-fluid">
			<div class="container">
				<div class="navbar">
					<div class="page-title-block">
						<h1><?php _e('Website Portfolio', 'the-theme')?></h1>
						<span class="item-title"><?php the_title()?></span>
					</div>
					<nav>
						<ul class="portfolio-navigation">
							<li><a data-width="414px" data-height="714px" data-class="mobile"><i class="fa fa-mobile" aria-hidden="true"></i></a></li>
							<li><a data-width="1024px" data-height="768px" ><i class="fa fa-tablet" aria-hidden="true"></i></a></li>
							<li><a data-width="100vw" data-height="100vh" ><i class="fa fa-laptop" aria-hidden="true"></i></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<div id="portfolio-item" class="container-fluid">
			<div class="row">
				<div id="iframe-holder">
					<iframe src="http://korker.webcreatives.hu" ></iframe>	
				</div>
			</div>
		</div>	
	<?php endif;?>
</div>