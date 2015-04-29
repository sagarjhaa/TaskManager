<?php
    session_start();
    $username1  = $_SESSION['login_user'];
    $userrole   = $_SESSION['user_role'];
    $userid     = $_SESSION['user_id'];
    $projectid  = $_SESSION['project_id'];
    include('config.php');
?>

<!DOCTYPE html>
<html>
    <head>
    	<title>Manager's Task Deck</title>
        <!-- <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'/> -->
        
        <link href="css/bootstrap-min.css" rel="stylesheet">
        <link href="css/newstyle.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css">        
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <!-- polyfiller file to detect and load polyfills -->
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>

	</head>
    
	<body style="background-color:#1C2A52;">
        <div class="container">

            <div class="header clearfix">
                <nav>
                  <ul class="nav nav-pills pull-right">
                    <li role="presentation" class="active"><a href="logout.php">Log Out</a></li>
                  </ul>
                </nav>
                <h3 style="color:#FFF;">Welcome: <?php echo $username1?></h3>
            </div>


            <form method="post" action="manager_action.php">
                <table>
                    <tr class="row">
                        <td class="col-md-4" align="right" style="color:#FFF;">
                            Employee Name: 
                        </td>
                        <td class="col-md-4">
                            <?php
                            $link = mysqli_connect($servername, $username, $password, $dbname);

                            $sql = "SELECT empname,empid FROM empdata where projectid = '$projectid' and empid <> '$userid'";

                            $result = mysqli_query($link,$sql);


                            if ($result != 0) {
                                // echo '<label>Project id:';
                                echo '<select class="col-md-4" name="empid">';
                                echo '<option value="">Employee Id</option>';

                                $num_results = mysqli_num_rows($result);
                                for ($i=0;$i<$num_results;$i++) {
                                    $row = mysqli_fetch_array($result);
                                    $empname = $row['empname'];
                                    $name = $row['empid'];
                                    echo '<option style="color: #000;" value="'.$name.'">'.$empname.'</option>'; 
                                    // '.$name. '
                                }

                                echo '</select>';
                                echo '</label>';
                            }

                            mysqli_close($link);

                        ?>                                                    
                        </td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-4" align="right" style="color:#FFF;">
                            Task Date: 
                        </td>
                        <td class="col-md-4">
                        
                            <input style="color:#000;" type="date" name="data" value="Enter data in yyyy-mm-dd">
                        </td>
                    </tr>

                    <tr class="row">
                        <td class="col-md-4" align="right" style="color:#FFF;"> 
                            Actual Task:
                        </td>
                        <td class="col-md-8">
                            <!-- <input type="text" name="message" value="Type your text here!"> -->

                            <textarea class="form-control" name="task" rows="2"></textarea>
                        </td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-4">
                        </td>
                        <td class="col-md-8">
                            <input type="submit" name="submit" style="background-color:#ffa500;color:#FFF; border-color:#ffa500">
                        </td>
                    </tr>
                </table>
            </form>
            
            <div>
                <?php
                    $link = mysqli_connect($servername, $username, $password, $dbname);
                    $sql = "SELECT tb_task.id,tb_task.empid,tb_task.datevalue,tb_task.task,tb_task.progress,empdata.empname FROM tb_task,empdata where empdata.projectid = '$projectid' and empdata.empid = tb_task.empid order by tb_task.empid,tb_task.datevalue desc";
                    // $sql = "SELECT id,empid,datevalue,task FROM tb_task order by empid";
                    $result = mysqli_query($link,$sql);

                    if ($result != 0) {
                        echo '<dl class="accordion">';
                        $num_results = mysqli_num_rows($result);
                        $menu = 'menu';
                        echo '<div id='.$menu.'>';

                        $row = mysqli_fetch_array($result);
                        // $empid  = $row['empid'];
                        $empid  = $row['empname'];
                        $data   = $row['datevalue'];
                        $task   = $row['task'];
                        $tp   = $row['progress'];
                        
                        $temp = $empid;

                        echo '<h3>'.$empid.'</h3>';
                        echo '<div>';
                        echo '<p>'.''.$data.': '.$task.'</p>';
                        echo '<div class="progress">';
                        echo '<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:'.$tp.'%;min-width:2em;">';
                        echo $tp.'%';
                        echo '</div>';
                        echo '</div>';

                        for ($i=0;$i<$num_results-1;$i++) {

                            $row = mysqli_fetch_array($result);
                            // $empid  = $row['empid'];
                            $empid  = $row['empname'];
                            $data   = $row['datevalue'];
                            $task   = $row['task'];
                            $tp   = $row['progress'];
                           
                            if($temp <> $empid){
                                $temp = $empid;
                                echo '</div>';
                                echo '<h3>'.$empid.' </h3>';
                                echo '<div>';
                                echo '<p>'.''.$data.': '.$task.'</p>';

                                echo '<div class="progress">';
                                echo '<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:'.$tp.'%;min-width:2em;">';
                                echo $tp.'%';
                                echo '</div>';
                                echo '</div>';
                            }
                            else{
                                echo '<p>'.''.$data.': '.$task.'</p>';

                                echo '<div class="progress">';
                                echo '<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:'.$tp.'%;min-width:2em;">';
                                echo $tp.'%';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                    }
                    mysqli_close($link);
                ?>
            </div>

        </div>
        <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'/>
        <script type='text/javascript' src='script.js'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/newscript.js"></script>
	</body>
</html>







