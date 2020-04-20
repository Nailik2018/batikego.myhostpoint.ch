<?php
require_once "../collections/DataBase.php";
require_once "../collections/helpfunctions/oldOrNewElos.php";
require_once "../collections/helpfunctions/htmlentities.php";

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$getLicence = e($_GET['licence'] * 1);

$LICENCENR = 'LICENCENR';
$ajaxName = 'get_player_piste';

$playerInformation[$LICENCENR] = $getLicence;

$db = new DataBase();
$db->connection();
echo $db->sqlPreparedStatement( "SELECT firstname, lastname, players.licenceNr, pisteID, dateOfPistetest, resultTotal FROM piste 
                                INNER JOIN players ON players.licenceNr = piste.licenceNr
                                WHERE piste.licenceNr = :$LICENCENR", $playerInformation);
