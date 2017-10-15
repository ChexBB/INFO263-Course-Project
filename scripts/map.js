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
				markers.push(marker);
			}
   		}
   	}
    ajaxRequest.open("GET", "vehicle_query.php?r=" + query_route, true);
    ajaxRequest.send();
	
}

//function to add markers for each bus
//@param busLocations array containing all the buses to be displayed
//need to call from processJSON somehow? 
/**function showVehicles(busLocation) {
    var bounds = new google.maps.LatLngBounds();

    //removes of all existing markers
    markers.forEach(function (clear) {
        clear.setMap(null);
    });

    busLocation.forEach(function (bus) {
        var busMarker = new google.maps.Marker({
            position: { lat: bus.latitude, lng: bus.longitude },
            title: 'Bus: ' + bus.vehicle_id, map: map;
        }); **/
       