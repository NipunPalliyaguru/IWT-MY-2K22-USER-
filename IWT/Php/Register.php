
<?php



	




$fName=$_POST['Fname'];
$lName=$_POST['Lname'];

$fullName=$fName." ".$lName;

$ad1=$_POST['state'];
$ad2=$_POST['city'];
$ad3=$_POST['province'];
$ad4=$_POST['country'];

$fullADD=$ad1." , ".$ad2." , ".$ad3." , ".$ad4;

$Tel=$_POST['tel'];

$mail=$_POST['email'];

$pass=$_POST['password'];

// $dp=$_POST['file'];

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




// Database connection
	$conn = new mysqli('localhost','root','','store');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {



		$data=$_POST['data'];
		//echo $data;

		$allData=implode(" ",$data);
		echo $allData;

		

		$stmt = $conn->prepare("insert into user(Fname,Lname,FullName,Address,Tel,Email,Password,Profile,AllCat) 
		values(?,?,?,?,?, ?,?, ?,?)");
		$stmt->bind_param("sssssssss",$fName, $lName,$fullName,$fullADD, $Tel,$mail,$pass,$target_file,$allData);
		$execval = $stmt->execute();
		echo $execval;
		echo "<h1>Registration successfully...</h1>";
		$stmt->close();
		$conn->close();
	}

    ?>