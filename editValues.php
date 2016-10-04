<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>[Alcordo] Edit Record</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
    
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.html">
                        Home
                    </a>
                <li>
                    Show Records
                </li>
                <li>
                    <a href="listRecords.php">All</a>
                </li>
                <li>
                    <a href="listVoters.php">Voters</a>
                </li>
                <li>
                    <a href="listCommOrg.php">Community Organizations</a>
                </li>
				<li>
                    <a href="listNutStat.php">Nutritional Status</a>
                </li>
                <li>
                    Options
                </li>
                <li>
                    <a href="searchRecords.html">Search Records</a>
                </li>
                <li>
                    <a href="addRecords.html">Add Records</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Edit Record</h3>

                 
						<?php
                            $id = $_POST['edit'];
                            
                        
                            $connection = mysqli_connect('localhost', 'root', '');
                                if ($connection->connect_errno) {
                                    echo ("SQL can't connect to PHP". $connection->connect_error);
                                    exit();
                                }	

                                $SelectDB = mysqli_select_db($connection, "Alubijid");
                                    if(!$SelectDB)
                                        die("Database Selection Failed: ".mysqli_error($connection));

                                $query = "SELECT * FROM Resident WHERE Resident_ID = '$id'";
                                $result = mysqli_query($connection, $query)
                                or die ('query error');

                                 if(!$query)
                                     ('Error in query: ' . mysqli_error($query));
                            
                            while($row = mysqli_fetch_row($result)){
                                $id      = $row[0];
                                $lName   = $row[1];
                                $fName   = $row[2];
                                $age     = $row[3];
                                $voter   = $row[4];
                                $voted   = $row[5];
                                $nutStat = $row[6];
                                $commOrg = $row[7];
                            }
                        
                        
                        
                            echo'
                                <br>
                                <form name = "input" action = "editRecord.php" method="post">
                                    ID:
                                    <input type = "text" name = "id2" readonly="readonly" size="3" value='.$id.'>
                                    <input type = "text" name = "id" value='.$id.' hidden><br><br>
                                    Last Name:<br>
                                    <input type = "text" name = "lName" value='.$lName.'><br><br>
                                    First Name:<br>
                                    <input type = "text" name = "fName" value='.$fName.'><br><br>
                                    Age:<br>
                                    <input type = "text" name = "age"   value='.$age.'><br><br>';
                                    
                        
                                switch($voter){
                                    case 'Y':  echo'Registered Voter?:<br>
                                                    <input type="radio" name="voter" value="Y" checked="checked">Yes
                                                    <input type="radio" name="voter" value="N"> No<br><br>';
                                               break;
                                    case 'N':  echo'Registered Voter?:<br>
                                                    <input type="radio" name="voter" value="Y"> Yes
                                                    <input type="radio" name="voter" value="N" checked="checked">No<br><br>';
                                               break;
                                }
                                
                                switch($voted){
                                    case 'Y':  echo'Voted Last Elections?:<br>
                                                    <input type="radio" name="voted" value="Y" checked="checked">Yes
                                                    <input type="radio" name="voted" value="N">No<br><br>';
                                                break;
                                    case 'N':  echo'Voted Last Elections?:<br>
                                                    <input type="radio" name="voted" value="Y">Yes
                                                    <input type="radio" name="voted" value="N" checked="checked">No<br><br>';
                                                break;
                                }
                                
                                echo'Nutritional Status:<br>
                                    <select name="nutrition">';
                                switch($nutStat){
                                    case 1:echo'<option value="1">Above Normal</option>
                                                  <option value="2">Normal</option>
                                                  <option value="3">Below Normal(moderate)</option>
                                                  <option value="4">Below Normal(severe)</option>';
                                                  break;
                                        
                                    case 2:echo'<option value="1">Above Normal</option>
                                                  <option value="2" selected="selected">Normal</option>
                                                  <option value="3">Below Normal(moderate)</option>
                                                  <option value="4">Below Normal(severe)</option>';
                                                  break;
                                        
                                    case 3:echo'<option value="1">Above Normal</option>
                                                  <option value="2">Normal</option>
                                                  <option value="3" selected="selected">Below Normal(moderate)</option>
                                                  <option value="4">Below Normal(severe)</option>';
                                                  break;
                                    
                                    case 4:echo'<option value="1">Above Normal</option>
                                                  <option value="2">Normal</option>
                                                  <option value="3">Below Normal(moderate)</option>
                                                  <option value="4" selected="selected">Below Normal(severe)</option>'; 
                                                  break;
                                }
                                echo'</select><br><br>
                                     Community Organization:<br>
                                     <select name="org">';
                        
                                switch($commOrg){
                                    case 1:echo'  <option value="1" selected="selected">Religious</option>
                                                  <option value="2">Youth</option>
                                                  <option value="3">Cultural</option>
                                                  <option value="4">Political</option>
                                                  <option value="5">Womens</option>
                                                  <option value="6">Agricultural</option>
                                                  <option value="7">Labor</option>
                                                  <option value="8">Civic</option>
                                                  <option value="9">Cooperatives</option>
                                                  <option value="10">Senior Citizens</option>
                                                  <option value="11">Others</option>';
                                        break;
                        
                                    case 2:echo'  <option value="1">Religious</option>
                                                  <option value="2" selected="selected">Youth</option>
                                                  <option value="3">Cultural</option>
                                                  <option value="4">Political</option>
                                                  <option value="5">Womens</option>
                                                  <option value="6">Agricultural</option>
                                                  <option value="7">Labor</option>
                                                  <option value="8">Civic</option>
                                                  <option value="9">Cooperatives</option>
                                                  <option value="10">Senior Citizens</option>
                                                  <option value="11">Others</option>';
                                        break;
                        
                                    case 3:echo'  <option value="1">Religious</option>
                                                  <option value="2">Youth</option>
                                                  <option value="3" selected="selected">Cultural</option>
                                                  <option value="4">Political</option>
                                                  <option value="5">Womens</option>
                                                  <option value="6">Agricultural</option>
                                                  <option value="7">Labor</option>
                                                  <option value="8">Civic</option>
                                                  <option value="9">Cooperatives</option>
                                                  <option value="10">Senior Citizens</option>
                                                  <option value="11">Others</option>';
                                        break;
                        
                                    case 4:echo'  <option value="1">Religious</option>
                                                  <option value="2">Youth</option>
                                                  <option value="3">Cultural</option>
                                                  <option value="4" selected="selected">Political</option>
                                                  <option value="5">Womens</option>
                                                  <option value="6">Agricultural</option>
                                                  <option value="7">Labor</option>
                                                  <option value="8">Civic</option>
                                                  <option value="9">Cooperatives</option>
                                                  <option value="10">Senior Citizens</option>
                                                  <option value="11">Others</option>';
                                        break;
                        
                                    case 5:echo'  <option value="1">Religious</option>
                                                  <option value="2">Youth</option>
                                                  <option value="3">Cultural</option>
                                                  <option value="4">Political</option>
                                                  <option value="5" selected="selected">Womens</option>
                                                  <option value="6">Agricultural</option>
                                                  <option value="7">Labor</option>
                                                  <option value="8">Civic</option>
                                                  <option value="9">Cooperatives</option>
                                                  <option value="10">Senior Citizens</option>
                                                  <option value="11">Others</option>';
                                        break;
                        
                                    case 6:echo'  <option value="1">Religious</option>
                                                  <option value="2">Youth</option>
                                                  <option value="3">Cultural</option>
                                                  <option value="4">Political</option>
                                                  <option value="5">Womens</option>
                                                  <option value="6" selected="selected">Agricultural</option>
                                                  <option value="7">Labor</option>
                                                  <option value="8">Civic</option>
                                                  <option value="9">Cooperatives</option>
                                                  <option value="10">Senior Citizens</option>
                                                  <option value="11">Others</option>';
                                        break;
                        
                                    case 7:echo'  <option value="1">Religious</option>
                                                  <option value="2">Youth</option>
                                                  <option value="3">Cultural</option>
                                                  <option value="4">Political</option>
                                                  <option value="5">Womens</option>
                                                  <option value="6">Agricultural</option>
                                                  <option value="7" selected="selected">Labor</option>
                                                  <option value="8">Civic</option>
                                                  <option value="9">Cooperatives</option>
                                                  <option value="10">Senior Citizens</option>
                                                  <option value="11">Others</option>';
                                        break;
                        
                                    case 8:echo'  <option value="1">Religious</option>
                                                  <option value="2">Youth</option>
                                                  <option value="3">Cultural</option>
                                                  <option value="4">Political</option>
                                                  <option value="5">Womens</option>
                                                  <option value="6">Agricultural</option>
                                                  <option value="7">Labor</option>
                                                  <option value="8" selected="selected">Civic</option>
                                                  <option value="9">Cooperatives</option>
                                                  <option value="10">Senior Citizens</option>
                                                  <option value="11">Others</option>';
                                        break;
                                        
                                    case 9:echo'  <option value="1">Religious</option>
                                                  <option value="2">Youth</option>
                                                  <option value="3">Cultural</option>
                                                  <option value="4">Political</option>
                                                  <option value="5">Womens</option>
                                                  <option value="6">Agricultural</option>
                                                  <option value="7">Labor</option>
                                                  <option value="8">Civic</option>
                                                  <option value="9" selected="selected">Cooperatives</option>
                                                  <option value="10">Senior Citizens</option>
                                                  <option value="11">Others</option>';
                                        break;
                                        
                                    case 10:echo' <option value="1">Religious</option>
                                                  <option value="2">Youth</option>
                                                  <option value="3">Cultural</option>
                                                  <option value="4">Political</option>
                                                  <option value="5">Womens</option>
                                                  <option value="6">Agricultural</option>
                                                  <option value="7">Labor</option>
                                                  <option value="8">Civic</option>
                                                  <option value="9">Cooperatives</option>
                                                  <option value="10" selected="selected">Senior Citizens</option>
                                                  <option value="11">Others</option>';
                                        break;
                                        
                                    case 11:echo' <option value="1">Religious</option>
                                                  <option value="2">Youth</option>
                                                  <option value="3">Cultural</option>
                                                  <option value="4">Political</option>
                                                  <option value="5">Womens</option>
                                                  <option value="6">Agricultural</option>
                                                  <option value="7">Labor</option>
                                                  <option value="8">Civic</option>
                                                  <option value="9">Cooperatives</option>
                                                  <option value="10">Senior Citizens</option>
                                                  <option value="11" selected="selected">Others</option>';
                                        break;
                                }
                                                                      
                        echo'</select>';            
                        echo'   <button type="submit">Confirm</button>
                                </form>';
                        ?>
                        <form method="get" action="listRecords.php">
                            <button type="submit">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
	
    
</body>
</html>
