<?php

if(isset($_GET['message'])){

	echo'<script type="text/javascript">alert("Data Succesfully Updated")</script>';

}

session_start();
$_SESSION["mail"] =$_POST['myMail'];
$_SESSION["tp"] = $_POST['myMail'];

$con=new mysqli("localhost","root","","store");
if($con->connect_error){
die("Connection failed: " . $con->connect_error);
}

$myMail=$_POST['myMail'];
$myMobile=$_POST['myMobile'];





if(isset ($_POST['submit']))

{


$sql ="SELECT Email,Tel from user WHERE Email='$myMail' ";

$result = $con->query($sql);

if ($result->num_rows > 0) 
{
    //echo "Aviliable";
}
else
{ echo "<h1>no results</h1>"; }





while($row = $result->fetch_assoc()) 
{
     $max=$row["Email"] ;
     $maz=$row["Tel"];
}

if($myMail==$max || $myMobile==$maz){

    
    $_SESSION["mail"] =$_POST['myMail'];
    $_SESSION["tp"] = $_POST['myMail'];

   
}

else{
    
    //echo'<script type="text/javascript">alert(" Account Not Aviliable")</script>';
     header( 'Location:reset.php?message=updated');
    
    
}

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>

  <link rel="stylesheet" href="../Css/header.css">
<style>

body{
      background-image: url(..//Images/myUserBG.jpg);
    }

  input{
            color: rgb(204, 0, 204);
            border-radius: 14px;
            background-color: rgb(246, 246, 246);
            border: none;
            outline: none;
            box-shadow:24px aqua ;
            padding: 14px 12px;
            font-size: medium;
            font-weight: 40px;
            display: block;
            margin-left: auto;
            margin-right: auto;
          
            
        }


        .yo{

          background-color: rgb(47, 234, 125);
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 445px;
          height: 315px;
          border-radius: 14px;
          margin-bottom: 20%;
          margin-top: 8%;
        
}

.dept{

  margin-top: 12px;          
  display: block;
  margin-left: 85px;
  margin-right: auto;
  width: 40%;
  height: 30px;
  border-radius: 4px;
  padding: 12px 4px;
  margin-bottom:10%;


}

h4{

color: rgb(255, 255, 255);
padding : 14px 10px;
font-size: 20px;
}



      </style>
</head>
<body>
  <nav>

    <ul>
         <li><a href="#">Home</a></li>
         <!-- <li><a href="#">Categories</a></li>
         <li><a href="#">My Recipes</a></li> -->
         <li><a href="#">About Us</a></li>
         <li><a href="#">Contact Us</a></li>
         <li><a href="#">Help</a></li>
     </ul>

     <div id="banner">
         <h1>#FOODOVEN</h1>
     </div>
   
   
</nav>

    <h4 >Account Aviliable <?=$myMail?></h4>
   


 <form method='POST' action='LastUpdate.php'> 
 <div class="yo">
  

  <div class="dept">
    <label id="lable">Enter New Password </label><input type ='password' id='password' name='password' required  size='25px'>
  </div>



  <div class="dept">
    <label id ="lable"> Confirm Password </label><input type ='password' id='confirm_password' name='password'required  size='25px'>
  </div>

  <input type='Submit' name='summon' value='Update Password' size='26px' style="margin-top: 20%">
  </form>

</div>


</body>

<script type="text/javascript">

var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
  
  </script>

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
</html>
