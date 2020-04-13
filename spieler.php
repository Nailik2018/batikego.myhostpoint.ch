<?php require_once "assets/header.php" ?>
    <link rel="stylesheet" href="css/spieler.css">
    <title>Ansicht Kaderspieler</title>
<?php require_once "assets/navigation.php" ?>
<?php require_once "collections/helpfunctions/classment.php" ?>
<?php require_once "collections/helpfunctions/category.php" ?>
<?php require_once "collections/helpfunctions/stdClassToArray.php" ?>
<br />
<?php $licenceNr = $_GET['licence'];?>

<?php

$url_get_player_informations = "https://batikego.myhostpoint.ch/ajax/get_player_informations.php?licence=$licenceNr";
$url_get_player_elos = "https://batikego.myhostpoint.ch/ajax/get_player_elos.php?licence=$licenceNr";
$url_get_player_piste = "https://batikego.myhostpoint.ch/ajax/get_player_piste..php?licence=$licenceNr";

$json = file_get_contents($url_get_player_informations);
$obj = json_decode($json);

$playerInformation = stdClassToArray($obj[0]);

$json = file_get_contents($url_get_player_elos);
$obj = json_decode($json);

$playerElos = stdClassToArray($obj);

echo "<pre>";
print_r($playerElos);
echo "</pre>";

?>

<div class="container">
    <?php
    if(count($playerInformation) == 0){
        echo '<div class="row">';
        echo '<div class="col-12">';
        echo '<div class="alert alert-danger" role="alert">';
        echo " Der Spieler mit der Lizenznummer $licenceNr ist nicht vorhanden!";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        exit();
    }
    ?>
    <div class="row" id="player-informations">
        <div class="col-12">
            <div class="card-deck">
                <div class="card" id="card-informations">
                    <img src="assets/logos/table-tennis1.svg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Spielerinformationen</h5>
                        <table>
                            <tr><td>Vorname:</td><td><?php echo $playerInformation['firstname']; ?></td></</tr>
                            <tr><td>Nachname:</td><td><?php echo $playerInformation['lastname']; ?></td></tr>
                            <tr><td>Lizenznummer:</td><td><?php echo $playerInformation['licenceNr']; ?></td></tr>
                            <tr><td>Geschlecht:</td><td><?php echo $playerInformation['gender']; ?></td></tr>
                            <tr><td>Geburtsdatum:</td><td><?php echo $playerInformation['dateOfBirth']; ?></td></tr>
                            <tr><td>Aktuelle Klassierung:</td><td><?php echo getClassment($playerInformation['elo']); ?></td></tr>
                            <tr><td>Aktuelle ELO:</td><td><?php echo $playerInformation['elo']; ?></td></tr>
                            <tr><td>Club:</td><td><?php echo $playerInformation['clubname']; ?></td></tr>
                            <tr><td>Kategorie:</td><td><?php echo getCategory($playerInformation['dateOfBirth']); ?></td></tr>
                        </table>
                    </div>
                </div>
                <div class="card" id="card-tt">
                    <img src="assets/logos/table-tennis1.svg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tischtennis</h5>
                        <table>
                            <tr><td>Monat:</td><td>Wert:</td></tr>
                            <?php
                            foreach ($playerElos as $monthValues){
                                echo "<tr>";
                                echo "<td>";
                                echo $monthValues['month'];
                                echo " ";
                                echo $monthValues['year'];
                                echo "</td>";
                                echo "<td>";
                                echo $monthValues['elo'];;
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="card" id="card-pist">
                    <img src="assets/logos/table-tennis1.svg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Piste Test</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/spieler.js"></script>

<?php require_once "assets/footer.php"?>
