<?php
$documentId=$_GET['id'];
$name=$_GET['name'];


require_once __DIR__ . '\assets\vendor\autoload.php';

$client =new MongoDB\Client("mongodb://localhost:27017");
$database = $client->selectDatabase("guvi");
$collection = $database->selectCollection("user_profiles");

$filter = ['name' => $name];

$options = [];
$documents = $collection->find($filter, $options);

foreach ($documents as $document) {
    $u_name=$document->name;
    $u_email=$document->email;
    $u_age=$document->age;
    $u_address=$document->address;
    $u_phone_number=$document->phone_number;
    $u_country=$document->country;
    $u_surname=$document->surname;
    
    
    
}


?>
<html>
    <head>
      <link rel="stylesheet" href="css/edit.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

    <body>

    
        <div class="container rounded bg-white mt-5">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="profile.jpg" width="150"><span class="font-weight-bold"><?php echo $u_name ?></span></div>
                </div>
                <div class="col-md-8">
                    <form action="update_profile.php" method="post">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3>Edit Profile</h3>
                        </div>

                        
                        <div class="row mt-2">
                            <div class="col-md-6"><input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="First name" ></div>
                            <div class="col-md-6"><input type="text" name="surname" class="form-control" value="<?php echo $u_surname ?>" placeholder="Last name"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><input name="dob" type="date" class="form-control" placeholder="Date of Birth"></div>
                            <div class="col-md-6"><input name="email" type="email" class="form-control" value="<?php echo $u_email ?>"  placeholder="Email Id"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><input name="phone_number" type="number" class="form-control" value="<?php echo $u_phone_number ?>" placeholder="+91" ></div>
                            <div class="col-md-6"><input name="address" type="text" class="form-control" value="<?php echo $u_address ?>"  placeholder="Address"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><input name="country" type="text" class="form-control"value="<?php echo $u_country ?>" placeholder="Country"></div>
                            <div class="col-md-6"><input disabled type="number" class="form-control" value="<?php echo $u_age ?>" placeholder="Age"></div>
                        </div>

    
                        
                        <button>submit</button>
                    </div>
                </div>
</form>
            </div>
        </div>


        <style>
            body {
    background: #BA68C8;
  }
  
  .form-control:focus {
    box-shadow: none;
    border-color: #BA68C8;
  }
  
  .profile-button {
    background: #BA68C8;
    box-shadow: none;
    border: none;
  }
  
  .profile-button:hover {
    background: #682773;
  }
  
  .profile-button:focus {
    background: #682773;
    box-shadow: none;
  }
  
  .profile-button:active {
    background: #682773;
    box-shadow: none;
  }
  
  .back:hover {
    color: #682773;
    cursor: pointer;
  }
        </style>
    </body>
</html>

