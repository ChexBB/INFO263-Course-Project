<?php
$active = "home";
require_once 'include/header.php';
require_once 'database.php';

?>

<script>
    $(document).ready(function() {
		
    });
</script>

<html>
  <head>
  
	<link rel="stylesheet" href="CSS/master.css" type="text/css">
	<script async defer
	  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBajjU1EoGpVz0QKgSL2c_aS6vJDb8N5cA&callback=initMap">
	</script>
	<script src="scripts/map.js"></script>
	
  </head>
  
  <body>
	<div id="header">
  	
	<h1>GoBus Transport App</h1>
  	
	<select dropMenu Name='route_picker'> <!--Initialize drop down--> 
		<option value="">----Select----</option>
		<?php
		populateRoutes($conn);		
		?>	
	</select>
	
	<input type="submit" name="Submit" value="Search" />
    <?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$route_chosen=$_POST['route_picker'];
		echo $route_chosen;
	}
	?>
	</div>
	
	<div id="map"></div>
	
  </body>
  
</html>
<?php
require_once 'include/footer.php';
?>
