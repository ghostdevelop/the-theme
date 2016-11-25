jQuery('.portfolio-navigation li a').click(function(){
	if (!jQuery(this).hasClass('active')){
		jQuery('.portfolio-navigation li a').removeClass();
		jQuery(this).addClass('active');
		jQuery('#iframe-holder').removeClass();
		var cls = jQuery(this).data('class');
		var height = jQuery(this).data('height');
		var width = jQuery(this).data('width');	
		
		jQuery('#portfolio-item iframe').animate({height:height, width:width}, function(){
			jQuery('#iframe-holder').addClass(cls)
		});
	}
});