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

?>