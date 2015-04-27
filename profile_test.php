<?php
	session_start();

	$username1 = $_SESSION['login_user'];
	$userrole = $_SESSION['user_role'];
	$userid   = $_SESSION['user_id'];
	include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee's Task Deck</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/signin.css" rel="stylesheet">
	<link href="css/bootstrap-min.css" rel="stylesheet">

    <link href="css/profilestyle.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
</head>

<body style="background-color:#078032;">
    <div class="container">
	
		<div class="header clearfix">
		        <nav>
		          <ul class="nav nav-pills pull-right">
		            <li role="presentation" class="active"><a href="logout.php">Log Out</a></li>
		          </ul>
		        </nav>
		        <h3 style="color:#FFF">Welcome: <?php echo $username1?></h3>
		</div>

		<div>
            <!-- <div class="maindiv"> -->
            <!-- <div class="divA"> -->
            <div class="divB">
            
            <div class="divD">
            <p>Click On Task</p>
            <?php
            $connection = mysqli_connect($servername, $username, $password, $dbname);
            if (isset($_GET['submit'])) {

            $id = $_GET['did'];
            $empid = $_GET['empid'];
            $datevalue = $_GET['datevalue'];
            $task = $_GET['dtask'];
            $progress = $_GET['dprogress'];

            $sql ="update tb_task set id='$id', empid='$empid', datevalue='$datevalue',task='$task',progress='$progress' where id='$id'";
            $query = mysqli_query($connection,$sql);
            }
            $sql1 = "SELECT tb_task.id,tb_task.empid,tb_task.datevalue,tb_task.task,tb_task.progress from tb_task where tb_task.empid ='$userid'";
            $query = mysqli_query($connection,$sql1);
            $i = 0;
            while ($row = mysqli_fetch_array($query)) {
                $i = $i + 1 ;
            echo "<b><a href='profile_test.php?update={$row['id']}'> Task $i </a></b>";
            echo "<br />";
            }
            ?>
            </div>
            <?php
                if (isset($_GET['submit'])) {
                echo '<div class="form" id="form3"><br>
                <Span>Data Updated Successfuly......!!</span></div>';
                }

                // <br><br><br><br><br>
                if (isset($_GET['update'])) 
                {
                    $update = $_GET['update'];
                    $sql = "SELECT tb_task.id,tb_task.empid,tb_task.datevalue,tb_task.task,tb_task.progress FROM tb_task where tb_task.empid ='$userid' and tb_task.id='$update'";
                    $query1 = mysqli_query($connection,$sql);

                    while ($row1 = mysqli_fetch_array($query1)) 
                    {
                        echo "<form class='form' method='get'>";
                        // echo"<input class='input' type='hidden' name='did' value='{$row1['employee_id']}' />";
                        // echo "<br />";
                        echo "<label color:#000>" . "Task ID:" . "</label>" . "<br />";
                        echo"<input class='input' type='text' name='did' value='{$row1['id']}' />";
                        echo "<br />";
                        echo "<label>" . "Task:" . "</label>" . "<br />";
                        echo"<input class='input' type='text' name='dtask' value='{$row1['task']}' />";
                        echo "<br />";
                        echo "<label>" . "Progress:" . "</label>" . "<br />";
                        echo"<input class='input' type='text' name='dprogress' value='{$row1['progress']}' />";        
                        echo "<br />";
                        echo "<input  type='submit' name='submit' value='update' />";
                        echo "<br />";
                        echo"<input class='input' type='hidden' name='empid' value='{$row1['empid']}' />";
                        echo "<br />";
                        echo"<input class='input' type='hidden' name='datevalue' value='{$row1['datevalue']}' />";
                        echo "</form>";
                    }
                }

                // if (isset($_GET['submit'])) {
                // echo '<div class="form" id="form3"><br><br><br><br><br><br>
                // <Span>Data Updated Successfuly......!!</span></div>';
                // }
                ?>
                <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <!-- </div> -->
                <!-- </div> -->
            <?php
            mysqli_close($connection);
            ?>    

        </div>
        <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'/>
        <script type='text/javascript' src='script.js'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/newscript.js"></script>
	</div>
</body>
</html>