<?php

/*
 * Shane Barton
 */

$item_sku = $_GET['sku'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Item Mode</title>
</head>
<body>
<h1>ADD Item</h1>
<form action="add_confirm.php" method="post">
    SKU: <input type="number" name="sku" value="<? echo $item_sku ?>" readonly/><br>
    Item Name: <input type="text" name="iName"/><br>
    Item Description: <input type="text" name="iDescription"/><br>
    Clearance Level: <input type="number" name="clearance"/><br>
    Notes: <input type="text" name="notes"/><br>
    Account Purchased From: <input type="text" name="accPurchFrom"><br>
    Status of Product: <input type="number" name="iStatus"><br><br>
    <input type="submit" value="Add Item"/>
</form>

</body>
</html>