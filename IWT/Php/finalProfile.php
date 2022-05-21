<?php
$profile=$_SESSION['name'];
echo $profile;

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'store';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$eml=$_POST['email'];
echo $eml;

if(isset($_POST['update'])){
   
     $query="UPDATE 'user' SET Email='$_POST[email]',Fname='$_POST[fname]',Lname='$_POST[lname]',Address='$_POST[address]',Tel='$_POST[tel]', Password='$_POST[password]',AllCat='$_POST[data]' WHERE Email='max@gmail.com'";
    

     
     $query_run=mysql_query($connection,$query);

     if($query_run)
     {
        echo'<script type="text/javascript">alert("Data Updated")</script>';


     }

     else{
        echo'<script type="text/javascript">alert("Data Not Updated")</script>';
     }
     
}


?>