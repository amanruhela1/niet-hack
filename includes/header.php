

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SANKAT: Volunteer Portal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

   
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   	 <h3 class="navbar-brand text-white">Volunteer Portal</h3>


   	 <div class="mr-auto"></div>

   	 <ul class="navbar-nav">
   	 	<?php 
               
               if (isset($_SESSION['student'])) {?>
               	   <li class="nav-item">
   	 		<a href="#" class="nav-link"><?php echo $_SESSION['student']; ?></a>
   	 	</li>
   	 	  <li class="nav-item">
   	 		<a href="logout.php" class="nav-link">Logout</a>
   	 	</li>
               <?php }else if(isset($_SESSION['teacher'])){ ?>
              <li class="nav-item">
   	 		<a href="index.php" class="nav-link"><?php echo $_SESSION['teacher']; ?></a>
   	 	</li>
   	 	<li class="nav-item">
   	 		<a href="logout.php" class="nav-link">Logout</a>
   	 	</li>
              <?php }else{ ?>
                  <li class="nav-item">
   	 		<a href="index2.php" class="nav-link">Login</a>
   	 	</li>
   	 	<li class="nav-item">
   	 		<a href="register.php" class="nav-link">Register</a>
   	 	</li>
              <?php }



   	 	 ?>
   	 </ul>
   </nav>

</body>
</html>