<?php
include("connect.php");
connect();
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$cPassword = $_POST["cpassword"];
$hash = md5($password);
$insert = mysqli_query($con, "INSERT INTO admin (username , email, password) VALUE ('$username','$email','$hash')");

mysqli_close($con);
header('location:../register.php');
