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