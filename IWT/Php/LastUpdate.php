<?php


session_start();
$_SESSION["mail"] ;
$_SESSION["tp"] ;

$Ymail= $_SESSION["mail"] ;

echo $Ymail;


$con=new mysqli("localhost","root","","store");
if($con->connect_error){
die("Connection failed: " . $con->connect_error);
}
else{
   echo "done";
}


$myPass=$_POST['password'];

echo($myPass);

if(isset($_POST['summon'])){
   
    $query="UPDATE user SET Password ='$myPass' WHERE Email='$Ymail'";
    //echo'<script type="text/javascript">alert("Data  Updated")</script>';
    //header( 'Location:..//Html/Login.html?message=updated');

    $query_run=mysqli_query($con,$query);

    if($query_run)
     {
        
        header( 'Location:..//Html/Login.html?message=updated');
        // echo "Done";

         //header( 'Location:profile.php?message=updated');
     }

     else{
        echo'<script type="text/javascript">alert("Data Not Updated")</script>';
     }
    
}


?>