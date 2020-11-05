<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>

First Name: <?php echo $_POST["fname"];?><br>
Last Name: <?php echo $_POST["lname"];?><br>
Email: <?php echo $_POST["email"]; ?><br>
Class Year: <?php echo $_POST["year"]; ?><br>
Image Name: <?php echo $_POST["imagename"]; ?><br>
Image Description: <?php echo $_POST["imagedescription"]; ?><br>
In This Photo: <?php echo $_POST["phototag"]; ?><br>

<?php
	$servername = "localhost";
	$username = "julsh1";
	$password = "pipassword";
	$dbname = "csc4790";
	$conn = new mysqli($servername, $username, $password, "$dbname");
	if(mysqli_connect_error()){
		die("Database connection failed " . mysqli_connect_error());
	}
	else{
		echo "Database connection successful";
	}

	if (isset($_POST['submit'])) {
		$first_name = $_POST['fname'];
		$last_name = $_POST['lname'];
		$email = $_POST['email'];
		$classyear = $_POST['year'];
		$sqlstudent = "INSERT INTO student (studentfname,studentlname,studentemail,classyear)
	 			VALUES ('$first_name','$last_name','$email','$classyear')";

	}

	if (mysqli_query($conn, $sqlstudent)) {
		echo " ; New Student record added!";
	} 
	else {
		echo " Error: " . $sqlstudent . " " . mysqli_error($conn);
	}

	if (isset($_POST['submit'])) {
		$imagename = $_POST['imagename'];
		$photodescription = $_POST['imagedescription'];
		$phototag = $_POST['phototag'];
		$sqlphoto = "INSERT INTO photo (imagename,photodescription,phototag)
	 			VALUES ('$imagename','$photodescription', '$phototag')";

	}

	if (mysqli_query($conn, $sqlphoto)) {
		echo " New Photo record added!";
	} 
	else {
		echo " Error: " . $sqlphoto . " " . mysqli_error($conn);
	}

	if (isset($_POST['submit'])) {
		$imagename = $_POST['imagename'];
		$email = $_POST['email'];
		$sqluploads = "INSERT INTO uploads (studentemail, uploadimagename)
	 			VALUES ('$email', '$imagename')";

	}

	if (mysqli_query($conn, $sqluploads)) {
		echo " New Upload record added!";
	} 
	else {
		echo " Error: " . $sqluploads . " " . mysqli_error($conn);
	}

	header("Location:http://10.137.2.143/submit.php");

?>

</body>
</html>