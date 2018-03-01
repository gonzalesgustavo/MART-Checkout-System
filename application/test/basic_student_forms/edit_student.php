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

$tbl_name = 'students'; //table name

//GETS the sku from the last page
$student_ID = $_GET['sID'];

//Initializes variables to be used in forms
$student_name = $student_email = $student_phone = $student_eligible = $student_clearance = $student_is_active = $student_amt_owed = "";

$isStudentFound = false;

/*
 * Searches the database using the entered SKU.
 * Once found, the other fields are populated
 * using the information in the 'products' table.
 */
function getStudentInfo($raw_result) {

    global $isStudentFound, $student_ID, $student_name, $student_email, $student_phone, $student_eligible, $student_clearance, $student_is_active, $student_amt_owed;

    //creates an array of the SQL result data
    $results = mysqli_fetch_array($raw_result);

    if ($student_ID == $results['student id']) {
        echo "Student Found!";
        $isStudentFound = true;

        $student_name = $results['name'];
        $student_email = $results['email'];
        $student_phone = $results['phone'];
        $student_eligible = $results['eligible'];
        $student_clearance = $results['clearance level'];
        $student_is_active = $results['inactive/active'];
        $student_amt_owed = $results['amount owed'];
    } else {
        echo "Student NOT found!";
        $isStudentFound = false;
    }

}

//Tests the connection to the database
if (mysqli_connect_errno()) {
    echo "Connection failed: ".mysqli_connect_error();
    exit();
} else {
    echo "Connected to " . $db_name . "<br>";

    //searches the 'products table' using the entered SKU
    $query = "SELECT * FROM `$tbl_name` WHERE `student id` = '$student_ID'";

    if(mysqli_query($link, $query)) {

        $result = mysqli_query($link, $query);
        getStudentInfo($result);   //gets the item info

        mysqli_free_result($result);    //frees up the result
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }

    //close the link to the database
    mysqli_close($link);

}

?>

<? if($isStudentFound) : ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Student Mode</title>
</head>
<body>
<h1>EDIT Student</h1>
<form action="edit_student_confirm.php" method="post">
    Student ID: <input type="number" name="sID" value="<? echo $student_ID ?>" readonly/><br>
    Name: <input type="text" name="sName" value="<? echo $student_name ?>" /><br>
    Email: <input type="text" name="sEmail" value="<? echo $student_email ?>" /><br>
    Phone Number: <input type="number" name="sPhone" value="<? echo $student_phone ?>" /><br>
    Eligible: <input type="number" name="sEligible" value="<? echo $student_eligible ?>" /><br>
    Clearance Level: <input type="number" name="sClearance" value="<? echo $student_clearance ?>" ><br>
    Inactive/Active: <input type="number" name="sActive" value="<? echo $student_is_active ?>" ><br>
    Amount Owed: <input type="text" name="sAmount" value="<? echo $student_amt_owed ?>" ><br><br>
    <input type="submit" name="save" value="Save Changes"/>
    <br><br>
    <input type="submit" name="delete" value="Delete Student"/>
</form>

</body>
</html>
<?php endif; ?>