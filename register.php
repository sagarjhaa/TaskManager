<?php
    include('registration.php') ;
    include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="sagarjha" >

        <title>Company Name - Log In</title>
        <link href="css/bootstrap-min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css">
    </head>

    <body>
        <div class="container">

            <div class="header clearfix">
              <nav>
                <ul class="nav nav-pills pull-right">
                  <li role="presentation" class="active"><a href="index.php">Log In</a></li>
                  <li role="presentation"><a href="#">Contact</a></li>
                </ul>
              </nav>
              <h3 class="text-muted">TaskManager</h3>
            </div>

    	   <form class="form-signin" action="" method="post">
                <h2 class="form-signin-heading">Register</h2>
                
                <div class="row">
                    <div class="col-md-3">
                        <?php
                            $link = mysqli_connect($servername, $username, $password, $dbname);

                            $sql = "SELECT empid FROM tb_empid;";

                            $result = mysqli_query($link,$sql);


                            if ($result != 0) {
                                
                                echo '<select class="col-md-12" name="empid">';
                                echo '<option value="">Employee Id</option>';

                                $num_results = mysqli_num_rows($result);
                                for ($i=0;$i<$num_results;$i++) {
                                    $row = mysqli_fetch_array($result);
                                    $name = $row['empid'];
                                    echo '<option value="' .$name. '">' .$name. '</option>';
                                }

                                echo '</select>';
                                echo '</label>';
                            }

                            mysqli_close($link);

                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                            $link = mysqli_connect($servername, $username, $password, $dbname);

                            $sql = "SELECT projectid FROM tb_project;";

                            $result = mysqli_query($link,$sql);


                            if ($result != 0) {
                                
                                echo '<select class="col-md-12" name="projectid">';
                                echo '<option value="">Project Id</option>';

                                $num_results = mysqli_num_rows($result);
                                for ($i=0;$i<$num_results;$i++) {
                                    $row = mysqli_fetch_array($result);
                                    $name = $row['projectid'];
                                    echo '<option value="' .$name. '">' .$name. '</option>';
                                }

                                echo '</select>';
                                echo '</label>';
                            }

                            mysqli_close($link);

                        ?>
                    </div>
                </div>
                <div class="row">
                </div>
                <div class="row"><div class="col-md-6"><input  type="text"      name="empname"   class="form-control" placeholder="Employee Name"   required=""></div></div>

                <div class="row"><div class="col-md-6"><input  type="text"      name="email"     class="form-control" placeholder="Email Address"   required=""></div></div>
                <div class="row"><div class="col-md-6"><input  type="password"  name="password"  class="form-control" placeholder="Password"        required=""></div></div>
                <div class="row"><div class="col-md-6"><input type="radio" name="role" value="employee" checked> <h5 style="display:inline-block">Employee</h5>
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="role" value="manager"> <h5 style="display:inline-block">Manager </h5></div></div>
                <div class="row">
                <div class="col-md-4"><button type="submit"    name="submit"    class="btn btn-lg btn-primary btn-block"  >Register</button></div>
                </div>
                
             <span style="color:Red;font-weight:bold"><?php echo $error; ?></span>
            </form>
        </div>
    </body>
</html>
