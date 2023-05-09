<?php 
session_start();
include("includes/connection.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Volunteer Searching Portal</title>
  <link rel="stylesheet" href="voltab.css">
  <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }

    function showPosition(position) {
      document.getElementById("latitude").value = position.coords.latitude;
      document.getElementById("longitude").value = position.coords.longitude;
    }
  </script>

</head>
<body>
<header>
		<div class="logo">
			<a class="sachet" href="index.html">Sachet: Volunteer Searching Portal</a>
			<span >The First Responders India</span>

    </div>
	</header>

<div class="mc_se" id="sidebar" role="navigation">

    <div class="table_data">
    <input class="search" type="text" id="search-in" placeholder="Search volunteers...">
    <table class="machines-table">
    <thead>
      <tr>
        <th style="cell-s">ID</th>
        <th>Name</th>
        <th>Number</th>
        <th>Address</th>
        <th>Description</th>
        <th>Coordinates</th>
        <th>Location</th>
      </tr>
    </thead>
    <tbody id="volunteersCurrent-list">
      <!-- Machines data will be dynamically loaded here -->
    </tbody>
  </table>

  </div>
    
</div>
  
  
  
  <script src="app_volunteersList.js"></script>
</body>
</html>

<?php 

 ?>