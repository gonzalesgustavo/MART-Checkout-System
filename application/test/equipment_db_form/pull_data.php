<?php
/**
 * Created by PhpStorm.
 * User: annamartinez
 * Date: 4/16/17
 * Time: 11:33 AM
 */
include 'dbconfig.php';

//sessions used to save the data
session_start();

$asset_name_query = "
SELECT      `equipment_reservation`.*, `students`.`name`, `students`.`email`, `students`.`phone`
FROM        `equipment_reservation`
JOIN  `students` ON `equipment_reservation`.`student id` = `students`.`student id`
WHERE       `equipment_reservation`.`date needed` = CURRENT_DATE";
$reservation;


if($result = mysqli_query($link, $asset_name_query)) {

    while ($row = mysqli_fetch_row($result)) {

        $reservation .= "barcode of item " . $row[0];
        $reservation .= "\t\tdate needed " . $row[2] . "\t\tdate due " . $row[3] . "\t\tnotes " . $row[4];
        $reservation .= "\t\tstudent id " . $row[1] . "\t\tstudent name " . $row[5] . "\t\tstudent email " . $row[6];
        $reservation .= "\t\tstudent phone " . $row[7] . "<br>";
    }

    echo $reservation;
}