
<?php
//For connection to database
$showalert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'partials/DB_CONNECT.PHP';
    $username= $_POST["username"];
    $password= $_POST["password"];
    $cpassword= $_POST["cpassword"];

    // $exist=false;

// CHECK THE USERNAME EXIST
//if username exist so through an alert

      $existSql="SELECT * FROM `users` WHERE username = '$username'";
      $result= mysqli_query($conn,$existSql);
      $existnumrows = mysqli_num_rows($result);
      if($existnumrows >0){
        $showError = "Username Already Exists";
      }


   else
   {
    //this will check password match 
    if(($password == $cpassword))
    {
        $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $showalert = true;
        }
    }
        else
        {
            $showError = "Password not match";

        }
      }
    }

?>

<!-- BOOTSTRAP-STARTER-TEMPLATE -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign-up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
   <!-- ADDING NAVBAR-COMPONENT -->
   <?php require 'partials/navbar.php' ?>
   <?php

   //For showing alert of success account created
   if($showalert)
   {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully</strong> Your Account is created.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div> ';
    }

    if($showError)
    {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> '.$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div> ';
        }
   ?>
   <!-- SIGN-UP-FORM -->
   <div class="container my-3">

   <h2>Sign up to Website</h2>
   <form action ="/Project login/Signup.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="emailHelp" class="form-text">Plesae enter same above Password</div>
  </div>
 
  <button type="submit" class="btn btn-primary">Signup</button>
</form>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
