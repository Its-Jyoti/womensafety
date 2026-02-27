<?php
// session_start();
include('config.php');
extract($_POST);

$loginuserid=$_SESSION['id'];


// $getlist="SELECT `list` FROM `abuseword`";

// $results=mysqli_query($con,$getlist);

// $row1=mysqli_fetch_assoc($results);
//     $wordlist=$row1['list'];









if(isset($_POST['fname']) && isset($_POST['lname'])&& isset($_POST['mob'])&& isset($_POST['gender'])&& isset($_POST['dob'])&& isset($_POST['npass']))
{
	$updateprofile="UPDATE `userlist` SET `fname`='$fname',`lname`='$lname',`mob`='$mob',`gender`='$gender',`dob`='$dob',`pass`='$npass' WHERE `id`='$loginuserid'";

    if(mysqli_query($con,$updateprofile))
    {
        echo "done";
    }else
    {
        echo "error";
    }
}


    function getusernamebyid($con,$id)
{
    $selectuser="SELECT * FROM `userlist` where `id`='$id'";

    $result=mysqli_query($con,$selectuser);

    $row=mysqli_fetch_assoc($result);

    return $row['fname'];
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