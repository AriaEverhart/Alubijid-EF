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
                        <h1>Other Community Organizations</h1>
                 
						<?php
                            $connection = mysqli_connect('localhost', 'root', '');
                                if ($connection->connect_errno) {
                                    echo ("SQL can't connect to PHP". $connection->connect_error);
                                    exit();
                                }	

                                $SelectDB = mysqli_select_db($connection, "Alubijid");
                                    if(!$SelectDB)
                                        die("Database Selection Failed: ".mysqli_error($connection));

                                $query = 'SELECT * FROM Community_Organization';
                                $result = mysqli_query($connection, $query)
                                or die ('query error');

                                 if(!$query)
                                     ('Error in query: ' . mysqli_error($query));

                                if(mysqli_num_rows ($result)>0){
                                        echo'<div class="table-responsive">';
                                        echo'<table class="table">';
                                        echo"<thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                </tr>
                                            </thead>";

                                    while($row = mysqli_fetch_row($result)){
                                        echo"<tbody>
                                                <tr>
                                                    <td>$row[0]</td>
                                                    <td>$row[1]</td>";
                                        
                                            echo'   <td id = "show" width = 50>
                                                        <form name = "show" action = "listOrgMembers.php" method = "post">
                                                            <button name = "OrgID" type="submit" value="' . $row[0] . '" class="btn btn-default btn-sm"> 
                                                                <span class="glyphicon glyphicon-th-list"></span>
                                                            </button>
                                                            <input type = "text" name = "OrgName" value="' . $row[1] . '" hidden>
                                                        </form>
                                                    </td>';
                                        echo"</tr>";	
                                    }

                                    echo"</tbody>
                                        </table>";
                                }

                                mysqli_close($connection);
                            ?>	
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
