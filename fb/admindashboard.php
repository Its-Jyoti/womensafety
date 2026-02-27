<?php
include('config.php');
if(!isset($_SESSION['id']))
{
  // header()
  header('Location:logout.php');
  // echo "<script>";
  // echo 'window.location.href="Dashboard.php";'; 
  // echo "</script>";
}
function getusernamebyid($con,$id)
{
    $selectuser="SELECT * FROM `userlist` where `id`='$id'";

    $result=mysqli_query($con,$selectuser);

    $row=mysqli_fetch_assoc($result);

    return $row['fname'];
}
// $userrole=$_SESSION['usertype'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Welcome Admin</title>
  </head>
  <body>
  

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-success" href="#"><b>Women safety Admin Panel</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" onclick="viewusers()"><b>Users</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="viewcomment()"><b>Analysis</b></a>
        </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="logout.php" ><b>Logout</b></a>
        </li>
    <ul>
      
  </div>
</nav>




<div class="row">
  <div class="col p-3">
  <div class="container">
    
  <div class="card">
  <div class="card-header">
    No Of Register Users
  </div>
  <div class="card-body">
    <p class="card-text">Total Number Of Users <h3>
      <?php
       $usersql="SELECT * FROM `userlist`";
       echo mysqli_num_rows(mysqli_query($con,$usersql));
      ?>
    </h3> </p>
    <a href="#" class="btn btn-primary form-control" onclick="viewusers()">View All</a>

  </div>
</div>

</div>
</div>
  <div class="col p-3">
  <div class="container">
    
  <div class="card">
  <div class="card-header">
    Total Posted Posts
  </div>
  <div class="card-body">
    <p class="card-text">Total Number Of Posts <h3>
    <?php
       $usersql="SELECT * FROM `postdata`";
      //  echo mysqli_num_rows(mysqli_query($con,$usersql));
       $numberofpost=mysqli_num_rows(mysqli_query($con,$usersql));
       echo $numberofpost;
      ?>
    </h3> </p>
    <a href="#" class="btn btn-primary form-control" onclick="viewcommentsnumber(<?php echo $numberofpost;?>)">View All</a>

  </div>
</div>


</div>
  </div>
  <div class="col p-3">
  <div class="container">
    
  <div class="card">
  <div class="card-header">
    No of Comments on posts
  </div>
  <div class="card-body">
    <p class="card-text">Total Number Comments on posts <h3>
    <?php
       $usersql="SELECT * FROM `commentdata`";
       $numberofcommets=mysqli_num_rows(mysqli_query($con,$usersql));
       echo $numberofcommets;
      ?>
    </h3> </p>
     <a href="#" class="btn btn-primary form-control" onclick="viewcommentspost(<?php echo $numberofcommets;?>)">View All</a>
  </div>
</div>


</div>
  </div>
  <div class="col p-3">
  <div class="container">

  <div class="card">
  <div class="card-header">
    Activity Logs
  </div>
  <div class="card-body">
  <p class="card-text">Total No of Activities catched<h3>
  <?php
       $usersql="SELECT * FROM `abusedata`";
       echo mysqli_num_rows(mysqli_query($con,$usersql));
      ?>
  </h3> </p>
    <a href="#" class="btn btn-primary form-control" onclick="viewcomment()">View All</a>

  </div>
</div>

</div>
  </div>
  </div>






<hr>




<div id="user" class="mt-1 p-3">


<h3>List Of Users</h3>
<!-- <div class="container"> -->
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Mob</th>
      <th scope="col">gender</th>
      <th scope="col">DOB</th>
      <th scope="col">createdon</th>
    </tr>
  </thead>
  <tbody>

  <?php

    $checksql="SELECT * FROM `userlist`";

    $res=mysqli_query($con,$checksql);
        $num=1;
    while($row=mysqli_fetch_assoc($res))
    {?>
        <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $row['fname']." ".$row['lname']; ?></td>
            <td><?php echo $row['mob']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['dob']; ?></td>
            <td><?php echo $row['createdon']; ?></td>
            
    </tr>


    <?php
    $num++;    
}



  ?>
   
  </tbody>
</table>
<!-- </div> -->




</div>
<div id="comment" class="mt-5 p-3">

<h3>Activity Log</h3>
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">UniqueID</th>
      <th scope="col">Post</th>
      <th scope="col">Commented By</th>
      <th scope="col">Comment / Log</th>
      <th scope="col">Commented On</th>
    </tr>
  </thead>
  <tbody>

  <?php

    $checksql="SELECT * FROM `abusedata` ORDER BY `abusedata`.`id` DESC";

    $res=mysqli_query($con,$checksql);
        $num=1;
    while($row=mysqli_fetch_assoc($res))
    {?>
        <tr>
            <td><?php echo "REC000".$row['id']; ?></td>
            <td><a href="viewpost.php?postid=<?php echo $row['postid'];?>"><?php echo $row['postid']; ?></a></td>
            <td><?php echo getusernamebyid($con,$row['userid']); ?></td>
            <td><?php echo $row['logs']; ?></td>
            <td><?php echo $row['timedate']; ?></td>
            
    </tr>


    <?php
    $num++;    
}



  ?>
   
  </tbody>
</table>
</div>




</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $( document ).ready(function() {
            $('#user').hide();
            $('#comment').hide();
});
        function viewusers()
        {
            // alert('Hii Users');
            $('#user').show();
            $('#comment').hide();
        }
        function viewcomment()
        {
            // alert('Hii Users');
            $('#comment').show();
            $('#user').hide();
        }


        function viewcommentsnumber(numberofcommets)
        {
          Swal.fire(
            ''+numberofcommets,
                'Comments Found in Record',
                'success'
              )
        }
        function viewcommentspost(numberofpost)
        {
          Swal.fire(
            ''+numberofpost,
                'Posts Found in Record',
                'success'
              )
        }
    </script>
  </body>
</html>