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
  	
  	
	<select dropMenu Name='Drop down menu'> <!--Initialize drop down--> 
		<option value="">----Select----</option>
		<?php
		$fetch_query = $conn->query("SELECT distinct routes.route_short_name, routes.route_long_name
				FROM akl_transport.routes");
		?>
		<?php
		while ($row = $fetch_query->fetch_assoc()) {
			?>
			 <?php
			 echo '<option value="">'.$row['route_short_name'].''." - ".''.$row['route_long_name'].'</option>';
		}
		?>
	</select>
	
	
	<input type="submit" name="Submit" value="Search" />
	</div>
	
	<div id="map"></div>
	
  </body>
  
</html>
<?php
require_once 'include/footer.php';
?>
