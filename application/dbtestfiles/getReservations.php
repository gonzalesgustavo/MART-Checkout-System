<?php
/**
 * Created by PhpStorm.
 * User: annamartinez
 * Date: 6/28/2017
 * Time: 11:33 AM
 */
include 'dbconfig.php';

//sessions used to save the data
session_start();


$reservations = "CALL reservations()";

$rows = array();

if($result = mysqli_query($link, $reservations)){

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    echo json_encode($rows);
}