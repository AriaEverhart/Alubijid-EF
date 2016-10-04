<?php
    $lastName = $_POST['lName'];
    $firstName = $_POST['fName'];
    $age = $_POST['age'];
    $voter = $_POST['voter'];
    $voted = $_POST['voted'];
    $nutrition = $_POST['nutrition'];
    $organization = $_POST['org'];



        
    $connection = mysqli_connect('localhost', 'Issa', 'alcordo123');


    $SelectDB = mysqli_select_db($connection, "Alubijid");
        if(!$SelectDB)
            die("Database Selection Failed: ".mysqli_error($connection));                            

    $query = "INSERT INTO resident (Resident_ID, First_Name, Last_Name, Age, Registered_Voter, Voted, Nutrition_ID, Community_ID) VALUES ('', '$firstName', '$lastName', '$age', '$voter', '$voted', '$nutrition', '$organization')";
    
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