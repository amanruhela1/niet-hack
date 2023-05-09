<?php 
session_start();
include("includes/connection.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Volunteer Helping Form</title>
  <link rel="stylesheet" href="voltable.css">
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
			<a class="sachet" href="index.html">Sachet: Volunteer Help Portal</a>
			<span >The First Responders India</span>
      <a class="logout" href="logout.php">Logout</a>

    </div>
	</header>

<div class="mc_se" id="sidebar" role="navigation">

    <div class="table_data">
    <button class="add_btn" type="submit" onclick="openForm()">ADD</button>
    <input class="search" type="text" id="search-input" placeholder="Search your posts...">
    <table class="machines-table">
    <thead>
      <tr>
        <th style="cell-s">ID</th>
        <th>Name</th>
        <th>Number</th>
        <th>Address</th>
        <th>Description</th>
        <th>Co-ordinates</th>
        <th>Location</th>
        <th colspan="2">Actions</th>
      </tr>
    </thead>
    <tbody id="volunteers-list">
      <!-- Machines data will be dynamically loaded here -->
    </tbody>
  </table>

  </div>
    
</div>
  
  <div  class="add-machine">
    
    <form id="form" method="post" action="insert_volunteers.php">
      <div>
        <label for="name">Volunteer Name:</label>
        <input type="text" id="name" name="volunteerName" required>
      </div>
      <div>
          <label>Contact Number</label>
          <input type="text" class="input" name="volunteer_number">
      </div>
      <div>
        <label for="address">Address</label>
        <input type="text" id="address" name="address">
      </div>
      <div>
        <label for="description">Description</label>
        <input type="text" id="description" name="description">
      </div>
      <div>
        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" name="latitude">
        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" name="longitude">
      </div>
      <div class="location">
      <button type="button" onclick="getLocation()">Get Current Location</button>
      </div> <br>

      <div class="submit">
        <button  class="close" type="" value="Close" name="Close" onclick="closeForm()">Close</button>
        <button  class="save" type="submit" value="Save" name="Save">Save</button>
       
      </div>
    </form>

  </div>

    <div  class="add-machine">

    <form id="editform" method="post" action="update_volunteers.php">
      <div>
        <label for="name">Volunteer Name:</label>
        <input type="text" id="name" name="volunteerName" required>
      </div>
      <div>
          <label>Contact Number</label>
          <input type="text" class="input" name="volunteer_number">
      </div>
      <div>
        <label for="address">Address</label>
        <input type="text" id="address" name="address">
      </div>
      <div>
        <label for="description">Description</label>
        <input type="text" id="description" name="description">
      </div>
      <div class="submit">
        <button  class="close" type="" value="Close" name="Close" onclick="closeForm()">Close</button>
        <button  class="save" type="submit" value="Save" name="Save">Save</button>
      </div>
    </form>
    
  </div>
  <script>
        function openForm() {
            document.getElementById("form").style.display = "block";
        }
        function openEditForm(id) {
            document.getElementById("editform").style.display = "block";
            document.getElementById("editform").action = "update_volunteers.php?id="+id;
        }

        function closeForm() {
          document.getElementById("form").style.display = "none";
        }
  </script> 
  
  <script src="app_volunteers.js"></script>
</body>
</html>

<?php 

 ?>