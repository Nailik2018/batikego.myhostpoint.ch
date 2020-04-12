<?php require_once "assets/header.php" ?>
    <link rel="stylesheet" href="css/uebersicht.css">
    <title>Ansicht Kaderspieler</title>
<?php require_once "assets/navigation.php" ?>

<?php

$licenceNr = $_GET['licence'];

require_once "ajax/get_player.php";

echo $licenceNr;
