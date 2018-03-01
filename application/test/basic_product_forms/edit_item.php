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

//GETS the sku from the last page
$item_sku = $_GET['sku'];

//Initializes variables to be used in forms
$item_name = $item_desc = $item_clrLvl = $item_notes = $item_APF = $item_status = "";

/*
 * Searches the database using the entered SKU.
 * Once found, the other fields are populated
 * using the information in the 'products' table.
 */
function getItemInfo($raw_result) {

    global $item_name, $item_desc, $item_clrLvl, $item_notes, $item_APF, $item_status;

    //creates an array of the SQL result data
    $results = mysqli_fetch_array($raw_result);

    //Sets the variables to the information form the database
    //$item_sku = $results['barcode'];
    $item_name = $results['item name'];
    $item_desc = $results['item description'];
    $item_clrLvl = $results['clearance level'];
    $item_notes = $results['notes'];
    $item_APF = $results['account purchased from'];
    $item_status = $results['status of product'];
}

//Tests the connection to the database
if (mysqli_connect_errno()) {
    echo "Connection failed: ".mysqli_connect_error();
    exit();
} else {
    echo "Connected to " . $db_name . "<br>";

    //searches the 'products table' using the entered SKU
    $query = "SELECT * FROM `products` WHERE `barcode` = '$item_sku'";

    if(mysqli_query($link, $query)) {
        echo "Item found!";

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

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Item Mode</title>
</head>
<body>
<h1>EDIT Item</h1>
<form action="edit_confirm.php" method="post">
    SKU: <input type="text" name="sku" value="<? echo $item_sku ?>" readonly/><br>
    Item Name: <input type="text" name="iName" value="<? echo $item_name ?>" /><br>
    Item Description: <input type="text" name="iDescription" value="<? echo $item_desc ?>" /><br>
    Clearance Level: <input type="number" name="clearance" value="<? echo $item_clrLvl ?>" /><br>
    Notes: <input type="text" name="notes" value="<? echo $item_notes ?>" /><br>
    Account Purchased From: <input type="text" name="accPurchFrom" value="<? echo $item_APF ?>" ><br>
    Status of Product: <input type="number" name="iStatus" value="<? echo $item_status ?>" ><br><br>
    <input type="submit" name="save" value="Save Changes"/>
    <br><br>
    <input type="submit" name="delete" value="Delete Item"/>
</form>

</body>
</html>