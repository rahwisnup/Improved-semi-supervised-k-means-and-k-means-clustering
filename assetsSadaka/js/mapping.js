google.maps.event.addDomListener(window, 'load', initialize_map);
	google.maps.event.addDomListener(window, "resize", function() {
 var center = map.getCenter();
 google.maps.event.trigger(map, "resize");
 map.setCenter(center); 
});
	function showmap()
	{						
		var place = placesAutocomplete.getPlace();
		if (!place.geometry)
		{
			return;
		}
		var lat = place.geometry.location.lat(),
		lng = place.geometry.location.lng();
	document.getElementById('lat').value=lat;
	document.getElementById('lng').value=lng;
	var map = new google.maps.Map(document.getElementById('map-canvas'), {
	    	center: {lat: lat, lng: lng},
	    	zoom: 13
	  	});

	  	placesAutocomplete.bindTo('bounds', map);
	  	var marker = new google.maps.Marker({
	    	map: map,
	    	draggable: true,
			title: "Drag Untuk mencari posisi",
	    	anchorPoint: new google.maps.Point(0, -29)
	  	});
		if (place.geometry.viewport) {
		      map.fitBounds(place.geometry.viewport);
		    } else {
		      map.setCenter(place.geometry.location);
		      map.setZoom(17);
		}

	    marker.setPosition(place.geometry.location);		
	    marker_0 = createMarker_map(marker);
			
				google.maps.event.addListener(marker_0, "dragend", function(event) {
					document.getElementById('lat').value = event.latLng.lat();
        			document.getElementById('lng').value = event.latLng.lng();
        			update_address(event.latLng.lat(),event.latLng.lng());
        			
				});

	}
	
	function update_address(lat,lng)
	{
		var geocoder = new google.maps.Geocoder;
		var latlng={lat: parseFloat(lat), lng: parseFloat(lng)};
		geocoder.geocode({'location': latlng}, function(results, status) {
	    if (status === google.maps.GeocoderStatus.OK) {
	      if (results[1]) {	        
	        document.getElementById('carilokasi').value=results[0].formatted_address;
	      } else {
	        window.alert('Tidak ada hasil pencarian');
	      }
	    } else {
	      window.alert('Geocoder error: ' + status);
	    }
	  });
	}
	
	function mylocation()
	{
		if (navigator.geolocation) {
	    	navigator.geolocation.getCurrentPosition(function(position) {
	      	var pos = {
	        	lat: position.coords.latitude,
	        	lng: position.coords.longitude
	      	};
	      	
  			var lat=position.coords.latitude;
  			var lng=position.coords.longitude;
	      	update_address(lat,lng);
	      	var map = new google.maps.Map(document.getElementById('map-canvas'), {
		    	center: {lat: lat, lng: lng},
		    	zoom: 13
		  	});
	      	var marker = new google.maps.Marker({
		    	map: map,
		    	draggable: true,
				title: "Drag Untuk mencari posisi",
		    	anchorPoint: new google.maps.Point(0, -29)
		  	});
		  	
		  	marker.setPosition(pos);		
	    	document.getElementById('lat').value = lat;
        	document.getElementById('lng').value = lng;
	    	map.setCenter(pos);
	    	
	    }, function() {
	      
	    });
	  	} else {	    
	    	alert('Browser tidak mendukung Geolocation');
	  	}
	}