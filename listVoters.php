<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>[Osiris] List Records</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

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
                   <font color="white">
                    <u><b>SHOW RECORDS:</b></u>
                </li>
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
                    <font color="white">
                    <u><b>OPTIONS:</b></u>
                </li>
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
		<font color="black">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Registered Voters</h1>
                 <font color="white">
						<?php 
						
                            $connection = mysql_connect('localhost', 'root', '');
                                if ($connection->connect_errno) {
                                    echo ("SQL can't connect to PHP". $connection->connect_error);
                                    exit();
                                }	

                                $SelectDB = mysql_select_db('alubijid');
                                    if(!$SelectDB)
                                        die("Database Selection Failed: ".mysql_error($connection));

                                $query = 'SELECT Resident_ID, Last_Name, First_Name, Age, Voted FROM Resident WHERE Age >= 17 AND Registered_Voter="y"';
                                $result = mysql_query($query)
                                or die ('query error');

                                 if(!$query)
                                     ('Error in query: ' . mysql_error($query));

                                if(mysql_num_rows ($result)>0){
                                        echo'<div class="table-responsive">';
                                        echo'<table class="table">';
                                        echo"<thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Last Name</th>
                                                    <th>First Name</th>
                                                    <th>Age</th>
                                                    <th>Voted Last Elections?</th>
                                                </tr>
                                            </thead>";

                                    while($row = mysql_fetch_row($result)){
                                        echo"<tbody>
                                            <tr>
                                                <td>$row[0]</td>
                                                <td>$row[1]</td> 
                                                <td>$row[2]</td> 
                                                <td>$row[3]</td>";
                                        if($row[4]=="N")
                                            echo"<td>No</td>";
                                        else
                                            echo"<td>Yes</td>";
                                        
                                        echo' 
                                            <td id = "delete" width = 20>
                                                <form name = "delete" action = "deleteRecord.php" method = "post">
                                                     <button name = "delete" type="submit" value="' . $row[0] . '" class="btn btn-default btn-sm"> 
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                     </button>
                                                </form>
                                            </td>
                                            
                                            <td id = "edit" width = 20>
                                                <form name = "edit" action = "editValues.php" method = "post">
                                                    <button name = "edit" type="submit" value="'. $row[0] .'" class="btn btn-default btn-sm">
                                                            <span class="glyphicon glyphicon-edit"></span>
                                                    </button>
                                                    <input NAME="lName"  TYPE="hidden" value="'. $row[1] .'"/>
                                                    <input NAME="fName"  TYPE="hidden" value="'. $row[2] .'"/>
                                                    <input NAME="age"    TYPE="hidden" value="'. $row[3] .'"/>
                                                    <input NAME="gender" TYPE="hidden" value="'. $row[4] .'"/>
                                                </form>
                                            </td>';	
                                        
                                        echo"</tr>";	
                                    }

                                    echo"</tbody>
                                        </table>";
                                }

                                mysql_close($connection);
                            ?>	
							</font>
                    </div>
                </div>
            </div>
			</font>
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
