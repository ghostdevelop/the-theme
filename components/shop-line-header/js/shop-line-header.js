jQuery(document).ready(function($){
	$('#' + ShopLineHeader.id + '-menu').slicknav({
		brand: ''
	}).superfish();
	$('.slicknav_menu').prepend($('.shop-line-header img.logo').clone());	
});