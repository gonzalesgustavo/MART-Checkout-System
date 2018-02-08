<?php

/*
 * Shane Barton
 */

//Database Information
//$host = 'localhost';
//$username = 'root';
//$password = 'root';
//$db_name = 'test_checkout';
//$tbl_name = 'users';
//
//$link = mysqli_connect("$host", "$username", "$password", "$db_name");

include '../dbconfig.php';

//gets the inputs from the last page
$user_id = $_POST['uID'];
$user_name = $_POST['uName'];
$user_privilege = $_POST['uPriv'];

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
        $query = "UPDATE `users` SET `name` = '$user_name', `admin privileges` = '$user_privilege' WHERE `user barcode` = '$user_id'";

        if (mysqli_query($link, $query)) {
            echo "User edited!";
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
        $query = "DELETE FROM `users` WHERE `user barcode` = '$user_id'";

        if (mysqli_query($link, $query)) {
            echo "User deleted!";
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
    <title>Edit User Mode</title>
</head>
<body>
<h1>Edit User Confirmation</h1>

<form action="edit_user_select.php">
    <input type="submit" value="Edit Another User"/>
</form>

<form action="index.php">
    <input type="submit" value="Home"/>
</form>

</body>
</html>
