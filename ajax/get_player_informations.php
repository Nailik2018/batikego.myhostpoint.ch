<?php
require_once "../collections/DataBase.php";
require_once "../collections/helpfunctions/oldOrNewElos.php";

header('Content-Type: application/json');

$getLicence = $_GET['licence'] * 1;

$now = date("Y-n-j");
$now = explode("-", $now);
$month = $now[1];
$day = $now[2];

$currentMonth = oldOrNewElos($day, $month);

$playerInformation['licenceNr'] = $getLicence;
$playerInformation['currentMonth'] = $currentMonth;

$db = new DataBase();
$db->connection();
echo $db->sqlPreparedStatement("SELECT * FROM players 
                                INNER JOIN club ON players.clubID = club.clubID 
                                INNER JOIN genders ON players.genderID = genders.genderID
                                INNER JOIN elos ON players.licenceNr = elos.licenceNr
                                WHERE players.licenceNr = :LICENCENR AND elos.monthID = :CURRENTMONTH LIMIT 1", $playerInformation);
