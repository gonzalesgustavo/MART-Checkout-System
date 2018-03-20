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
$tbl_name = 'users';

//gets the inputs from the last page
$user_id = $_POST['uID'];
$user_name = $_POST['uName'];
$user_privilege = $_POST['uPriv'];


//test the connection
if (mysqli_connect_errno()) {
    echo "Connection failed: ".mysqli_connect_error();
    exit();
} else {
    echo "Connected to " . $tbl_name . " in " . $db_name . "<br>";

    //adds the item to the database using the input fields
    $query = "INSERT INTO `users`(`user barcode`, `name`, `admin privileges`) VALUES ('$user_id', '$user_name', '$user_privilege')";

    if(mysqli_query($link, $query)) {
        echo "New user (" . $user_name . ") added!";
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
    <title>Add User Mode</title>
</head>
<body>
<h1>Add User Confirmation</h1>

<form action="add_user_select.php">
    <input type="submit" value="Add Another User"/>
</form>

<form action="index.php">
    <input type="submit" value="Home"/>
</form>

</body>
</html>
