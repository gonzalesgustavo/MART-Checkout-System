<?php

/*
 * Shane Barton
 */

////Database Information
//$host = 'localhost';
//$username = 'root';
//$password = 'root';
//$db_name = 'mart_checkout';
//$tbl_name = 'products';
//
//$link = mysqli_connect("$host", "$username", "$password", "$db_name");

include '../dbconfig.php';

//GETS the sku from the last page
$item_sku = $_POST['sku'];

//Initializes variables to be used in forms
$item_name = $item_desc = $item_clrLvl = $item_notes = $item_APF = $item_status = "";

$status_0 = '<option value="out of commission">out of commission</option>';
$status_1 = '<option value="available for checkout">available for checkout</option>';
$status_2 = '<option value="reserved">reserved</option>';
$status_3 = '<option value="available after class">available after class</option>';
$status_4 = '<option value="out for repair">out for repair</option>';

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

<h1>EDIT Item</h1>
<form action="edit_item_confirm.php" method="post">
    SKU: <input type="text" name="eSku" value="<? echo $item_sku ?>"/><br>
    Item Name: <input type="text" name="eName" value="<? echo $item_name ?>" /><br>
    Item Description: <input type="text" name="eDescription" value="<? echo $item_desc ?>" /><br>
    Clearance Level: <input type="text" name="eClearance" value="<? echo $item_clrLvl ?>" /><br>
    Notes: <input type="text" name="eNotes" value="<? echo $item_notes ?>" /><br>
    Account Purchased From: <input type="text" name="eAccPurchFrom" value="<? echo $item_APF ?>" ><br>
    Status of Product: <? echo "(" . $item_status . ")"; ?>
<!--    <input type="text" name="iStatus" value="--><?// echo $item_status ?><!--" ><br>-->
    <select name="eStatus">
              <? if ($item_status == "available for checkout") {
                echo $status_0;
                echo $status_2;
                echo $status_3;
                echo $status_4;

            } else if($item_status == "out of commission") {
                echo $status_1;
                echo $status_2;
                echo $status_3;
                echo $status_4;

            }else if($item_status == "reserved") {
                echo $status_0;
                echo $status_1;
                echo $status_3;
                echo $status_4;

            }else if($item_status == "available after class") {
                echo $status_0;
                echo $status_1;
                echo $status_2;
                echo $status_4;

            }else if($item_status == "out for repair") {
                echo $status_0;
                echo $status_1;
                echo $status_2;
                echo $status_3;

            }

        ?>

    </select>
    <br><br>
    <input type="submit" name="update" value="Update Item" onclick="return confirm('Are you sure you want to UPDATE this item?')"/>
    <br><br>
    <input type="submit" name="delete" value="Delete Item" onclick="return confirm('Are you sure you want to DELETE this item?')"/>
</form>
