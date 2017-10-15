<?php //database.php
//This is the vehicle_query.php file for INFO263 by GroupDev N
require_once 'include/config.php';
require_once 'requests.php';
require_once 'database.php';


function processJSON($json)
{
	$allBusses = array();
	#loop to iterate all trips on a route
	for($i = 0; $i < count($json); $i++){
		$busData = json_decode($json[$i]);
		if (is_object($busData->response)) {
			$busInfo = $busData->response->entity;
			#iterate through busses on the trip
			for($j = 0; $j < count($busInfo); $j++) {
				$id = $busInfo[$j]->vehicle->vehicle->id;
				$longitude = $busInfo[$j]->vehicle->position->longitude;
				$latitude = $busInfo[$j]-> vehicle->position->latitude;
				array_push($allBusses, array('id' => $id, 'longitude' => $longitude, 'latitude' => $latitude));
				
			}
		}
	}
	return($allBusses);
}

if(isset($_REQUEST["r"]))
{
	$param = $_REQUEST["r"];
	$trip_ids = getTripIds($conn, $param);
	$conn->close();
	
	$params = array("trip_id" => $trip_ids);
	$apiJSON = apiCall($APIKey, $url, $params);
	$busArray = processJSON($apiJSON);
	$busJSON = json_encode($busArray);
	header('Content-Type: application/json');
	//echo "All bus locations for route " . $param . ": ";
	echo $busJSON;
}

?>