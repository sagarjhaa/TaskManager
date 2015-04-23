<?php
	session_start();
	$_SESSION['message'] = '';
	include('config.php');
	
	if (isset($_POST['submit'])) {


		//Set the POST results to variables
		$dataempid 	= $_POST["employeeid"];
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			echo "failed";
		    die("Connection failed: " . mysqli_connect_error());
		}

		//Insert User
		$sql = "INSERT INTO tb_empid (empid) VALUES ('$dataempid')";

		if (mysqli_query($conn,$sql)){
		    $_SESSION['message'] = "New record created successfully for Employee Id '$dataempid'"; 
		}
		else{
		    $_SESSION['message'] = "Error: " .$sql . "<br>" .mysqli_error($conn);
		}

		mysqli_close($conn);
		header("Location:admin.php");
	}
?>