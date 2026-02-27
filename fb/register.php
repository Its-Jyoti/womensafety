<?php 
include('config.php');
if(isset($_POST['btnsignup']))
{
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $mob=$_POST['mob'];
   $gender=$_POST['gender'];
   $password=$_POST['password'];
   $dob=$_POST['dob'];




   $checkuser="SELECT * FROM `userlist` where `mob`='$mob'";

   $resilt=mysqli_query($con,$checkuser);

   if(mysqli_num_rows($resilt)>0)
   {
        echo '<script>alert("This Mobile Number is Already Exist")</script>';
   }else{
    $insertuser="INSERT INTO `userlist`(`fname`, `lname`, `mob`, `gender`, `dob`, `pass`) VALUES
    ('$fname','$lname','$mob','$gender','$dob','$password')";

    if (mysqli_query($con,$insertuser))
    {   
      echo "<script>";
      //  echo "alert('Login Successfull');";
       echo 'window.location.href="index.php";';
       echo "</script>"; 
    }else{
        echo '<script>alert("Error ! Problem To Insert Record")</script>';
    }
   }


   
}



?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Facebook Login</title>

  </head>
  <body>
    <center>
    <img src="logo.png"  width="200px" alt="">
    </center>
  
<form action="" method="post">
   <div class="container mt-5" style="vertical-align:center;">
   <h3>Register in to facebook</h3>
  <div class="row">
    <div class="col">
            <input type="text" class="form-control" name="fname" placeholder="First Name">
    </div>
    <div class="col">
    <input type="text" class="form-control" name="lname" placeholder="Last Name">
    </div>
  </div>
 
    <input type="text" name="mob" class="form-control mt-3" placeholder="Enter Mobile Number" id="">

    <label for=""> <b> Gender</b></label>
    <div class="form-check form-check-inline mt-3">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
  <label class="form-check-label" for="inlineRadio1">Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
  <label class="form-check-label" for="inlineRadio2">Female</label>
</div><br>
<input type="password" name="password" class="form-control mt-1" placeholder="Enter New Password" id="">

<label for="" class="mt-2">Date of Birth</label>
    <input type="date" name="dob" class="form-control mt-1" id="">
    <small>People who use our service may have uploaded your contact information to Facebook. </small><br>
    <small>By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You may receive SMS notifications from us and can opt out at any time.</small>
    <button class="btn btn-success mt-3 form-control" name="btnsignup">Sign up</button>
   </div>
</form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  
  </body>
</html>