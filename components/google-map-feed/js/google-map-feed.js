jQuery("#map-" + GoogleMapFeed.id).gMap({ 
	latitude: GoogleMapFeed.center.lat, 
	longitude: GoogleMapFeed.center.lng,
	maptype: "ROADMAP", 
	zoom: 16, 
	scrollwheel: false, 
	styles: style,
	doubleClickZoom: true, 
	controls: {
		panControl: false, 
		zoomControl: true, 
		mapTypeControl: false, 
		scaleControl: false, 
		streetViewControl: false, 
		overviewMapControl: false, 
	},
	markers: GoogleMapFeed.locations
}); 

jQuery('.remove').click(function(){
	jQuery("#map-" + GoogleMapFeed.id).gMap('clearMarkers');
})
					
