<?php
	session_start();
	$_SESSION['message'] = '';
	include('config.php');
	
	if (isset($_POST['submit'])) {


		//Set the POST results to variables
		$empid  = $_POST["empid"];
		$date 	= $_POST["data"];
		$task 	= $_POST["task"];
		
		echo $servername;
		echo $empid;
		echo $date;
		echo $task;
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			echo "failed";
		    die("Connection failed: " . mysqli_connect_error());
		}

		// Insert User
		$sql = "INSERT INTO tb_task (empid,datevalue,task,progress) VALUES ('$empid','$date','$task',0)";

		if (mysqli_query($conn,$sql)){
		    $_SESSION['message'] = "New record created successfully for project id '$dataprojectid'"; 
		}
		else{
		    $_SESSION['message'] = "Error: " .$sql . "<br>" .mysqli_error($conn);
		}

		mysqli_close($conn);
		header("Location:manager.php");
		exit();
	}
?>