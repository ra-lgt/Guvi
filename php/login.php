<?php
$email= $_POST['email'];
$pass =$_POST['password'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guvi";

$conn =  mysqli_connect($servername, $username, $password,$dbname);

$sql = "select * from user_creds where email='$email' and password='$pass' ";
$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) > 0){
  echo true;

}
else{
  echo false;
}

?>