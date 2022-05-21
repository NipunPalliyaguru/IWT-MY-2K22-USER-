<?php session_start();

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
			

$stmt = $con->prepare("SELECT * FROM user WHERE Email= '$profile'");


$stmt->execute();
$stmt->bind_result($password, $fname,$lname,$email3,$ad,$mobile,$email6,$pw,$email8,$cat);
$stmt->fetch();
$stmt->close();
$profile=$_SESSION['name'];
			
?>




<!DOCTYPE html>
<html lang="en">              


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>

    <link rel="stylesheet" href="../Css/header.css">

    <style>
        p{
            text-align: center;
            margin-top: 34px ;
        }

        input{
            color: rgb(204, 0, 204);
            border-radius: 14px;
            background-color: rgb(246, 246, 246);
            border: none;
            outline: none;
            box-shadow:24px aqua ;
            padding: 14px 12px;
            text-align: center;
            font-size: medium;
            font-weight: 40px;
            margin-left: 2%;
        }

        #up{
            margin-top: 12px;
            margin-left: 12px;
            background-color: mediumspringgreen;
            margin-left: auto;
            margin-right: auto;
            width: 20%;
            height: 30px;
            border-radius: 4px;
            padding: 12px 14px;


        }
    </style>
</head>
<body>
    
<nav>

    <ul>
         <li><a href="#">Home</a></li>
         <li><a href="#">Categories</a></li>
         <li><a href="#">My Recipes</a></li>
         <li><a href="#">About Us</a></li>
         <li><a href="#">Contact Us</a></li>
         <li><a href="#">Help</a></li>
     </ul>

     <div id="banner">
         <h1>#FOODOVEN</h1>
     </div>
   <div id="logbtn">
   <a href="logout.php"><button class="logL">Logout</button></a>
   </div>
   <div id="regbtn">
      <a href="#"><H class="logN"><?=$_SESSION['name']?></H></a>
   </div>
</nav>


<div class="content" >
			<h2 style="margin-left: 12px;">Update Profile  &nbsp;<?=$_SESSION['name']?></h2>

			<p id="up"><b></b>Your can update accound detail below:</p>
			<div>

<form action="" method="POST">

    <!-- <h3>Update Deatails</h3> -->

    <div>
    <p>Eamil<br> <input type="email" name="email" value="<?=$_SESSION['name']?>"></p>

    <p> First Name <input type="text" name="fname" value="<?=$fname?>">&nbsp;&nbsp;&nbsp;
    Last Name <input type="text" name="lname" value="<?=$lname?>">
</p>



    <p>Address <br><input type="text" size="50px"  style="padding: 24px 5px;" name="address" value="<?=$ad?>" ></p>

    <p>Mobile<br> <input type="tel" name="tel" value="<?=$mobile?>"></p>

    <p>Password <br><input type="text" name="password" value="<?=$pw?>"></p>


    
</div>
    
   
    
<input type="submit" style="margin-left: 70%;background-color: mediumspringgreen;color: black;" name="update" title ="Update your Details"value="Update">


</form>

<footer id="footer">

        <div id="fbanner">
         <h2>#FOODOVEN</h2>
     </div>
     <div id="social">
         <h5>Follow us on :</h5>
     </div>
     <div id="icon">
         
         <div id="fb"><a href="https://www.facebook.com/" target="_blank"><img src="../Images/facebook.png" class="img1"></a></div>
         <div id="tweet"><a href="https://twitter.com/" target="_blank"><img src="../Images/twitter.png" class="img2"></a></div>
         <div id="insta"><a href="https://www.instagram.com/" target="_blank"><img src="../Images/instragram.png" class="img3"></a></div>
        
     </div>

     <div id="links">
         <h5 id="linkh5"><u>Quick Links</u></h5>
         <ul>
             <li><a href="#">About Us</a></li>
             <li><a href="#">Contact Us</a></li>
             <li><a href="#">Help</a></li>
         </ul>
     </div>
     <div id="copy">
         <p>Copyright &copy; 2022 FoodOven.<br>All Rights Reserved.</p>
     </div>

    </footer>

</body>
</html>



<?php

if(isset($_POST['update'])){
   
    $query="UPDATE user SET Email='$_POST[email]',Fname='$_POST[fname]',Lname='$_POST[lname]',Address='$_POST[address]',Tel='$_POST[tel]', Password='$_POST[password]' WHERE Email='$profile'";
   

    $query_run=mysqli_query($con,$query);

    if($query_run)
     {
        
        header( 'Location:profile.php?message=updated');



     }

     else{
        echo'<script type="text/javascript">alert("Data Not Updated")</script>';
     }
    
}

?>











