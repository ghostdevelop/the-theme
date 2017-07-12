function copy_minicart(){
    if (jQuery(window).width() < 655 && !jQuery( "#mobilecart" ).length) {
    	jQuery('body').prepend('<div id="mobilecart_button"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></div>')
    	jQuery('body').prepend('<div id="mobilecart"></div>')
		jQuery('.header-cart').clone().appendTo('#mobilecart')

	   jQuery( "#mobilecart" ).dialog({
	   	  title: MobileCart.title,
	   	  draggable: false,
	      autoOpen: false,
	      show: {
	        effect: "blind",
	        duration: 1000
	      },
	      hide: {
	        effect: "explode",
	        duration: 1000
	      }
	    });
	 
	    jQuery( "#mobilecart_button" ).on( "click", function() {
	      jQuery( "#mobilecart" ).dialog( "open" );
	    });	
	    					
    } else {

    }					
}
							
jQuery(window).on('resize', function() {
	copy_minicart()
});			

				
jQuery(document).ready(function($) {	
	copy_minicart()		
});