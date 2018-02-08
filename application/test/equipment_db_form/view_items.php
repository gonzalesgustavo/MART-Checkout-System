<?php

////Database Information
//$host = 'localhost';
//$username = 'root';
//$password = 'root';
//$db_name = 'mart_checkout';
//$tbl_name = 'products';
//
//$link = mysqli_connect("$host", "$username", "$password", "$db_name");

include '../dbconfig.php';

//Tests the connection to the database
if (mysqli_connect_errno()) {
    echo "Connection failed: ".mysqli_connect_error();
    exit();
} else {
    echo "Connected to " . $db_name . "<br>";

    $query = "SELECT * FROM `$tbl_name`";

    if(mysqli_query($link, $query)) {

        $result = mysqli_query($link, $query);

        echo $result;

        mysqli_free_result($result);    //frees up the result
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }

    //close the link to the database
    mysqli_close($link);

//    echo $query;

}


?>