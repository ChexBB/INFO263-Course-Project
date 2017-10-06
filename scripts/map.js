function initMap() {
	var auckland = {lat: -36.849316, lng: 174.766249};
	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 12,
	  center: auckland
	});
	var marker = new google.maps.Marker({
	  position: auckland,
	  map: map
	});
}

function refreshMap() {
	google.maps.event.trigger(map, 'resize');
}
