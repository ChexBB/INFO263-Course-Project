<?php //database.php
require_once 'include/config.php';
require_once 'requests.php';
require_once 'database.php';

/**

$url = "https://api.at.govt.nz/v2/public/realtime/vehiclelocations";
# if we had query parametets say, trip_ids, we would include an array of them like below

$route_ids = array("09151-20170928152758_v59.3");
$params = array("routeid" => $route_ids);
# $params = array();
$results = apiCall($APIKey, $url, $params);
// Tell the browser we are sending back json
header('Content-Type: application/json');
echo $results[0];

**/


function processJSON($json)
{
	$allBusses = array();
	$length = count($json);
	
	#loop to iterate all trips on a route
	for($i = 0; $i < $length; $i++){
		$busInfo = json_decode($json[$i]);
		#iterate through busses on the trip
		for($j = 0; $j < count($busInfo); $j++) {
			$id = $busData[$j]->vehicle->vehicle->id;
			$longitude = $busData[$j]->vehicle->vehicle->longitude;
			$latitude = $busData[$j]->vehicle->vehicle->latitude;
			
			array_push($allBusses, array('id' => $id, 'long' => $longitude, 'lat' => $latitude));
		}
		
	}
	return($allBusses);
}

if(isset($_REQUEST["r"]))
{
	$param = $_REQUEST["r"];
	echo $param;
	/**#SQL statement to get trip ID
	$query = $conn->prepare('SELECT DISTINCT trip_id FROM trips, routes WHERE routes.route_id = trips.route_id AND routes.route_short_name = '".$param."' ');
	$query->bind_param('s', $param);
	$query->execute();
	$result = $query->get_result();
	$trips = getTripIds($result); #what is this function?
	$conn->close();

	$trip_array = array("tripid" -> $trips);
	$apiJSOn = apiCall($APIKey, $url, $trip_array);
	$busArray = processJSON($apiJSON);
	$busJSON = json_encode($busArray);
	header('Content-Type: application/json');
	echo "This is printing from vehicle_query.php";
	echo($busJSON);**/
}

?>