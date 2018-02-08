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

//GETS the sku from the last page
$user_id = $_GET['id'];

//Initializes variables to be used in forms
$user_name = $user_privileges = "";

//bool for user found
$isUserFound = false;

/*
 * Searches the database using the entered SKU.
 * Once found, the other fields are populated
 * using the information in the 'products' table.
 */
function getItemInfo($raw_result) {

    global $user_id, $user_name, $user_privileges, $isUserFound;

    //creates an array of the SQL result data
    $results = mysqli_fetch_array($raw_result);

    if ($user_id == $results['user barcode']) {

        echo "User found!";

        $isUserFound = true;

        //Sets the variables to the information form the database
        $user_name = $results['name'];
        $user_privileges = $results['admin privileges'];
    } else {
        echo "User NOT found!";
        $isUserFound = false;
    }

}

//Tests the connection to the database
if (mysqli_connect_errno()) {
    echo "Connection failed: ".mysqli_connect_error();
    exit();
} else {
    echo "Connected to " . $db_name . "<br>";

    //searches the 'users table' using the entered SKU
    $query = "SELECT * FROM `users` WHERE `user barcode` = '$user_id'";

    if(mysqli_query($link, $query)) {

        $result = mysqli_query($link, $query);
        getItemInfo($result);   //gets the item info

        mysqli_free_result($result);    //frees up the result
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }

    //close the link to the database
    mysqli_close($link);

}

?>

<? if($isUserFound) : ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit User Mode</title>
</head>
<body>
<h1>EDIT User</h1>
<form action="edit_confirm.php" method="post">
    User ID: <input type="text" name="uID" value="<? echo $user_id ?>" readonly/><br>
    Name: <input type="text" name="uName" value="<? echo $user_name ?>" /><br>
    Admin Privileges: <input type="text" name="uPriv" value="<? echo $user_privileges ?>" /><br>
    <input type="submit" name="save" value="Save Changes"/>
    <br><br>
    <input type="submit" name="delete" value="Delete User"/>
</form>

</body>
</html>
<?php endif; ?>