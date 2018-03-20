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

    /*
     * If the user clicked the save button,
     * the item gets edited...
     */
    if (isset($_POST['save'])) {

        //updates the product
        $query = "UPDATE `products` SET `item name` = '$item_name', `item description` = '$item_desc', `clearance level` = '$item_clrLvl', `notes` = '$item_notes', `account purchased from` = '$item_APF', `status of product` = '$item_status' WHERE `barcode` = '$item_sku'";

        if (mysqli_query($link, $query)) {
            echo "Item edited!";
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
        $query = "DELETE FROM `products` WHERE `barcode` = '$item_sku'";

        if (mysqli_query($link, $query)) {
            echo "Item deleted!";
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
    <title>Edit Item Mode</title>
</head>
<body>
<h1>Edit Item Confirmation</h1>

<form action="edit_item_select.php">
    <input type="submit" value="Edit Another Item"/>
</form>

<form action="index.php">
    <input type="submit" value="Home"/>
</form>

</body>
</html>
