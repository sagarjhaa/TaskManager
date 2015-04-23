<?php
//Get the database username, passwords, etc.
if (isset($_POST['submit'])) {

		include('config.php');
		$error='';
		//Set the POST results to variables
		$dataempid 		= $_POST["empid"];
		$dataprojectid 	= $_POST["projectid"];
		$dataempname 	= $_POST["empname"];
		$email 			= $_POST["email"];
		$pswrd 			= md5($_POST["password"]);
		$datarole 		= $_POST["role"];

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			echo "failed";
		    die("Connection failed: " . mysqli_connect_error());
		}

		//Insert User
		$sql = "INSERT INTO empdata (empid,projectid,empname,useremail, pass,role) VALUES ('$dataempid','$dataprojectid','$dataempname','$email','$pswrd','$datarole')";

		if (mysqli_query($conn,$sql)){
		    // echo "New record created successfully";
		    $error = "New record created successfully";
		}
		else{
		    $error = "Error: " .$sql . "<br>" .mysqli_error($conn);
		    // $error = "Check employeeId or email";
		}

		mysqli_close($conn);
	}
?>


