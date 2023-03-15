<?php

$email= $_POST['email'];

$name= $_POST['name'];

$s_name= $_POST['s_name'];

$age= $_POST['age'];

$address= $_POST['address'];

$p_no= $_POST['p_no'];

$state= $_POST['state'];

$country= $_POST['country'];

echo $country;

require_once __DIR__ . '\assets\vendor\autoload.php';
$client =new MongoDB\Client("mongodb://localhost:27017");

	
$database = $client->selectDatabase("guvi");
$collection = $database->selectCollection("user_profiles");




$document = [
    'name' => $name,
    'surname'=>$s_name,
    'email' => $email,
    'age' => $age,
    'address'=>$address,
    'phone_number'=>$p_no,
    'state'=>$state,
    'country'=>$country

];

//$insertOneResult = $collection->insertOne($document);

if ($insertOneResult->getInsertedCount() === 1) {
    echo true;
  } else {
    echo true;
  }

?>