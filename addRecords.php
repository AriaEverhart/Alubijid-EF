<?php
    $lastName = $_POST['lName'];
    $firstName = $_POST['fName'];
    $age = $_POST['age'];
    $voter = $_POST['voter'];
    $voted = $_POST['voted'];
    $nutrition = $_POST['nutrition'];
    $organization = $_POST['org'];
    $otherName = $_POST['otherName'];



        
    $connection = mysqli_connect('localhost', 'Issa', 'alcordo123');


    $SelectDB = mysqli_select_db($connection, "Alubijid");
        if(!$SelectDB)
            die("Database Selection Failed: ".mysqli_error($connection));
    
    if($organization==11){
        $addOrg = "INSERT INTO other_comm_orgs(Other_ID, Other_Name) VALUES('', '$otherName')";
        echo'<br>';
        $result = mysqli_query($connection, $addOrg)
        or die ('query error');

        $addOrg ="Select Other_ID From Other_comm_orgs WHERE Other_Name = '$otherName' LIMIT 1";
        $result = mysqli_query($connection, $addOrg);
        echo'<br>';
        $temp = mysqli_fetch_row($result);
        $otherID = $temp[0];

        $query = "INSERT INTO resident (Resident_ID, First_Name, Last_Name, Age, Registered_Voter, Voted, Nutrition_ID, Community_ID, Other_ID) VALUES ('', '$firstName', '$lastName', '$age', '$voter', '$voted', '$nutrition', '11', '$otherID')";
        echo'<br>';
        $result = mysqli_query($connection, $query)
        or die ('query error');

    }
    else{
        $query = "INSERT INTO resident (Resident_ID, First_Name, Last_Name, Age, Registered_Voter, Voted, Nutrition_ID, Community_ID) VALUES ('', '$firstName', '$lastName', '$age', '$voter', '$voted', '$nutrition' '$organization')";
        $result = mysqli_query($connection, $query)
            or die ('query error');
    }
        
    

    if(!$query)
        echo('Error in query: ' . mysqli_error($query));

    if($result)
        echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'listRecords.php'</script>";
    else
        echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'listRecords.php'</script>";

    mysqli_close($connection);


?>