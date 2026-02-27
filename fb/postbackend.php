<?php
// session_start();
include('config.php');
extract($_POST);

$loginuserid=$_SESSION['id'];


$getlist="SELECT `list` FROM `abuseword`";

$results=mysqli_query($con,$getlist);

$row1=mysqli_fetch_assoc($results);
    $wordlist=$row1['list'];



if(isset($_POST['postid']) && isset($_POST['likepost']))
{
	$selectsql="SELECT * from `likedata` where `postid`='$postid' AND `username`='$loginuserid'";

    $res=mysqli_query($con,$selectsql);
    if(mysqli_num_rows($res)>0)
    {
            // can't like if already the record is exist
    }else
    {
        $inseruser="INSERT INTO `likedata`(`postid`, `username`) VALUES ('$postid','$loginuserid')";
			//echo $ledgerquery;
				if(mysqli_query($con,$inseruser))
				{			
						$output="Done";
					
				}
                echo $output;
    }
}

if(isset($_POST['dipostid']) && isset($_POST['dislikepost']))
{
	$selectsql="DELETE  from `likedata` where `postid`='$dipostid' AND `username`='$loginuserid'";
    // echo $selectsql;
    $res=mysqli_query($con,$selectsql);
   
}
//comment
if(isset($_POST['cpostid']) && isset($_POST['comment']))
{
	
        $inseruser="INSERT INTO `commentdata`(`postid`, `username`, `comment`) VALUES ('$cpostid','$loginuserid','$comment')";
			//echo $ledgerquery;
				if(mysqli_query($con,$inseruser))
				{			
					//	$output="done";
                        $abusewordarray = explode (",", $wordlist); 
                        print_r($abusewordarray);

                        $exist=false;
                        $string = $comment;
                        foreach ($abusewordarray as $url) 
                        {
                            
                            if (strpos($string, $url) !== FALSE) 
                            { 
                                $exist=true;
                            }
                        }
                      
                        if($exist)
                        {
                            //echo "Exist";
                                $abusecomment="Bad Words in Comment  : ".$comment;
                            $insertlog="INSERT INTO `abusedata`(`postid`, `userid`, `logs`) VALUES ('$cpostid','$loginuserid','$abusecomment')";

                                mysqli_query($con,$insertlog);
                        }
				}
                echo $output;
    }

    //Code for stalling image
    if(isset($_POST['viewedpostid']))
    {
       // echo "POST ID : ".$viewedpostid."\n";
      //  echo "User ID : ".getusernamebyidINpost($con,$viewedpostid)."\n";
        $posteduser=getusernamebyidINpost($con,$viewedpostid);
        $postusername=getusernamebyid($con,$posteduser);
        // echo "Gender of User : ".getusergenderbyid($con,$posteduser);
        $usergender=getusergenderbyid($con,$posteduser);
        $loginusername=$_SESSION['name'];



            if($usergender=="female")
            {
                $abusecomment=$loginusername." Stalling Profile Photo of ".$postusername." More Than 30 sec";
                $insertlog="INSERT INTO `abusedata`(`postid`, `userid`, `logs`) VALUES ('$viewedpostid','$loginuserid','$abusecomment')";
                
                         mysqli_query($con,$insertlog);
                
                
            }


    }


    if(isset($_POST['getdata']))
    {
    

        $sqlselectpost="SELECT * FROM `postdata` ORDER BY `postdata`.`datet` DESC";

        $result=mysqli_query($con,$sqlselectpost);

        if(mysqli_num_rows($result)>0)
        {
           while($row=mysqli_fetch_assoc($result))
           {
             $postidDB=$row['id'];
             $profileimg=getprofileimagebyid($con,$row['userid']);
             $profileimg="'".$profileimg."'";
             $profileimgwithid=$profileimg."-".$postidDB;
            //  echo $profileimg;
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
         
         <?php
//echo "<img src='getprofileimagebyid(".$con,$useridd.") onclick='viewprofile('".$profileimg,$postidDB."')' alt='' height='50px'>";
            ?>
         
         <img src="<?php echo getprofileimagebyid($con,$row['userid']); ?>" onclick="viewprofile(<?php echo $profileimg?>,<?php echo $postidDB ?>);" alt="" height="50px">
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
     <div class="row text-center ">
     <div class="col">
         <!-- <a href="#"></i></a> -->
         <?php
                $checklikesql="SELECT * FROM `likedata` WHERE `postid`='$postidDB' AND `username`='$loginuserid'";

                $ress=mysqli_query($con,$checklikesql);

                if(mysqli_num_rows($ress)>0)
                {?>

<button class="btn btn-primary" onclick="dislikepost(<?php echo $row['id']; ?>)"><i class="fa fa-light fa-thumbs-down"></i> Dislike <?php
                         $usersql="SELECT * FROM `likedata` where `postid`='$postidDB'";
                         echo mysqli_num_rows(mysqli_query($con,$usersql));
                         ?></button>

                   
<?php
                }else
                {?>
  <button class="btn btn-primary" onclick="likepost(<?php echo $row['id']; ?>)"><i class="fa fa-light fa-thumbs-up"></i> Like <?php
                    $usersql="SELECT * FROM `likedata` where `postid`='$postidDB'";
                    echo mysqli_num_rows(mysqli_query($con,$usersql));
                    ?></button>
               <?php }

?>
        

       
     </div>
     <div class="col">
         <button class="btn btn-primary" onclick="setpostid(<?php echo $row['id']; ?>)" data-bs-toggle="modal" data-bs-target="#commentmodel"><i class="fa fa-regular fa-comment"></i> Comment</button>
     </div>
     <!-- <div class="col">
         <a href="#"><i class="fa fa-light fa-share"></i></a>
     </div> -->
    </div>
   
   
 </div>
</div>
</div>
        <?php }
     }
     else
     {
        echo "No Postes are found";
     }

        
    }






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
    function getusergenderbyid($con,$id)
{
    $selectuser="SELECT * FROM `userlist` where `id`='$id'";

    $result=mysqli_query($con,$selectuser);

    $row=mysqli_fetch_assoc($result);

    return $row['gender'];
}
    function getusernamebyidINpost($con,$id)
{
    $selectuser="SELECT * FROM `postdata` where `id`='$id'";

    $result=mysqli_query($con,$selectuser);

    $row=mysqli_fetch_assoc($result);

    return $row['userid'];
}

?>