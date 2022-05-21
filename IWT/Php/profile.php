<?php



if(isset($_GET['message'])){

	echo'<script type="text/javascript">alert("Data Succesfully Updated")</script>';

}
session_start();

if (!isset($_SESSION['loggedin'])) {
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
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		
		<!-- <link rel="stylesheet" href="../Css/index.css"> -->
    	<link rel="stylesheet" href="../Css/header.css">

		<style>

			th,td{
				color: rgb(255, 255, 255);
				margin-left: auto;
				margin-right: auto;
				width: 50%;	
				background-color: rgb(15, 165, 55);	
				line-height: 50px;
				font-weight: bolder;
				font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
				/* border-radius: 12px; */
				padding: 12px 5px;
				
				
			}

			tr{
				line-height: 60px;
			}

			div.content{

				margin-bottom: 20px;
			}

			table{
				 /* display: block; */
				margin-left: auto;
				margin-right: auto;
				/* width: 50%; */
				margin-bottom:9px;
				margin-top: 5%;
				text-align: center;
				height: auto;
			}

		</style>

	</head>
	<body class="loggedin" >

	<nav style="margin-bottom: 2%;">

<ul>
	 <li><a href="#">Home</a></li>
	 <!-- <li><a href="#">Categories</a></li> -->
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
			<h2 style="margin-left: 12px;">Profile Page &nbsp;<?=$_SESSION['name']?></h2>

			<p style="margin-top: 12px; margin-left: 12px;"><b></b>Your account details are below:</p>
			<div>


<form method="POST" action="UserUpdate.php">
			
				<center>
				<table>
				
					<tr>
						<td>Email:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>First Name:</td>
						<td><?=$fname?></td>
					</tr>
				
					<tr>
						<td>Last Name:</td>
						<td><?=$lname?></td>
					</tr>
					
					<tr>
						<td>Address:</td>
						<td><?=$ad?></td>
					</tr>
					<tr>
						<td>Mobile :</td>
						<td><?=$mobile?></td>
					</tr>
					
					<tr>
						<td>Account Password:</td>
						<td><?=$pw?></td>
					</tr>
					<!-- <tr>
						<td>Favourite Category/Categories:</td>
						<td><?=$cat?></td>
					</tr> -->
					
					
					
				</table>
				<div style="text-align:center; margin-bottom: 10%;">
					<a href="UserUpdate.php"><input type="button" title="Chick here to Edit "style="padding: 24px 12px; " class="Edit" value="Edit"></a>
					</div>
				</center>
</form>
			</div>
		</div>

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