<?php
	session_start();

	$username = $_SESSION['login_user'];
	$userrole = $_SESSION['user_role'];
	// echo $username;
	// echo $userrole;
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

		<div>
			<?php
				echo "Nothing to show";
			?>
		</div>
	</div>
</body>
</html>