<?php

$db = mysqli_connect("localhost","root","","multilogin");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>