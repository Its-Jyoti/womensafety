<?php
include('config.php');

if(isset($_GET['postid'])=="")
{
  header('Location:dashboard.php');
}
$postid=$_GET['postid'];



function getusernamebyid($con,$id)
{
    $selectuser="SELECT * FROM `userlist` where `id`='$id'";

    $result=mysqli_query($con,$selectuser);

    $row=mysqli_fetch_assoc($result);

    return $row['fname'];
}

function getprofileimagebyid($con,$id)
{
    $selectuser="SELECT * FROM `userlist` where `id`='$id'";

    $result=mysqli_query($con,$selectuser);

    $row=mysqli_fetch_assoc($result);

    return $row['profileimg'];
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

    <title>View Post</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
    <?php
     $sqlselectpost="SELECT * FROM `postdata` where `id`='$postid'";

     $result=mysqli_query($con,$sqlselectpost);

     if(mysqli_num_rows($result)>0)
     {
       $row=mysqli_fetch_assoc($result);
       
          $postidDB=$row['id'];
          ?>
         <div class="col">

              <div class="card me-2 ms-2 mt-2">
                    <div class="card-header bg-light">
                    <?php 
                              echo $row['username'];
                        ?> Posted
                    </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <img src="<?php echo getprofileimagebyid($con,$row['userid']);?>" alt="" height="50px">
                    </div>
                    <div class="col mt-1">
                        <b><a href="viewpost.php?postid=<?php echo $postidDB;?>"> <?php 
                        echo $row['username'];
                  ?></a></b><br>
                        <small> <?php 
                        echo $row['datet'];
                  ?></small>
                    </div>
                </div>
                    <p class="me-2 ms-2 mt-2">
                      <?php 
                            echo $row['postdisc'];
                      ?>
                    </p>
                <img src="<?php 
                        echo $row['filename'];
                  ?>" height="300px" width="300px" alt="">
                <hr class="mt-1">
                
                          <?php }
                  ?>
              </div>
              </div>
              </div>
                  <div class="col">
                  <h4>View Comments</h4>

                    <?php 

                        $selectcomments="SELECT * FROM `commentdata` where `postid`='$postid'";

                        $ress=mysqli_query($con,$selectcomments);

                        while($rows=mysqli_fetch_assoc($ress))
                        { ?>

                        <div style="background-color:#f0f0f0; margin-top:10px; padding: 10px; border-radius:20px;">
                        <h6><?php echo getusernamebyid($con,$rows['username']); ?></h6>
                        <h6><?php echo $rows['comment']; ?></h6>
                  </div>

                        <?php }

                    ?>

                  </div>
              </div>

              </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>