var markers = [];
var map;

function initMap() {
	var auckland = {lat: -36.849316, lng: 174.766249};
	map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 12,
	  center: auckland
	});
}

function refreshMap() {
	google.maps.event.trigger(map, 'resize');
}


function setMapOnAll(map) {
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
    }
}


function deleteMarkers() {
	setMapOnAll(null);
	markers = [];
}


function apiQuery() {
	var query_route = $('#route_picker').val();
	if (query_route != "set") {
		var response;
		var ajaxRequest = new XMLHttpRequest();
		var vehicle_array;
		ajaxRequest.onreadystatechange = function(){
			if(ajaxRequest.readyState == 4){
				response = document.getElementsByTagName('body');
				response.innerHTML = ajaxRequest.responseText;
				alert(response.innerHTML);
				vehicle_array = response.innerHTML.split("},{");
				vehicle_array[0] = vehicle_array[0].substr(2);
				vehicle_array[vehicle_array.length-1] = vehicle_array[vehicle_array.length-1].slice(0, (vehicle_array[vehicle_array.length-1].length-2));
				alert(vehicle_array[0]);
				alert(vehicle_array[vehicle_array.length-1]);
				alert(vehicle_array.length);
				deleteMarkers();
				var lngN;
				var commaPos;
				var latN;
				var latLng;
				var marker;
				for (var i = 0; i <= vehicle_array.length-1; i++) {
					firstSemi = vehicle_array[i].indexOf(':');
					lngN = vehicle_array[i].indexOf(':',firstSemi+1)+1;
					commaPos = vehicle_array[i].indexOf(',', lngN+1)+1;
					latN = vehicle_array[i].indexOf(':',lngN+1)+1;
					latLng = {lat: parseFloat(vehicle_array[i].slice(latN, vehicle_array[i].length-1)), lng: parseFloat(vehicle_array[i].slice(lngN, commaPos))};
					marker = new google.maps.Marker({
						position: latLng,
						map: map
					});
					map.panTo(latLng);
					map.setZoom(11)
					markers.push(marker);
				}
			}
		}
		ajaxRequest.open("GET", "vehicle_query.php?r=" + query_route, true);
		ajaxRequest.send();
	}
}

setInterval(function(){
	apiQuery()}, 30000);
       