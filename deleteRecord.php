<?php
                        
    $id = $_POST['delete'];

    $connection = mysql_connect('localhost', 'root', '');
        if ($connection->connect_errno) {
            echo ("SQL can't connect to PHP". $connection->connect_error);
            exit();
        }	

        $SelectDB = mysql_select_db('alubijid');
            if(!$SelectDB)
                die("Database Selection Failed: ".mysql_error($connection));

        $query = "DELETE FROM Resident WHERE Resident_ID = $id";
        $result = mysql_query($query)
        or die ('query error');

         if(!$query)
             ('Error in query: ' . mysql_error($query));

        mysql_close($connection);

    if($result)
        echo "<script type='text/javascript'>window.location.href = 'listRecords.php'</script>";
    else
        echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'listRecords.php'</script>";  
?>