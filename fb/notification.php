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

$userid=$_SESSION['id'];


function getusernamebyid($con,$id)
{
    $selectuser="SELECT * FROM `userlist` where `id`='$id'";

    $result=mysqli_query($con,$selectuser);

    $row=mysqli_fetch_assoc($result);

    return $row['fname'];
}

function getusernamebyidINpost($con,$id)
{
    $selectuser="SELECT * FROM `postdata` where `id`='$id'";

    $result=mysqli_query($con,$selectuser);

    $row=mysqli_fetch_assoc($result);

    return $row['userid'];
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facebook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        a{
            color:black;
            text-decoration: none;
        }
    </style>


</head>
  <body>
    
    


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="dashboard.php"> 
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
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <b><?php echo 'Hii, '.$_SESSION['name'];?></b>
                </a>
           
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="profile.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <b>Profile</b>
                </a>
           
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="notification.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <b>Notification</b>
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

      <div class="container">
      <h3>Activity Log</h3>
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <!-- <th scope="col">UniqueID</th>
      <th scope="col">Post</th>
      <th scope="col">Commented By</th> -->
      <th scope="col">Comment / Log</th>
      <th scope="col">Commented On</th>
    </tr>
  </thead>
  <tbody>

  <?php

    $checksql="SELECT * FROM `abusedata`";

    $res=mysqli_query($con,$checksql);
        $num=1;
    while($row=mysqli_fetch_assoc($res))
    {
        $postid=$row['postid'];
        if(getusernamebyidINpost($con,$postid)==$userid)
        {
        
        ?>
        <tr>
            <!-- <td><?php// echo "REC000".$row['id']; ?></td>
            <td><a href="viewpost.php?postid=<?php //echo $row['postid'];?>"><?php //echo $row['postid']; ?></a></td>
            <td><?php //echo getusernamebyid($con,$row['userid']); ?></td> -->
            <td><?php echo $row['logs']; ?></td>
            <td><?php echo $row['timedate']; ?></td>
            
    </tr>


    <?php
    $num++;  
}  
}



  ?>
   
  </tbody>
</table>
      </div>




    </body>
    </html>