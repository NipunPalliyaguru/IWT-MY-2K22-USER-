<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'store';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

/// User Login
if ($stmt = $con->prepare('SELECT Email, Password FROM user  WHERE Email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	}

if ($stmt->num_rows > 0) {
	$stmt->bind_result($ID, $Password);
	$stmt->fetch();

   
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if ($_POST['password'] == $Password) {
		header('Location: ../Php/profile.php');

		
		//Verification success! User has logged-in!
		//Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_ID();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['ID'] = $ID;
		echo 'Welcome ' . $_SESSION['ID'] . '!';
	} else {
		// Incorrect password
		
		
		

		

	}

	

} 



else {
	// Incorrect username
	echo 'Incorrect username and/or password!';
}

//echo 'Welcome ' . $_SESSION['name'] . '!';

//admin login

if ($stmt = $con->prepare('SELECT UserName, Pword FROM adminacc WHERE UserName = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	}


if ($stmt->num_rows > 0) {
	$stmt->bind_result($ID, $Password);
	$stmt->fetch();

   
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if ($_POST['password'] == $Password) {
		header('Location: ../Php/admin.php');

		
		//Verification success! User has logged-in!
		//Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_ID();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['ID'] = $ID;
		echo 'Welcome ' . $_SESSION['ID'] . '!';
	} else {
		// Incorrect password
		
	}
		
}
	//Nutrtionist login

if ($stmt = $con->prepare('SELECT UserName, Pword FROM nutriacc WHERE UserName = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	}


if ($stmt->num_rows > 0) {
	$stmt->bind_result($ID, $Password);
	$stmt->fetch();

   
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if ($_POST['password'] == $Password) {
		header('Location: ../Php/nutritionist.php');

		
		//Verification success! User has logged-in!
		//Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_ID();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['ID'] = $ID;
		echo 'Welcome ' . $_SESSION['ID'] . '!';
	} else {
		// Incorrect password
		
	}
}
	//addofficer login

if ($stmt = $con->prepare('SELECT UserName, Pword FROM officeracc WHERE UserName = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	}


if ($stmt->num_rows > 0) {
	$stmt->bind_result($ID, $Password);
	$stmt->fetch();

   
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if ($_POST['password'] == $Password) {
		header('Location: ../Php/home.php');

		
		//Verification success! User has logged-in!
		//Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_ID();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['ID'] = $ID;
		echo 'Welcome ' . $_SESSION['ID'] . '!';
	} else {
		// Incorrect password
		
	}
		
}
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<style>
		body{
    height: 100vh;
    width: 100%;
    background-image: url(https://www.wallpapertip.com/wmimgs/3-36163_dark-blur.jpg);
		}
	
	#er{
		width: 500px;
		height: 400px;
		background-color: rgb(70, 30, 102);
		/* padding: 50px 50px ; */
		/* display: block; */
		margin-top: 5%;
		margin-left: auto;
		margin-right: auto;
		border-radius: 18px;
	}
	
	h3{
		color: rgb(255, 255, 255);
		font-family: Arial, Helvetica, sans-serif;
		font-weight: lighter;
		
		display: block;
	/* margin-top: 5%; */
	margin-left: 5%;
	margin-right: auto;
		/* background-color: dodgerblue; */
		
		
	}

	hr{
		margin-bottom: 10%;
	}

	a:link, a:visited {
		
  background-color: #19850f;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 18px;
  box-shadow: black 40px;
  display: block;
	margin-top: 5%;
	margin-left: auto;
	margin-right: auto;
}

a:hover, a:active {
  background-color: rgb(45, 187, 26);
}
	
img{
	width: 150px;
	display: block;
	margin-top: 5%;
	margin-left: auto;
	margin-right: auto;
}

	</style>

</head>
<body >

	<div id="er">
		<br>

		<h3 >Incorrect username or password!</h3>
		<hr size="1">
		<img src="..//Images/wrong-password.png">

		<br><br>

		<a href="..//Html/Login.html" title="Go Back to Login Page">Go back</a>
	</div>


	
</body>
</html>