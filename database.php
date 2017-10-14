<?php
require_once 'include/config.php';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error)
{
    fatalError($conn->connect_error);
    return;
}

function fatalError($error)
{
    $message = mysql_error();
    echo <<< _END
Something went wrong :/

<p>$error: $message</p>
_END;
}

function populateRoutes($conn)
{
	$fetch_query = $conn->query("SELECT distinct routes.route_short_name FROM akl_transport.routes ORDER BY route_short_name ASC");
	if (!$result)
    {
        fatalError($conn->error);
    }
    else {
		//under-gwond	
		while ($row = $fetch_query->fetch_assoc()) {
			echo '<option value="'.$row['route_short_name'].'">'.$row['route_short_name'].'</option>';
		}
		
		$result ->close();
	}
}

function getTripIds($conn, $param)
{
	#SQL statement to get trip ID
	$results = array();
    $get_trip_query = "SELECT DISTINCT trip_id FROM trips JOIN routes on routes.route_id = trips.route_id WHERE routes.route_id = trips.route_id AND routes.route_short_name = '".$param."'";
    $result = $conn->query($get_trip_query);
    if (!$result)
    {
        fatalError($conn->error);
    }
    else {
        while ($row = $result ->fetch_array((MYSQLI_ASSOC))) {
			$trip = $row['trip_id'];
			$results = $trip;
		}

        $result->close();
    }
    return $results;
}

?>