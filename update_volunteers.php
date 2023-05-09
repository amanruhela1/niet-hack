<!DOCTYPE html>
<html>

<head>
	<title>Update Page page</title>
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
        $id = $_GET['id'];
		// Taking all 5 values from the form data(input)
		$volunteerName = $_POST['volunteerName'];
		$volunteer_number = $_POST['volunteer_number'];
		$address = $_POST['address'];
		
        // $query = "UPDATE volunteers SET name='$volunteerName',  number='$volunteer_number', address='$address' WHERE id='$id'";
        // $result = $conn->query($query);

        // if ($result) {
        //     echo "Machine updated successfully";
        // } else {
        //     http_response_code(500);
        //     echo "Failed to update machine";
        // }

        $sql = "UPDATE volunteers SET name='$volunteerName',  number='$volunteer_number', address='$address' WHERE id='$id'";		
		if(mysqli_query($conn, $sql)){
			echo "$id";
            echo "$volunteerName";
            // header("Location: volunteer.php");

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}

        mysqli_close($conn);
		?>
	</center>
</body>

</html>
