// This is the map.js file for INFO263 by GroupDev N

// Initialising variables
var markers = [];
var map;
var icon = 'https://www.google.co.nz/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&ved=0ahUKEwjMuNvpxvLWAhWmwFQKHTJGC2MQjBwIBA&url=http%3A%2F%2Ffiles.softicons.com%2Fdownload%2Fweb-icons%2Fawt-travel-blue-icons-by-awt-media%2Fpng%2F200x200%2FAWT-Bus.png&psig=AOvVaw12sGHNd4YF8EZ6WcsPgL4V&ust=1508154117055894';
// Function to intialise the map        
function initMap() {
	// We have the variable auckland set up with its long/lat values so the the default centering of the map is on the city of Auckland
	var auckland = {lat: -36.849316, lng: 174.766249};
	map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 12,
	  center: auckland
	});
}

// This function refreshes the map so that updated markers can be seen
function refreshMap() {
	google.maps.event.trigger(map, 'resize');
}

// Function to set markers on the map
function setMapOnAll(map) {
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
    }
}

// Function that deletes the markers on the map by calling the function setMapOnAll(null)
function deleteMarkers() {
	setMapOnAll(null);
	markers = [];
}

// This is the API Query function that we use to get information about the buses
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
				// We are splitting the response from the API and adding it to an array
				vehicle_array = response.innerHTML.split("},{");
				vehicle_array[0] = vehicle_array[0].substr(2);
				vehicle_array[vehicle_array.length-1] = vehicle_array[vehicle_array.length-1].slice(0, (vehicle_array[vehicle_array.length-1].length-2));
				alert(vehicle_array[0]);
				alert(vehicle_array[vehicle_array.length-1]);
				alert(vehicle_array.length);
				deleteMarkers();
				// Initialising variables
				var lngN;
				var commaPos;
				var latN;
				var latLng;
				var marker;
				// For loop to assign the variables required to get the information we need
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
					markers.push(marker);
				}
			}
		}
		ajaxRequest.open("GET", "vehicle_query.php?r=" + query_route, true);
		ajaxRequest.send();
	} else {
		deleteMarkers();
	}
}

setInterval(function(){
	apiQuery()}, 30000);
       