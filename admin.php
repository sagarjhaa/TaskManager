<?php
	session_start();
	$username = $_SESSION['login_user'];
	$userrole = $_SESSION['user_role'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Your Home Page</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/signin.css" rel="stylesheet">
	<link href="css/bootstrap-min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css">
</head>

<body>
	<div class="container">
	
		<div class="header clearfix">
		        <nav>
		          <ul class="nav nav-pills pull-right">
		            <li role="presentation" class="active"><a href="logout.php">Log Out</a></li>
		          </ul>
		        </nav>
		        <h3 class="text-muted">Welcome: <?php echo $username?></h3>
		</div>

		<form class="form-signin" action="admin_projectid.php" method="post">
			<div class="row">
				<div class="col-md-8">
					<!-- <input type="text" id="inputEmail" name="projectid" class="form-control" placeholder="Project Id" required autofocus>  -->
	        		<!-- <label for="inputPassword" class="sr-only">Password</label> -->
	        		<input type="text" name="projectid" placeholder="Project Id">
	        	</div>
	        	<!-- <br> -->
	        	<div class="col-md-4">
	        		<!-- <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button> -->
	        		<br>
	        		<button type="submit" name="submit">Submit</button>
	        	</div>
	        </div>
	        <!-- <div class="row">
	        	<div class="col-md-12">
        		<span style="color:Red;font-weight:bold"><?php echo $_SESSION['message']; ?></span>	 
        		</div>
        	</dir> -->
		</form>
		<br>
		<form class="form-signin" action="admin_employeeid.php" method="post">
			<div class="row">
				<div class="col-md-8">
					<!-- <input type="text" id="inputEmail" name="projectid" class="form-control" placeholder="Project Id" required autofocus>  -->
	        		<!-- <label for="inputPassword" class="sr-only">Password</label> -->
	        		<input type="text" name="employeeid" placeholder="Employee Id">
	        	</div>
	        	<!-- <br> -->
	        	<div class="col-md-4">
	        		<!-- <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button> -->
	        		<br>
	        		<button type="submit" name="submit">Submit</button>
	        	</div>
	        </div>
	        <br>
	        <div class="row">
	        	<div class="col-md-12">
        		<span style="color:Red;font-weight:bold"><?php echo $_SESSION['message']; ?></span>	 
        		</div>
        	</dir>
		</form>
		
		

	</div>
</body>
</html>