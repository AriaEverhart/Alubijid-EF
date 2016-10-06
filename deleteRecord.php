<?php
                        
    $id = $_POST['delete'];

    $connection = mysqli_connect('localhost', 'root', '');
        if ($connection->connect_errno) {
            echo ("SQL can't connect to PHP". $connection->connect_error);
            exit();
        }	

        $SelectDB = mysqli_select_db($connection, "Alubijid");
            if(!$SelectDB)
                die("Database Selection Failed: ".mysqli_error($connection));

        $query = "DELETE FROM Resident WHERE Resident_ID = $id";
        $result = mysqli_query($connection, $query)
        or die ('query error');

         if(!$query)
             ('Error in query: ' . mysqli_error($query));

        mysqli_close($connection);

    if($result)
        echo "<script type='text/javascript'>window.location.href = 'listRecords.php'</script>";
    else
        echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'listRecords.php'</script>";  
?>