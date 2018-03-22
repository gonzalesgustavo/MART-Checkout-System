<?php

/*
 * Shane Barton
 */

$user_id = $_GET['uID'];

//bool for switching if user exists
$isUserExists = false;


//Database Information
//$host = 'localhost';
//$username = 'root';
//$password = 'root';
//$db_name = 'test_checkout';
//$tbl_name = 'users';
//
//$link = mysqli_connect("$host", "$username", "$password", "$db_name");

include '../../config/dbconfig.php';
$tbl_name = 'users';

function checkForUser($raw_result) {

    global $user_id, $isUserExists;

    //creates an array of the SQL result data
    $results = mysqli_fetch_array($raw_result);

    if ($user_id == $results['user barcode']) {

        echo "User already exists!";
        $isUserExists = true;

    } else {
        echo "Add new user!";
        $isUserExists = false;
    }

}

//searches the 'users table' using the entered SKU
$query = "SELECT * FROM `users` WHERE `user barcode` = '$user_id'";

if(mysqli_query($link, $query)) {

    $result = mysqli_query($link, $query);
    checkForUser($result);   //gets the item info

    mysqli_free_result($result);    //frees up the result
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($link);
}

//close the link to the database
mysqli_close($link);
?>

<? if($isUserExists == false) : ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add User Mode</title>
</head>
<body>
<h1>ADD Item</h1>
<form action="add_user_confirm.php" method="post">
    ID: <input type="number" name="uID" value="<? echo $user_id ?>" readonly/><br>
    Name: <input type="text" name="uName"/><br>
    Admin Privileges: <select name="uPriv">
        <option value="Manager">Manager</option>
        <option value="Assistant">Assistant</option>
        <option value="Student">Student</option>
    </select>
    <br><br>
    <input type="submit" value="Add User"/>
</form>

</body>
</html>
<?php endif; ?>