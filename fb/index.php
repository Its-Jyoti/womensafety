<?php
include('config.php');
if(isset($_POST['login']))
{
    extract($_POST);

    $mobile_number=mysqli_real_escape_string($con,$_POST['mobile_number']);
    $Password=mysqli_real_escape_string($con,$_POST['password']);

    if($mobile_number=="8412003013" && $Password=="admin")
    {
      $_SESSION['id']="001";
      $_SESSION['mobile_number']=$mobile_number;
      $_SESSION['name']="Admin";
      // $_SESSION['usertype']=$fetch['userrole'];

      // echo $_SESSION['usertype'];

     echo "<script>";
    //  echo "alert('Login Successfull');";
     echo 'window.location.href="admindashboard.php";';
     echo "</script>";
    }else{



  //   echo $mobile_number;
    $log=mysqli_query($con,"select * from `userlist` where `mob`='$mobile_number' and `pass`='$Password'");

    if(mysqli_num_rows($log)>0)
    {
        $fetch=mysqli_fetch_array($log);
 
        $_SESSION['id']=$fetch['id'];
        $_SESSION['mobile_number']=$fetch['mob'];
        $_SESSION['name']=$fetch['fname'];
        // $_SESSION['usertype']=$fetch['userrole'];

        // echo $_SESSION['usertype'];

       echo "<script>";
      //  echo "alert('Login Successfull');";
       echo 'window.location.href="dashboard.php";';
       echo "</script>";
    }else
    {
        echo "<script>";
        echo "alert('Please Enter Correct Username Or Password');";
        echo "</script>";

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
  
    

  

   <div class="container mt-5">
   <div class="row">
    <div class="col">
    <center>
    <img src="logo.png"  width="200px" alt="">
    <p>Facebook Helps you connect and shear with people in your life</p>
    </center>
    </div>
    <div class="col">
    <center>
<h3>Login in to facebook</h3>
<form action="" method="post">
   <input type="text" name="mobile_number" class="form-control" placeholder="Enter Phone Number" id="">
    <input type="password" name="password" class="form-control mt-3" placeholder="Enter Password" id="">
    <button class="btn btn-primary mt-3 form-control" name="login">Log in</button>
</form>
    <small class="btn btn-success mt-4"><a href="register.php" class="text-white ">Create New Account</a></small>
    </div>
    </center>
   </div>
   </div>

   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>