<?php

function formatDate($dateOfBirth){

    $dateArray = explode("-", $dateOfBirth);

    $year = $dateArray[0];
    $month = $dateArray[1];
    $day = $dateArray[2];

    $output = $day . "." . $month. "." . $year;
    return $output;
}
