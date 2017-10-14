<?php
$active = "home";
require_once 'include/header.php';
require_once 'database.php';

?>

<script>
    $(document).ready(function() {
		$('#route_picker').on('change',function(){
			var route = apiQuery();
		})
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
  <!--undergwond-->
  <body>
	<div id="header">
	
	<h1>GoBus Transport App   <img src="Media/Auckland_Transport_Logo.png" alt="Logo" width="80" height="80" align="middle"></font></h1>
  	
	<select dropMenu Name='route_picker' id='route_picker'> <!--Initialize drop down--> 
		<option id="default_route" value="set">By Route</option>
		<?php
		populateRoutes($conn);
		?>	
	</select>
    
	</div>
	
	<div id="map"></div>
  </body>
  
</html>
<?php
require_once 'include/footer.php';
?>
