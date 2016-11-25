jQuery("#map-" + GoogleMapFeed.id).gMap({ 
	latitude: GoogleMapFeed.center.lat, 
	longitude: GoogleMapFeed.center.lng,
	maptype: "ROADMAP", 
	zoom: 16, 
	scrollwheel: false, 
	styles: style,
	doubleClickZoom: true, 
	controls: {
		panControl: true, 
		zoomControl: true, 
		mapTypeControl: true, 
		scaleControl: true, 
		streetViewControl: true, 
		overviewMapControl: true, 
	},
	markers: GoogleMapFeed.locations
}); 

jQuery('.remove').click(function(){
	jQuery('#map-google-map-feed-1').gMap('clearMarkers');
})
					
