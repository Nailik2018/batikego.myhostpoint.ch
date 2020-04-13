<?php
require_once "../collections/DataBase.php";
require_once "../collections/helpfunctions/oldOrNewElos.php";

header("Access-Control-Allow-Origin: *");

header('Content-Type: application/json');

$getLicence = $_GET['licence'] * 1;

$now = date("Y-n-j");
$now = explode("-", $now);
$month = $now[1];
$day = $now[2];

$currentMonth = oldOrNewElos($day, $month);

$LICENCENR = 'LICENCENR';

$playerInformation[$LICENCENR] = $getLicence;

$db = new DataBase();
$db->connection();
echo $db->sqlPreparedStatement( "SELECT * FROM elos
                                        INNER JOIN months ON months.monthID = elos.monthID
                                        WHERE elos.licenceNr = :$LICENCENR LIMIT 12", $playerInformation);
