jQuery(document).ready(function($){
	$('#' + SimpleShopHeader.id + '-menu').slicknav({
		brand: ''
	}).superfish();
	$('.slicknav_menu').prepend($('.simple-shop-header img.logo').clone());	
});