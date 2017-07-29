<?php
/**
 * Created by PhpStorm.
 * User: annamartinez
 * Date: 7/08/2017
 * Time: 11:33 AM
 */
include 'dbconfig.php';
//sessions used to save the data
session_start();
$equipment = "SELECT * FROM `products`";
$rows = array();
if($result = mysqli_query($link, $equipment)){
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    echo json_encode($rows);
}