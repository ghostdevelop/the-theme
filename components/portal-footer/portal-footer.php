<?php $PortalFooter = new PortalFooter($options);?>
<div id="portal-footer">
    <div class="container-fluid">
	    <div class="container footer-sidebar">
	    	<div class="row">
				<div class="col-md-4 col-xs-12"><?php dynamic_sidebar('footer-sidebar-1') ?></div>			
				<div class="col-md-4 col-xs-12"><?php dynamic_sidebar('footer-sidebar-2') ?></div>			
				<div class="col-md-4 col-xs-12"><?php dynamic_sidebar('footer-sidebar-3') ?></div>
	    	</div>			
	    </div>
    </div>
    <div class="container-fluid">
	    <div class="container footer">
		    <div class="block-logo">
			    <img src="<?php echo get_option('logo')?>" />
		    </div>    
	        <div class="block-copyright">    
				© 2016 News King, Inc. All Rights Reserved. 
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