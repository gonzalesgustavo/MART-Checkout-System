<?php

/*
 * Shane Barton
 */


//Database Information
//$host = 'localhost';
//$username = 'root';
//$password = 'root';
//$db_name = 'test_checkout';
//$tbl_name = 'students';
//
//$link = mysqli_connect("$host", "$username", "$password", "$db_name");

include '../dbconfig.php';

//gets the inputs from the last page
$student_id = $_POST['sID'];
$student_name = $_POST['sName'];
$student_email = $_POST['sEmail'];
$student_phone = $_POST['sPhone'];
$student_eligible = $_POST['sEligible'];
$student_clearance = $_POST['sClearance'];
$student_is_active = $_POST['sActive'];
$student_amt_owed = $_POST['sAmount'];;

//test the connection
if (mysqli_connect_errno()) {
    echo "Connection failed: ".mysqli_connect_error();
    exit();
} else {
    echo "Connected to " . $db_name . "<br>";

    //adds the item to the databse using the input fields
    $query = "INSERT INTO `$tbl_name`(`student id`, `name`, `email`, `phone`, `eligible`, `clearance level`, `inactive/active`, `amount owed`) VALUES ('$student_id', '$student_name', '$student_email', '$student_phone', '$student_eligible', '$student_clearance', '$student_is_active', '$student_amt_owed')";

    if(mysqli_query($link, $query)) {
        echo "New Student added!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);    //closes the link to the database

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Item Mode</title>
</head>
<body>
<h1>Add Item Confirmation</h1>

<form action="add_student_select.php">
    <input type="submit" value="Add Another Item"/>
</form>

<form action="index.php">
    <input type="submit" value="Home"/>
</form>

</body>
</html>
