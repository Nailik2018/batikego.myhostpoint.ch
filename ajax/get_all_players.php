<?php
require_once "../collections/DataBase.php";

header('Content-Type: application/json');

$db = new DataBase();
$db->connection();
echo $db->sqlSelectStatement("SELECT * FROM players");
