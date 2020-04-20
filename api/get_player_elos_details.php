<?php

require_once "../collections/DataBase.php";

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$getLicence = $_GET['licence'] * 1;

$LICENCENR = 'LICENCENR';
$ajaxName = 'get_player_elos_details';

$playerInformation[$LICENCENR] = $getLicence;

$db = new DataBase();
$db->connection();
echo $db->sqlPreparedStatement("SELECT * FROM elos
                                        INNER JOIN months ON months.monthID = elos.monthID
                                        WHERE elos.licenceNr = :$LICENCENR 
                                        ORDER BY elos.elosOfPlayerID", $playerInformation);



