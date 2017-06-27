<?php

/*
 * Shane Barton
 */

//Database Information
$host = 'localhost';
$username = 'root';
$password = 'root';
$db_name = 'test_checkout';
$tbl_name = 'students';

$link = mysqli_connect("$host", "$username", "$password", "$db_name");

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

    /*
     * If the user clicked the save button,
     * the item gets edited...
     */
    if (isset($_POST['save'])) {

        //updates the product
        $query = "UPDATE `$tbl_name` SET `name` = '$student_name', `email` = '$student_email', `phone` = '$student_phone', `eligible` = '$student_eligible', `clearance level` = '$student_clearance', `inactive/active` = '$student_is_active', `amount owed` = '$student_amt_owed' WHERE `student id` = '$student_id'";

        if (mysqli_query($link, $query)) {
            echo "Student edited!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($link);
        }

        mysqli_close($link);

        /*
         * If the user clicked the delete button,
         * the item gets deleted.
         */
    } elseif (isset($_POST['delete'])) {

        //deletes the product
        $query = "DELETE FROM `$tbl_name` WHERE `student id` = '$student_id'";

        if (mysqli_query($link, $query)) {
            echo "Student deleted!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($link);
        }

        mysqli_close($link);    //close the link to database

    } else {
        echo "nothing happened";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Student Mode</title>
</head>
<body>
<h1>Edit Student Confirmation</h1>

<form action="edit_student_select.php">
    <input type="submit" value="Edit Another Student"/>
</form>

<form action="index.php">
    <input type="submit" value="Home"/>
</form>

</body>
</html>
