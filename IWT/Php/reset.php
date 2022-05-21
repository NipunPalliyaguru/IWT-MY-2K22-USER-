<?php
session_start();

if(isset($_GET['message'])){

	echo'<script type="text/javascript">alert("No Account Aviliable!")</script>';

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
          

        }

        #lable{

          color: rgb(255, 255, 255);
          padding : 14px 10px;
          font-size: 20px;
          margin-top: 29px;
        }

        .yo{

          background-color: rgb(47, 234, 125);
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 445px;
          height: 315px;
          border-radius: 14px;
          margin-bottom: 15%;
          margin-top: 9%;


        }

        p1{
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 100%;
          padding: 13px 15px;
          font-size: 20px;
          text-align: center;
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
<form action="resetTwo.php" method="post">
  <h2>Reset Your Password</h2>


  <div class="yo">

    <p1>Validate Your Account </p1>
  <div class="dept">
    <label id="lable">Email </label><input type="text" name= "myMail" size="25px">
  </div>

<br><bnr>

  <div class="dept">
    <label id ="lable">Mobile </label><input type="text" name= "myMobile" size="25px">
  </div>

  <br><br>  <br>
  <input type="reset" style="margin-left: 25%" name="reset" value="Reset">
  <input type="submit" style="margin-left: 20%" name="submit" value="Check">

</div>

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

//$_SESSION['Username'] = $_POST['myMail'];

?>

