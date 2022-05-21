
<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
    header('Location: profile.php');
	exit;
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'store';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$profile=$_SESSION['name'];
    
// $target_file=$_POST['file'];

$target_dir = "../Images/uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
if(isset($_FILES["file"])) {
if (move_uploaded_file($_FILES["file"]["tmp_name"],$target_file)){
echo "The file ". basename( $_FILES["file"]["name"]). " is uploaded.";
} 
else {
echo "Error while uploading your file."; 
}
}else{
echo "File not available"; 
}




if(isset($_POST['update'])){


   
    $query="UPDATE user SET Email='$_POST[email]',Fname='$_POST[fname]',Lname='$_POST[lname]',Address='$_POST[address]',Tel='$_POST[tel]', Password='$_POST[password]',Profile='$target_file' WHERE Email='$profile'";
   

    $query_run=mysqli_query($con,$query);

    if($query_run)
     {
        
        header( 'Location:profile.php?message=updated');



     }

     else{
        echo'<script type="text/javascript">alert("Data Not Updated")</script>';
     }
    
}

echo($target_file);

?>