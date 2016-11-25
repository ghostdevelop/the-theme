jQuery(document).ready(function($){
	$('#' + SimpleHeader.id + '-menu').slicknav({
		brand: ''
	}).superfish();
	$('.slicknav_menu').prepend($('.simple-header img.logo').clone());	
});