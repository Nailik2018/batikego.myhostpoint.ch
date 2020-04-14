<?php
require_once "rgo.php";

function tableRow($discipline, ...$values){
    $output = '';
    $output .= "<tr>";
    $output .= "<td>$discipline</td>";
    $values = $values[0];
    foreach($values AS $singleValue => $value){
        $output .= rgo($value);
    }
    $output .= "</tr>";
    return $output;
}
