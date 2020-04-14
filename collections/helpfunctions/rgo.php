<?php
function rgo($value){

    $value = (float) $value;

    if($value >= 0 AND $value <= 4.9){
        return "<td class='red'>" . $value . "</td>";
    }elseif($value >= 5 AND $value <= 7.9){
        return "<td class='orange'>" . $value . "</td>";
    }elseif($value >= 8 AND $value <= 10){
        return "<td class='green'>" . $value . "</td>";
    }else{
        return "<td class='black'>" . $value . "</td>";
    }
}

?>