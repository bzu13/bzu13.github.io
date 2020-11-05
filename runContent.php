<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>





<?php
	$servername = "localhost";
	$username = "julsh1";
	$password = "pipassword";
	$dbname = "csc4790";
	$conn = new mysqli($servername, $username, $password, "$dbname");
	if(mysqli_connect_error()){
		//die("Database connection failed " . mysqli_connect_error());
	}
	else{
		//echo "Database connection successful";
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
		//echo " ; New Student record added!";
	} 
	else {
		//echo " Error: " . $sqlstudent . " " . mysqli_error($conn);	
	}

	if (isset($_POST['submit'])) {
		$storyid = $_POST['storyname'];
		$storycontent = $_POST['storycontent'];
		$sqlstory = "INSERT INTO story (storyid,storycontent)
	 			VALUES ('$storyid','$storycontent')";

	}

	if (mysqli_query($conn, $sqlstory)) {
		//echo " New Story record added!";
	} 
	else {
		//echo " Error: " . $sqlstory . " " . mysqli_error($conn);
	}

	if (isset($_POST['submit'])) {
		$storyid = $_POST['storyname'];
		$email = $_POST['email'];
		$sqlsubmits = "INSERT INTO submits (studentemail, uploadstoryid)
	 			VALUES ('$email', '$storyid')";

	}

	if (mysqli_query($conn, $sqlsubmits)) {
		//echo " New Submit record added!";
	} 
	else {
		//echo " Error: " . $sqlsubmits . " " . mysqli_error($conn);
	}


	header("refresh:5;url=thanks.php");


?>
</body>
</html>