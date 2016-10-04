<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>[Alcordo] Search Results</title>

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
                </li>
                <li>
                    <a href="listRecords.php">Show Records</a>
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
                        <h1>Records</h1>
                 
						<?php
                            $id = $_POST['id'];
                            $lastName = $_POST['lName'];
                            $firstName = $_POST['fName'];
                            $age = $_POST['age'];
                            $gender = $_POST['gender'];

                            $connection = mysqli_connect('localhost', 'Issa', 'alcordo123');
                                if ($connection->connect_errno) {
                                    echo ("SQL can't connect to PHP". $connection->connect_error);
                                    exit();
                                }	

                            $SelectDB = mysqli_select_db($connection, "friends");
                                if(!$SelectDB)
                                    die("Database Selection Failed: ".mysqli_error($connection));

                            $where = "WHERE";
                            
                            if(!empty($id)){
                                $where .= " id_number = $id";
                                if(!empty($lastName))
                                    $where .= " AND lastname LIKE '%$lastName%'";
                                if(!empty($firstName))
                                    $where .= " AND firstname LIKE '%$firstName%'";
                                if(!empty($age))
                                    $where .= " AND age = $age";
                                if($gender != 'N')
                                    $where .= " AND gender = '$gender'";
                            }
                            else if(!empty($lastName)){
                                $where .= " lastname LIKE '%$lastName%'";
                                if(!empty($firstName))
                                    $where .= " AND firstname LIKE '%$firstName%'";
                                if(!empty($age))
                                    $where .= " AND age = $age";
                                if($gender != 'N')
                                    $where .= " AND gender = '$gender'";
                            }

                            else if(!empty($firstName)){
                                $where .= " firstname LIKE '%$firstName%'";
                                if(!empty($age))
                                    $where .= " AND age = $age";
                                if($gender != 'N')
                                    $where .= " AND gender = '$gender'";
                            }
                            else if(!empty($age)){
                                $where .= " age = $age";
                                if($gender != 'N')
                                    $where .= " AND gender = '$gender'";
                            }
                            else if($gender!='N')
                                $where .= " gender = '$gender'";
                        
                            $query = "SELECT * FROM Names $where";

                            $result = mysqli_query($connection, $query)
                                or die ('query error');

                            if(!$query)
                                echo('Error in query: ' . mysqli_error($query));

                            if(mysqli_num_rows ($result)>0){
                                        echo'<div class="table-responsive">';
                                        echo'<table class="table">';
                                        echo"<thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Last Name</th>
                                                    <th>First Name</th>
                                                    <th>Age</th>
                                                    <th>Gender</th>
                                                </tr>
                                            </thead>";

                                    while($row = mysqli_fetch_row($result)){
                                        echo"<tbody>
                                                <tr>
                                                    <td>$row[0]</td>
                                                    <td>$row[1]</td> 
                                                    <td>$row[2]</td> 
                                                    <td>$row[3]</td>
                                                    <td>$row[4]</td>";
                                        
                                         echo' 
                                            <td id = "delete" width = 20>
                                                <form name = "search" action = "deleteRecord.php" method = "post">
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
                        else
                            echo("No match found");

                            mysqli_close($connection);

                        ?>
                        <br><br>
                        <form method="get" action="searchRecords.html">
                            <button type="submit">Back</button>
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
