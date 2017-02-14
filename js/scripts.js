jQuery(document).ready(function($){
	$('#preloader').fadeOut();
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});	
	
	if ($('.widget.collapseable').length){
		if ($(window).width() <= 768){	
			$('.widget.collapseable .widget-title').click(function(){
				$(this).next().slideToggle()
			})
		}
	}		

});

jQuery(window).resize(function($){
	if (jQuery('.widget.collapseable').length){
		if (jQuery(window).width() <= 768){	
			jQuery('.widget.collapseable .widget-title').click(function(){
				jQuery(this).next().slideToggle()
			})
		}
	}	
});

wow = new WOW(
  {
    animateClass: 'animated',
    offset:       100,
    callback:     function(box) {
      //console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
    }
  }
);
wow.init();
