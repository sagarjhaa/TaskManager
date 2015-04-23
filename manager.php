<?php
    session_start();
    $username1 = $_SESSION['login_user'];
    $userrole = $_SESSION['user_role'];
    include('config.php');
    
?>

<!DOCTYPE html>
<html>
    <head>
    	<title>Result</title>
        <!-- <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'/> -->
        
        <link href="css/bootstrap-min.css" rel="stylesheet">
        <link href="css/newstyle.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css">

        <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
        <!-- <link rel='stylesheet' type='text/css' href='css/stylesheet.css'/> -->
        
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <!-- // <script type='text/javascript' src='js/script.js'></script> -->
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


            <form method="post" action="manager_action.php">
                <table>
                    <tr class="row">
                        <td class="col-md-4">
                            Employee ID: 
                        </td>
                        <td class="col-md-4">
                            <?php
                            $link = mysqli_connect($servername, $username, $password, $dbname);

                            $sql = "SELECT empid FROM tb_empid;";

                            $result = mysqli_query($link,$sql);


                            if ($result != 0) {
                                // echo '<label>Project id:';
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
                        </td>
                    </tr>

                    <tr class="row">
                        <td class="col-md-4">
                            Task Date: 
                        </td>
                        <td class="col-md-4">
                        
                            <input type="date" name="data" value="Enter data in mm/dd/yy">
                        </td>
                    </tr>

                    <tr class="row">
                        <td class="col-md-4">
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
                            <input type="submit" name="submit">
                        </td>
                    </tr>
                </table>
            </form>
            
            <div>
                <?php
                            $link = mysqli_connect($servername, $username, $password, $dbname);
                            $sql = "SELECT id,empid,datevalue,task FROM tb_task order by empid";
                            $result = mysqli_query($link,$sql);

                            if ($result != 0) {
                                echo '<dl class="accordion">';
                                $num_results = mysqli_num_rows($result);
                                $menu = 'menu';
                                echo '<div id='.$menu.'>';

                                $row = mysqli_fetch_array($result);
                                $empid  = $row['empid'];
                                // $data   = $row['datevalue'];
                                $task   = $row['task'];
                                
                                $temp = $empid;

                                echo '<h3>'.$empid.'</h3>';
                                echo '<div>';
                                echo '<p>'.$task.'</p>';
                                // echo '<p>'.$task.'</p>'

                                for ($i=0;$i<$num_results-1;$i++) {

                                    $row = mysqli_fetch_array($result);
                                    $empid  = $row['empid'];
                                    // $data   = $row['datevalue'];
                                    $task   = $row['task'];
                                   
                                    if($temp <> $empid){

                                        $temp = $empid;
                                        echo '</div>';
                                        echo '<h3>'.$empid.' </h3>';
                                        echo '<div>';
                                        echo '<p>'.$task.'</p>';
                                    }
                                    else{
                                        echo '<p>'.$task.'</p>';
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







