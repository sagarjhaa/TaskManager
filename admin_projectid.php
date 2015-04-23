<?php
	session_start();
	$_SESSION['message'] = '';
	include('config.php');
	
	if (isset($_POST['submit'])) {


		//Set the POST results to variables
		$dataprojectid 	= $_POST["projectid"];
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			echo "failed";
		    die("Connection failed: " . mysqli_connect_error());
		}

		//Insert User
		$sql = "INSERT INTO tb_project (projectid) VALUES ('$dataprojectid')";

		if (mysqli_query($conn,$sql)){
		    $_SESSION['message'] = "New record created successfully for project id '$dataprojectid'"; 
		}
		else{
		    $_SESSION['message'] = "Error: " .$sql . "<br>" .mysqli_error($conn);
		}

		mysqli_close($conn);
		header("Location:admin.php");
	}
?>