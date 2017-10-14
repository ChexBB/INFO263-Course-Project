<?php
class vehicle
{
	var $id;
	var $longitude;
	var $latitude;

	function __construct($id, $longitude, $latitude)
    {
        $this->id = $id;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }
}

?>
