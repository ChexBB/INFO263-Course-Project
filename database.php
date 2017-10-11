<?php
require_once ('include/config.php');

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
		
	while ($row = $fetch_query->fetch_assoc()) {
		echo '<option value="'.$row['route_short_name'].'">'.$row['route_short_name'].'</option>';
	}
}

?>