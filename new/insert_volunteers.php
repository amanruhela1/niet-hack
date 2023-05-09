<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "multilogin");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$volunteerName = $_REQUEST['volunteerName'];
		$volunteer_number = $_REQUEST['volunteer_number'];
		$address = $_REQUEST['address'];
		$description = $_REQUEST['description'];
		$latitude = $_REQUEST['latitude'];
		$longitude = $_REQUEST['longitude'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO volunteers (name, number, address, description, latitude, longitude) VALUES 
		('$volunteerName','$volunteer_number', '$address', '$description', '$latitude', '$longitude' )";		
		if(mysqli_query($conn, $sql)){
			header("Location: volunteer.php");

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
