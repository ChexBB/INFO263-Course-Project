<?php //database.php
require_once 'include/config.php';
require_once 'requests.php';

$url = "https://api.at.govt.nz/v2/public/realtime/vehiclelocations";
# if we had query parametets say, trip_ids, we would include an array of them like below

$route_ids = array("09151-20170928152758_v59.3");
$params = array("routeid" => $route_ids);
# $params = array();
$results = apiCall($APIKey, $url, $params);
// Tell the browser we are sending back json
header('Content-Type: application/json');
print $results[0];




?>