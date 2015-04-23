<?php
session_start(); // Starting Session
include('config.php');
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else
	{
		// Define $username and $password
		$email=$_POST['username'];
		$pswrd=md5($_POST['password']);

		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysqli_connect($servername, $username, $password, $dbname);

		if (!$connection) {
			echo "failed";
    		die("Connection failed: " . mysqli_connect_error());
		}
		
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		
		// SQL query to fetch information of registerd users and finds user match.
		$sql = "SELECT empname,role,empid,projectid FROM empdata WHERE useremail='$email' AND pass='$pswrd'";
		$query = mysqli_query($connection,$sql);

		$rows = mysqli_num_rows($query);
			if ($rows == 1) {
				
				$result = mysqli_fetch_array($query);
				$_SESSION['login_user']=$result['empname']; // Initializing Session
				$_SESSION['user_role']=$result['role'];
				$_SESSION['user_id']=$result['empid'];
				$_SESSION['project_id']=$result['projectid'];
			} 
			else 
			{
				$error = "Username or Password is invalid";
			}
		mysqli_close($connection); // Closing Connection
	}
}
?>