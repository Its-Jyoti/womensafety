<?php
include('config.php');
error_reporting(0);


if(!isset($_SESSION['id']))
{
  // header()
  header('Location:logout.php');
  // echo "<script>";
  // echo 'window.location.href="Dashboard.php";'; 
  // echo "</script>";
}


if(isset($_POST['btnpost']))
{
   $disc=$_POST['txtdisc'];
   $username=$_SESSION['name'];
   $userid=$_SESSION['id'];
   $uploadOk = 1;
   $target_path = "uploads/";  
   $target_path = $target_path.basename( $_FILES['fileToUpload']['name']);  
  //  "uploads/image1.jpg" 
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

    $sqlinsert="INSERT INTO `postdata`(`filename`, `postdisc`, `username`,`userid`) 
    VALUES ('$target_path','$disc','$username','$userid')";

    if(mysqli_query($con,$sqlinsert))
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
        <div class="row me-2 ms-2 mt-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">What's on your mind</button>
        </div>
      

        <div class="row" id="content">
            
        </div>
    </div>



    <!-- Create Post Model  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Create Post</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="dashboard.php" method="post" enctype="multipart/form-data">  
        <div class="modal-body">
         
          <div class="container">
            <label for="" >Thumbnail Image</label>
            <input type="file" class="form-control" name="fileToUpload">
            <label for="" class="mt-3">Post Discription</label>
            <textarea rows="3" class="form-control" name="txtdisc"></textarea>
           
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="btnpost">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
    <!-- Comment on post model  -->
<div class="modal fade" id="commentmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Post Comment</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- <form action="dashboard.php" method="post" enctype="multipart/form-data">   -->
        <div class="modal-body">
         
          <div class="container">
          
          <label for="">Comment</label>
          <input type="hidden" name="" id="txtpostid" >
            <textarea rows="3" class="form-control" name="pp" id="txtcomment"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="btncomment" onclick="commentpost()">Save changes</button>
        </div>
        <!-- </form> -->
      </div>
    </div>
  </div>

<div class="modal fade" id="viewprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Profile Photo</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- <form action="dashboard.php" method="post" enctype="multipart/form-data">   -->
        <div class="modal-body">
         
         <center>
         <img src="user.jpg" height="200px" width="200px" id="showprofilenimodel" alt="">
      </center>
       
        <!-- </form> -->
      </div>
    </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/1ec891db26.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- <script>
     document.addEventListener("keyup", function (e) {
    var keyCode = e.keyCode ? e.keyCode : e.which;
            if (keyCode == 44) {
                stopPrntScr();
            }
        });
function stopPrntScr() {

            var inpFld = document.createElement("input");
            inpFld.setAttribute("value", ".");
            inpFld.setAttribute("width", "0");
            inpFld.style.height = "0px";
            inpFld.style.width = "0px";
            inpFld.style.border = "0px";
            document.body.appendChild(inpFld);
            inpFld.select();
            document.execCommand("copy");
            inpFld.remove(inpFld);
        }
       function AccessClipboardData() {
            try {
                window.clipboardData.setData('text', "Access   Restricted");
            } catch (err) {
            }
        }
        setInterval("AccessClipboardData()", 300);
    </script> -->
<script>
// A $( document ).ready() block.
$( document ).ready(function() {
   getdata();
});
  function likepost(postid)
  {
    // alert('Hii this is id'+postid)
    var likepost="like";
    $.ajax({
        url: "postbackend.php",
        type: "POST",
        data: {
          postid: postid,
          likepost: likepost,
        },
        success: function(data) {
           console.log(data);
           getdata();
          // location.reload();
          // $('#tblcontent').html(data);
        },
      });
  }

  function dislikepost(dipostid)
  {
    // alert('Hii this is id'+postid)
    var dislikepost="dislikepost";
    $.ajax({
        url: "postbackend.php",
        type: "POST",
        data: {
          dipostid: dipostid,
          dislikepost: dislikepost,
        },
        success: function(data) {
           console.log(data);
           getdata();
          // location.reload();
          // $('#tblcontent').html(data);
        },
      });
  }


  function setpostid(postid)
  {
    // alert('Hii this is id'+postid)
    $('#txtpostid').val(postid);
  
  }

  // javascript For stalling Image
  function viewprofile(profileimg,viewedpostid)
  {
    $('#viewprofile').modal('show');
    // alert(profileimg);
    console.log(profileimg);

    $('#showprofilenimodel').attr("src",profileimg);
     setTimeout(function(){
   
  $.ajax({
        url: "postbackend.php",
        type: "POST",
        data: {
          viewedpostid: viewedpostid
        },
        success: function(data) {
            console.log(data);
        },
      });

}, 30000);

  }

  function commentpost()
  {
    //
   var cpostid= $('#txtpostid').val();
   var comment= $('#txtcomment').val();
   
  //  alert(cpostid+'---'+comment);
  $.ajax({
        url: "postbackend.php",
        type: "POST",
        data: {
          cpostid: cpostid,
          comment: comment,
        },
        success: function(data) {
            console.log(data);
        //  if(data=="done")
        //  {
          //location.reload();
          // $('#txtpostid').val("");
          // $('#txtcomment').val("");
          // //$('#commentmodel').hide();
       $('#commentmodel').modal('hide');
          // $('#commentmodel').modal().hide();
         //}
           
          // $('#tblcontent').html(data);
        },
      });
  }


  function getdata()
  {
    var getdata="getdata";
    $.ajax({
        url: "postbackend.php",
        type: "POST",
        data: {
          getdata: getdata,
        },
        success: function(data) {
        //    console.log(data);
        //  if(data=="done")
        //  {
          //location.reload();
          // $('#txtpostid').val("");
          // $('#txtcomment').val("");
          // //$('#commentmodel').hide();
  //     $('#commentmodel').modal('hide');
          // $('#con').modal().hide();
         //}
           
           $('#content').html(data);
        },
      });
  }
</script>
     
    <!-- <script language="javascript">
setTimeout(function(){
   alert('One Minite Compelted');
}, 60000);
</script> -->


  </body>
</html>