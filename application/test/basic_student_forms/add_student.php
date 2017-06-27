<?php

/*
 * Shane Barton
 */

$student_ID = $_GET['sID'];

//bool for switching if user exists
$isStudentExists = false;


//Database Information
$host = 'localhost';
$username = 'root';
$password = 'root';
$db_name = 'test_checkout';
$tbl_name = 'students';

$link = mysqli_connect("$host", "$username", "$password", "$db_name");

function checkForStudent($raw_result) {

    global $student_ID, $isStudentExists;

    //creates an array of the SQL result data
    $results = mysqli_fetch_array($raw_result);

    if ($student_ID == $results['student id']) {

        echo "Student already exists!";
        $isStudentExists = true;

    } else {
        echo "Add new student!";
        $isStudentExists = false;
    }

}

if (mysqli_connect_errno()) {
    echo "Connection failed: ".mysqli_connect_error();
    exit();
} else {
    echo "Connected to " . $db_name . "<br>";

//searches the 'users table' using the entered SKU
    $query = "SELECT * FROM `$tbl_name` WHERE `student id` = '$student_ID'";

    if (mysqli_query($link, $query)) {

        $result = mysqli_query($link, $query);
        checkForStudent($result);   //gets the item info

        mysqli_free_result($result);    //frees up the result
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }

//close the link to the database
    mysqli_close($link);
}
?>

<? if($isStudentExists == false) : ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Student Mode</title>
</head>
<body>
<h1>ADD Student</h1>
<form action="add_student_confirm.php" method="post">
    Student ID: <input type="number" name="sID" value="<? echo $student_ID ?>" readonly/><br>
    Name: <input type="text" name="sName" value="" /><br>
    Email: <input type="text" name="sEmail" value="" /><br>
    Phone Number: <input type="number" name="sPhone" value="" /><br>
    Eligible: <input type="number" name="sEligible" value="" /><br>
    Clearance Level: <input type="number" name="sClearance" value="" ><br>
    Inactive/Active: <input type="number" name="sActive" value="" ><br>
    Amount Owed: <input type="text" name="sAmount" value="" ><br><br>
    <input type="submit" value="Add Student"/>
</form>

</body>
</html>
<?php endif; ?>