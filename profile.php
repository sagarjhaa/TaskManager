<?php
	session_start();

	$username1 = $_SESSION['login_user'];
	$userrole = $_SESSION['user_role'];
	$userid   = $_SESSION['user_id'];
	include('config.php');
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
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
</head>

<body>
    <div class="container">
	
		<div class="header clearfix">
		        <nav>
		          <ul class="nav nav-pills pull-right">
		            <li role="presentation" class="active"><a href="logout.php">Log Out</a></li>
		          </ul>
		        </nav>
		        <h3 class="text-muted">Welcome: <?php echo $username1?></h3>
		</div>

		<div>
			<h3 class="text-muted">List of Tasks</h3>
			<br>
            <?php
                $link = mysqli_connect($servername, $username, $password, $dbname);
                $sql = "SELECT tb_task.id,tb_task.empid,tb_task.datevalue,tb_task.task,tb_task.progress FROM tb_task where tb_task.empid ='$userid'";
                $result = mysqli_query($link,$sql);

                if ($result >= 0) {
                    echo '<dl class="accordion">';
                    $num_results = mysqli_num_rows($result);
                    $menu = 'menu';
                    echo '<div id='.$menu.'>';

                    $row = mysqli_fetch_array($result);
                    $id     = $row['id']; 
                    $empid  = $row['empid'];
                    $data   = $row['datevalue'];
                    $task   = $row['task'];
                    $tp     = $row['progress'];

                    $temp = $data;

                    echo '<h3>'.$data.'</h3>';
                    echo '<div>';
                    echo '<p>'.''.$id.': '.$task.'</p>';
                    
                    for ($i=0;$i<$num_results-1;$i++) {

                        $row = mysqli_fetch_array($result);
                        $id     = $row['id'];
                        $empid  = $row['empid'];
                        $data   = $row['datevalue'];
                        $task   = $row['task'];
                        $tp     = $row['progress'];
                       
                        if($temp <> $data){

                            $temp = $data;
                            echo '</div>';
                            echo '<h3>'.$data.' </h3>';
                            echo '<div>';
                            echo '<p>'.''.$id.': '.$task.'</p>';
                        }
                        else{
                            echo '<p>'.''.$id.': '.$task.'</p>';
                        }
                    }
                    echo '</div>';
                }
                else{
                	echo "sagar";
                }
                mysqli_close($link);
            ?>
        </div>
        <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'/>
        <script type='text/javascript' src='script.js'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/newscript.js"></script>
	</div>
</body>
</html>