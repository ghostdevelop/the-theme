// Can also be used with $(document).ready()
jQuery(window).load(function() {
	console.log(Flexslider);
	jQuery('#' + Flexslider.id).flexslider(Flexslider.options);
});