var style = [
    {
        "stylers": [
            {
                "saturation": -100
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#0099dd"
            }
        ]
    },
    {
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#aadd55"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {}
];
jQuery("#map-" + options.id).gMap({ 
	latitude: options.center.lat, 
	longitude: options.center.lng,
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
	markers: options.locations
}); 

jQuery('.remove').click(function(){
	jQuery('#map-google-map-feed-1').gMap('clearMarkers');
})
					
