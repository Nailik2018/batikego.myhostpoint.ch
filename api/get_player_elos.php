<?php
require_once "../collections/DataBase.php";
require_once "../collections/helpfunctions/oldOrNewElos.php";
require_once "../collections/helpfunctions/htmlentities.php";

header("Access-Control-Allow-Origin: *");

header('Content-Type: application/json');

$getLicence = e($_GET['licence'] * 1);

$now = date("Y-n-j");
$now = explode("-", $now);
$month = $now[1];
$day = $now[2];

$currentMonth = oldOrNewElos($day, $month);

$LICENCENR = 'LICENCENR';
$ajaxName = 'get_player_elos';

$playerInformation[$LICENCENR] = $getLicence;

$db = new DataBase();
$db->connection();
echo $db->sqlPreparedStatement( "SELECT * FROM elos
                                        INNER JOIN months ON months.monthID = elos.monthID
                                        WHERE elos.licenceNr = :$LICENCENR 
                                        ORDER BY elos.elosOfPlayerID
                                        DESC LIMIT 13", $playerInformation);
