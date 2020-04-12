<?php

function oldOrNewElos($day, $month){

    $output = '';
    $month = (int) $month;
    $day = (int) $day;

    if($month == 1 AND $day < 10){
        $output = 12;
    }elseif($day >= 10){
        $output = $month;
    }else{
        $output = $month - 1;
    }
   return $output;

}
