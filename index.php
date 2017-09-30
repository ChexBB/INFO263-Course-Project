<?php
$active = "home";
require_once 'include/header.php';
?>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBajjU1EoGpVz0QKgSL2c_aS6vJDb8N5cA&callback=initMap">
</script>
<script src="script/map.js"></script>

<script>
    $(document).ready(function() {
		
    });
</script>

<html>
  <head>
    <style>
       #map {
        height: 800px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>GoBus Transport App</h3>
    <div id="map"></div>
   
    
  </body>
</html>

<?php
require_once 'include/footer.php';
?>

