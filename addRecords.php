<?php
    $lastName = $_POST['lName'];
    $firstName = $_POST['fName'];
    $age = $_POST['age'];
    $voter = $_POST['voter'];
    $voted = $_POST['voted'];
    $nutrition = $_POST['nutrition'];
    $organization = $_POST['org'];
    $otherName = $_POST['otherName'];



        
    $connection = mysql_connect('localhost', 'root', '');


    $SelectDB = mysql_select_db('alubijid');
        if(!$SelectDB)
            die("Database Selection Failed: ".mysql_error($connection));                            
    
    if($organization==11){
        $query = "INSERT INTO other_comm_orgs(Other_ID, Other_Name) VALUES('', '$otherName')";
        echo($query);
        echo'<br>';
        $result = mysql_query($query)
        or die ('query error');
        
        
        $query ="Select Other_ID From Other_comm_orgs WHERE Other_Name = '$otherName' LIMIT 1";
        $result = mysql_query($connection, $query);
        echo($query);
        echo'<br>';
        $temp = mysql_fetch_row($result);
        $otherID = $temp[0];
        
        
        $query = "INSERT INTO resident (Resident_ID, First_Name, Last_Name, Age, Registered_Voter, Voted, Nutrition_ID, Community_ID, Other_ID) VALUES ('', '$firstName', '$lastName', '$age', '$voter', '$voted', '$nutrition', '11', '$otherID')";
        
        echo($query);
        echo'<br>';
        $result = mysql_query($connection, $query)
        or die ('query error');
        
    }
    else{
        $query = "INSERT INTO resident (Resident_ID, First_Name, Last_Name, Age, Registered_Voter, Voted, Nutrition_ID, Community_ID) VALUES ('', '$firstName', '$lastName', '$age', '$voter', '$voted', '$nutrition', '$organization')";
        $result = mysql_query($query)
            or die ('query error');
    }
        
    

    if(!$query)
        echo('Error in query: ' . mysql_error($query));

    if($result)
        echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'listRecords.php'</script>";
    else
        echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'listRecords.php'</script>";

    mysql_close($connection);


?>