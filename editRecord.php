
<?php
    $id = $_POST['id'];
    $lastName = $_POST['lName'];
    $firstName = $_POST['fName'];
    $age = $_POST['age'];

    $connection = mysqli_connect('localhost', 'Issa', 'alcordo123');
        if ($connection->connect_errno) {
            echo ("SQL can't connect to PHP". $connection->connect_error);
            exit();
        }	

    $SelectDB = mysqli_select_db($connection, "friends");
        if(!$SelectDB)
            die("Database Selection Failed: ".mysqli_error($connection));


    $query = "UPDATE Names SET Last_name='$lastName', First_name='$firstName', Age='$age' WHERE Resident_ID=$id";

    $result = mysqli_query($connection, $query)
        or die ('query error');

    if(!$query)
        echo('Error in query: ' . mysqli_error($query));
    if($result)
        echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'listRecords.php'</script>";
    else
        echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'listRecords.php'</script>";


    mysqli_close($connection);

?>