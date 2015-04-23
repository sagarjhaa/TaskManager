<?php
	error_reporting(E_ALL);
	session_start();
	$_SESSION['message'] = '';
	include('config.php');
	
	if (isset($_POST['submit'])) {


		//Set the POST results to variables
		$empid  = $_POST["empid"];
		$date 	= $_POST["data"];
		$task 	= $_POST["task"];
		
		echo $servername;
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			echo "failed";
		    die("Connection failed: " . mysqli_connect_error());
		}
		echo $empid;
		echo $date;
		echo $task;
		// Insert User
		$sql = "INSERT INTO tb_task (empid,datevalue,task) VALUES ('$empid','$date','$task')";

		if (mysqli_query($conn,$sql)){
		    $_SESSION['message'] = "New record created successfully for project id '$dataprojectid'"; 
		}
		else{
		    $_SESSION['message'] = "Error: " .$sql . "<br>" .mysqli_error($conn);
		}

		mysqli_close($conn);
		// header("Location:manager.php");
		exit();
	}
	else{
		echo "sagar";
	}
?>