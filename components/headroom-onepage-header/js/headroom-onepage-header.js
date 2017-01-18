jQuery(document).ready(function($){
	$('#' + HeadroomOnepageHeader.id).headroom();
	
	$('.headroom .toggle-menu').click(function(){
		$(this).next().children().slideToggle()
	})

	/**************  MOBILE *****************/
	
	if ($(window).width() <= 768) {
		$('.headroom-menu li.menu-item-has-children').click(function(){
			$(this).children('.sub-menu').slideToggle().toggleClass('opened')
		})
	}		
});