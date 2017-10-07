<?php
require_once ('include/config.php');

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error)
{
    fatalError($conn->connect_error);
    return;
} else {
	echo "Connection success!"; /*For testing only*/
}

function fatalError($error)
{
    $message = mysql_error();
    echo <<< _END
Something went wrong :/

<p>$error: $message</p>
_END;
}

function accessRoutes($conn)
{
	$routes = array();
	$fetch_query = "SELECT routes.route_id, routes.route_short_name, routes.route_long_name
                    FROM akl_transport.routes";
	$dbroutes = $conn->query($fetch_query);
	return $dbroutes;
}


?>