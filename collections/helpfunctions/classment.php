<?php

function getClassment($elos){

    if($elos <= 659){
        return "D1";
    }elseif ($elos >= 660 AND $elos <= 769){
        return "D2";
    }elseif ($elos >= 770 AND $elos <= 859){
        return "D3";
    }elseif ($elos >= 860 AND $elos <= 929){
        return "D4";
    }elseif ($elos >= 930 AND $elos <= 989) {
        return "D5";
    }elseif ($elos >= 990 AND $elos <= 1039) {
        return "C6";
    }elseif ($elos >= 1040 AND $elos <= 1079) {
        return "C7";
    }elseif ($elos >= 1080 AND $elos <= 1119) {
        return "C8";
    }elseif ($elos >= 1120 AND $elos <= 1159) {
        return "C9";
    }elseif ($elos >= 1160 AND $elos <= 1199){
        return "C10";
    }elseif ($elos >= 1200 AND $elos <= 1239){
        return "B11";
    }elseif ($elos >= 1240 AND $elos <= 1279){
        return "B12";
    }elseif ($elos >= 1280 AND $elos <= 1319){
        return "B13";
    }elseif ($elos >= 1320 AND $elos <= 1359){
        return "B14";
    }elseif ($elos >= 1360 AND $elos <= 1409){
        return "B15";
    }elseif ($elos >= 1410 AND $elos <= 1469){
        return "A16";
    }elseif ($elos >= 1470 AND $elos <= 1539){
        return "A17";
    }elseif ($elos >= 1540 AND $elos <= 1629){
        return "A18";
    }elseif ($elos >= 1630 AND $elos <= 1739){
        return "A19";
    }elseif ($elos >= 1740){
        return "A20";
    }
}