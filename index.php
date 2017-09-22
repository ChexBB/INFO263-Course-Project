<?php
$active = "home";
require_once 'include/header.php';
?>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?callback=initMap">
</script>
<script src="scripts/map.js"></script>
<script>
    $(document).ready(function() {

    });
</script>

<html>
    <head>
    <style>
       #map {
        height: 80%;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>GoBus - Aucklands best transport app</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: -36.849316, lng: 174.766249};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initMap">
    </script>
  </body>

</html>

<?php
require_once 'include/footer.php';
?>

