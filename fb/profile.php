<?php
include('config.php');
// error_reporting(0);


if(!isset($_SESSION['id']))
{
  // header()
  header('Location:logout.php');
  // echo "<script>";
  // echo 'window.location.href="Dashboard.php";'; 
  // echo "</script>";
}


$loginuser= $_SESSION['id'];


$selectusersql="SELECT * FROM `userlist` WHERE `id`='$loginuser'";

$res=mysqli_query($con,$selectusersql);

$row=mysqli_fetch_assoc($res);

$fname=$row['fname'];
$lname=$row['lname'];
$mob=$row['mob'];
$gender=$row['gender'];
$dob=$row['dob'];
$cpass=$row['pass'];
$profile=$row['profileimg'];





if(isset($_POST['uploadprofile']))
{
 
 
  //  $userid=$_SESSION['id'];
   $uploadOk = 1;
   $target_path = "uploads/";  
   $target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   
   $imageFileType = strtolower(pathinfo($target_path,PATHINFO_EXTENSION));

   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
      $uploadOk = 0;
    }

    if ($uploadOk == 1) {
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) 
{  
    // echo "File uploaded successfully!";  

    $updateprofile="UPDATE `userlist` SET `profileimg`='$target_path' WHERE `id`='$loginuser'";

    if(mysqli_query($con,$updateprofile))
    {
      header("Refresh:0");
    }



} else{  
    echo "Sorry, file not uploaded, please try again!";  
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
    a{
        color:black;
        text-decoration: none;
    }
</style>
    <title>Profile</title>
  </head>
  <body>
  

  

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> 
            <img src="logo.png" alt="" height="40px">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
             
            </ul>
          
              <ul class="navbar-nav">
              <li class="nav-item ">
                <a class="nav-link" href="dashboard.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <b><?php echo 'Hii, '.$_SESSION['name'];?></b>
                </a>
           
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="profile.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <b>Profile</b>
                </a>
           
              </li>
              <li class="nav-item ">
                <a class="nav-link text-danger" href="logout.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <b>Logout</b>
                </a>
           
              </li>
             </ul>
          
          </div>  
        </div>
      </nav>


  


<div class="row mt-3">
    <div class="col">

      <div class="container">
        <h3>General profile settings</h3>
      </div>  
      <div action="" class="p-4">
        <label for="">Name</label>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" id="pfname" placeholder="First name" value="<?php echo $fname;?>">
          </div>
          <div class="col">
            <input type="text" class="form-control" id="plname" placeholder="Last name" value="<?php echo $lname;?>">
          </div>
        </div>
        
        <label for="" class="mt-3">Mobile No</label>
        <input type="text" class="form-control" placeholder="Mobile Number" id="pmob" value="<?php echo $mob;?>">

        <label for="" class="mt-3">Gender</label>&nbsp&nbsp&nbsp
        
        <div class="form-check form-check-inline mt-3">
          <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" <?php if($gender=="Male"){ ?>checked<?php } ?>>
          <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" <?php if($gender=="female"){ ?>checked<?php } ?>>
          <label class="form-check-label" for="inlineRadio2">Female</label>
        </div>
<br>
        <label for="" class="mt-3">Date of Birth</label>
        <input type="date" name="dob" class="form-control mt-1" id="pdob" value="<?php echo $dob;?>">

        <label for="" class="mt-3">Current Password</label>
        <input type="text" name="password" class="form-control mt-1" placeholder="Current Password" id="pcpass" value="<?php echo $cpass;?>">
        <label for="" class="mt-3">New Password</label>
        <input type="password" name="password" class="form-control mt-1" placeholder="Enter New Password" id="pnpass">
            <button class="btn btn-warning mt-3 form-control" name="btnsignup" onclick="updateprofile()">Update Profile</button>
        
  </div>

    </div>
    <div class="col">

 <div class="container">
        
 <center>
  <img src="<?php echo $profile; ?>" height="300px" width="300px" alt=""><br>
<button class="btn btn-info mt-3 text-white mb-3" onclick="showprofile()">Update Profile Pichure</button>

<form action="profile.php" method="post" enctype="multipart/form-data">
<div class="container col-12 col-md-5 p-3" id="profileupdate" style="display:none">
  <p class="mt-5">Select Profile piture for your profile</p>
  <input type="file" name="fileToUpload" class="form-control" id="">
  <button class="btn btn-primary mt-3" type="submit" name="uploadprofile">Update profile</button>
</div>
</form>



 </center>
      </div> 

    </div>
  </div> 





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/1ec891db26.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
      function showprofile()
    {
      $('#profileupdate').toggle();
    }

    function updateprofile()
    {
      var fname=$('#pfname').val();
      var lname=$('#plname').val();
      var mob=$('#pmob').val();
      var gender=$("input:radio:checked").val();
      var dob=$('#pdob').val();
      var cpass=$('#pcpass').val();
      var npass=$('#pnpass').val();

      // console.log(fname+"\n"+lname+"\n"+mob+"\n"+gender+"\n"+dob+"\n"+cpass+"\n"+npass);
      $.ajax({
        url: "profile_backend.php",
        type: "POST",
        data: {
          fname: fname,
          lname: lname,
          mob: mob,
          gender: gender,
          dob: dob,
          cpass: cpass,
          npass: npass,
        },
        success: function(data) {
           console.log(data);
          if(data=="done")
          {
            location.reload();
          }
          // location.reload();
          // $('#tblcontent').html(data);
        },
      });



    }
</script>
  </body>
</html>