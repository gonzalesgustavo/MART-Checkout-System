<?php
/**
 * Created by PhpStorm.
 * User: annamartinez
 * Date: 4/24/17
 * Time: 4:47 PM
 */

//connection variables to the database
$host = "localhost"; //host name
$username = "root"; //mysql username
$password = "root"; //mysql password
$db_name = "mart_checkout"; //database name
$tbl_name = "equipment_reservation"; //table name

//connect to server and access the database
$link = mysqli_connect("$host", "$username", "$password", "$db_name");

//testing the connection
if(mysqli_connect_errno()){
    echo "Connection failed: ".mysqli_connect_error();
    exit();
}