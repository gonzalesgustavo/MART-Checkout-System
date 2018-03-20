<?php

/*
 * Shane Barton
 */

//Database Information
//$host = 'localhost';
//$username = 'root';
//$password = 'root';
//$db_name = 'test_checkout';
//$tbl_name = 'products';
//
//$link = mysqli_connect("$host", "$username", "$password", "$db_name");
include '../dbconfig.php';

$tbl_name = 'products'; //table name

//gets the inputs from the last page
$item_sku = $_POST['sku'];
$item_name = $_POST['iName'];
$item_desc = $_POST['iDescription'];
$item_clrLvl = $_POST['clearance'];
$item_notes = $_POST['notes'];
$item_APF = $_POST['accPurchFrom'];
$item_status = $_POST['iStatus'];

//test the connection
if (mysqli_connect_errno()) {
    echo "Connection failed: ".mysqli_connect_error();
    exit();
} else {
    echo "Connected to " . $db_name . "<br>";

    //adds the item to the databse using the input fields
    $query = "INSERT INTO `products`(`barcode`, `item name`, `item description`, `clearance level`, `notes`, `account purchased from`, `status of product`) VALUES ('$item_sku', '$item_name', '$item_desc', '$item_clrLvl', '$item_notes', '$item_APF', '$item_status')";

    if(mysqli_query($link, $query)) {
        echo "New item added!";
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

<form action="add_item_select.php">
    <input type="submit" value="Add Another Item"/>
</form>

<form action="index.php">
    <input type="submit" value="Home"/>
</form>

</body>
</html>
