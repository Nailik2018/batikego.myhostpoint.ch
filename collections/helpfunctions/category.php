<?php

function getCategory($dateOfBirth){

    $playersDateOfBirth = explode("-" , $dateOfBirth);

    $yearOfPlayer = $playersDateOfBirth[0];

    if($yearOfPlayer <= 2001){
        return "Elite";
    }
    if($yearOfPlayer >= 2002 AND $yearOfPlayer <= 2004){
        return "U18";
    }elseif ($yearOfPlayer >= 2005 AND $yearOfPlayer <= 2006){
        return "U15";
    }elseif ($yearOfPlayer >= 2007 AND $yearOfPlayer <= 2008){
        return "U13";
    }elseif ($yearOfPlayer <= 2009){
        return "U11";
    }
}
