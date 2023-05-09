<!DOCTYPE html>
<html>
<head>
  <title>Current Location</title>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9xLBselcOosLYUiBSKezcNe1sPr85A2s"></script>
  <script src="script.js"></script>
</head>
<body>
  <h1>Current Location</h1>
  <button onclick="getCurrentLocation()">Get Current Location</button>
  <div id="map"></div>

  <script>
    function getCurrentLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }

    function showPosition(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;

      var mapOptions = {
        center: new google.maps.LatLng(latitude, longitude),
        zoom: 15
      };

      var map = new google.maps.Map(document.getElementById("map"), mapOptions);

      var marker = new google.maps.Marker({
        position: mapOptions.center,
        map: map,
        title: "You are here!"
      });
    }
  </script>
</body>
</html>