<?php
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MART Database</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="main.js"></script>
</head>
<body>
    <h1>MART Equipment Database</h1>
    <br>
    <div id="selectionDiv">
        <button id="btnAddItem">Add Item</button>
<!--        <button id="btnEditItem">Edit Item</button>-->
        <button id="btnViewItems">View Items</button>
    </div>
    <br>

    <div id="selectItemDiv">
        <h3>Select Item</h3>
        <select id="select" name="select">

        </select>
    </div>

    <br>

    <div id="addItemDiv">
        <h3>Add Item</h3>
        <form id="addItemForm" action="" onsubmit="addSubmitForm(); return false;">
            SKU: <input type="text" name="sku"/> *Required<br>
            Item Name: <input type="text" name="iName"/> *Required<br>
            Item Description: <input type="text" name="iDescription"/><br>
            Clearance Level: <input type="text" name="clearance"/><br>
            Notes: <input type="text" name="notes"/><br>
            Account Purchased From: <input type="text" name="accPurchFrom"><br>
            Status of Product:
            <select name="iStatus">
                <option value="0">0 (out of commission)</option>
                <option value="1">1 (available for checkout)</option>
            </select><br>
            <input name="addSkuSubmit" type="submit" value="Add Item">
        </form>

    </div>

    <div id="editItemDiv">


    </div>

<div id="infoDiv">

</div>



</body>
</html>
