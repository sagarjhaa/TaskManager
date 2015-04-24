<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
  // echo $_SESSION['user_role'];
  if($_SESSION['user_role'] == "manager"){header("location: manager.php");}
  elseif($_SESSION['user_role'] == "employee"){header("location: profile_test.php");}
  else{header("location: admin.php");}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="sagarjha">
    <link rel="icon" href="../../favicon.ico">
    <title>TaskForce</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap-min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css">
  </head>

  <body>
    <div class="container">

      <div class="header clearfix">
              <nav>
                <ul class="nav nav-pills pull-right">
                  <li class="active"><a href="#">Log In</a></li>
                  <li class="active"><a href="#">Contact</a></li> <!-- role="presentation" -->
                </ul>
              </nav>
              <h3>TaskManager</h3>
      </div>

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="username" class="form-control" placeholder="Email address" required autofocus> 
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required> 
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        <a href="register.php" class="btn btn-md btn-warning btn-block">Register</a>
        <div>
        <span style="color:Red;font-weight:bold"><?php echo $error; ?></span>
        </div>
      </form>
    </div> <!-- /container -->
  </body>
</html>
