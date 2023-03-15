<?php
$update_name=$_POST['name'];

$update_surname=$_POST['surname'];

$update_email=$_POST['email'];

$update_dob=$_POST['dob'];

$update_phone_number=$_POST['phone_number'];

$update_address=$_POST['address'];

$update_country=$_POST['country'];

$today = new DateTime();
$birthdate = new DateTime($update_dob);
$age = $today->diff($birthdate)->y;


require_once __DIR__ . '\assets\vendor\autoload.php';
$client =new MongoDB\Client("mongodb://localhost:27017");

	
$database = $client->selectDatabase("guvi");
$collection = $database->selectCollection("user_profiles");


$filter = ['email' => $update_email];

$update = ['$set' => ['name' => $update_name,
                    'country'=>$update_country,
                    'phone_number'=>$update_phone_number,
                    'address'=>$update_address,
                    'surname'=>$update_surname,
                    'age'=>$age]];

$result = $collection->updateOne($filter, $update);


?>
