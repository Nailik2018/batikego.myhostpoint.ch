<?php
require_once "../collections/DataBase.php";
require_once "../collections/helpfunctions/oldOrNewElos.php";
require_once "../collections/helpfunctions/htmlentities.php";

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$getLicence = e($_GET['licence'] * 1);

$now = date("Y-n-j");
$now = explode("-", $now);
$month = $now[1];
$day = $now[2];

$currentMonth = oldOrNewElos($day, $month);

$LICENCENR = "LICENCENR";
$CURRENTMONTH = "CURRENTMONTH";

$playerInformation[$LICENCENR] = $getLicence;
//$playerInformation['licenceNr'] = $getLicence;
$playerInformation[$CURRENTMONTH] = $currentMonth;
//$playerInformation['currentMonth'] = $currentMonth;
$ajaxName = 'get_player_informations';

$db = new DataBase();
$db->connection();
echo $db->sqlPreparedStatement("SELECT * FROM players 
                                INNER JOIN club ON players.clubID = club.clubID 
                                INNER JOIN genders ON players.genderID = genders.genderID
                                INNER JOIN elos ON players.licenceNr = elos.licenceNr
                                WHERE players.licenceNr = :$LICENCENR AND elos.monthID = :$CURRENTMONTH
                                ORDER BY elos.elosOfPlayerID DESC
                                LIMIT 1", $playerInformation);
