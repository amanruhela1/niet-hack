<?php 

include("includes/connection.php");

$output = "";

if (isset($_POST['register'])) {
	
	$name = $_POST['name'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$c_pass = $_POST['c_pass'];

	$error = array();

	if (empty($name)) {
		$error['error'] = "Name is Empty";
	}else if(empty($uname)){
		$error['error'] = "username is empty";
	}else if(empty($pass)){
		$error['error'] = "Enter Password";
	}else if(empty($c_pass)){
		$error['error'] = "Confirm Password";
	}else if($pass != $c_pass){
		$error['error'] = "Both password do not match";
	}

	if (isset($error['error'])) {
		$output .= $error['error'];
	}else{
		$output .= "";
	}


	if (count($error) < 1) {
		
		$query = "INSERT INTO users(name, username, password) VALUES('$name','$uname','$pass')";
		$res = mysqli_query($connect,$query);

		if ($res) {
			$output .= "You have successfully registered";
			header("Location:index2.php");
		}else{
			$output .= "Failed to register";
		}
	}
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Volunteer Portal</title>
</head>
<body>

	<?php include("includes/header.php"); ?>


	<div class="container">
		<div class="col-md-12">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 shadow-sm" style="margin-top:100px;">
					<form method="post">
						<h3 class="text-center my-3">Register</h3>

						<div class="text-center"><?php echo $output; ?></div>

						<label>Name</label>
						<input type="text" name="name" class="form-control my-2" placeholder="Enter Name" autocomplete="off">

						<label>Username</label>
						<input type="text" name="uname" class="form-control my-2" placeholder="Enter Username" autocomplete="off">

						<label>Password</label>
						<input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">

						<label>Confirm Password</label>
						<input type="password" name="c_pass" class="form-control my-2" placeholder="Enter Confirm Password">

						<input type="submit" name="register" class="btn btn-success" value="Register">
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="" style="margin-top: 30px;"></div>

</body>
</html>