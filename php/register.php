<?php
//user inputs for registering

$u_name=$_POST['u_name'];
$email=$_POST['email'];
$pass=$_POST['password'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guvi";

$conn =  mysqli_connect($servername, $username, $password,$dbname);

$sql = "INSERT INTO user_creds (username, email,password) VALUES ('$u_name', '$email','$pass')";
$result = mysqli_query($conn, $sql);

if ($result === true) {
    echo true;
  } else {
    echo false;
  }

mysqli_close($conn);



?>