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

function apiQuery() {
	var query_route = $('#route_picker').val();
	var response = "";
	alert(query_route); //test if route is selected
	//alert($.get("vehicle_query.php"));
	var xmlhttp = new XMLHttpRequest();
	    if (this.readyState == 4 && this.status == 200) {
	    	response = document.getElementByTagName("body").innerHTML = this.responseText;
	    	alert(response);
	    }
        xmlhttp.open("GET", "vehicle_query.php?r=" + query_route, true);
        xmlhttp.send();
	
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
       