<?php require_once "assets/header.php" ?>
<link rel="stylesheet" href="css/spieler.css">
<title>Ansicht Kaderspieler</title>
<?php require_once "assets/navigation.php" ?>
<?php require_once "collections/helpfunctions/classment.php" ?>
<?php require_once "collections/helpfunctions/category.php" ?>
<?php require_once "collections/helpfunctions/stdClassToArray.php" ?>
<?php require_once "collections/helpfunctions/dateFormat.php" ?>
<?php require_once "collections/helpfunctions/htmlentities.php" ?>

<?php $licenceNr = e($_GET['licence']);?>

<?php
$url_get_player_informations = "https://batikego.myhostpoint.ch/api/get_player_informations.php?licence=$licenceNr";
$url_get_player_elos = "https://batikego.myhostpoint.ch/api/get_player_elos.php?licence=$licenceNr";
$url_get_player_piste = "https://batikego.myhostpoint.ch/api/get_player_piste.php?licence=$licenceNr";

$json = file_get_contents($url_get_player_informations);
$obj = json_decode($json);
$playerInformation = stdClassToArray($obj[0]);

$json = file_get_contents($url_get_player_elos);
$obj = json_decode($json);
$playerElos = stdClassToArray($obj);

$json = file_get_contents($url_get_player_piste);
$obj = json_decode($json);
$playerPiste = stdClassToArray($obj);

?>

<br />
<br />

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary" onclick="window.location.href='https://batikego.myhostpoint.ch'">Zurück zur Übersicht</button>
        </div>
    </div>
    <br>
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
    <div class="row">
        <div class="col-lg-4">
            <div class="card" id="card-informations">
                <img src="assets/logos/user.svg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Spielerinformationen</h5>
                    <table class="table table-striped">
                        <tr><td>Vorname:</td><td><?php echo $playerInformation['firstname']; ?></td></</tr>
                        <tr><td>Nachname:</td><td><?php echo $playerInformation['lastname']; ?></td></tr>
                        <tr><td>Lizenznummer:</td><td><?php echo $playerInformation['licenceNr']; ?></td></tr>
                        <tr><td>Geschlecht:</td><td><?php echo $playerInformation['gender']; ?></td></tr>
                        <tr><td>Geburtsdatum:</td><td><?php echo formatDate($playerInformation['dateOfBirth']); ?></td></tr>
                        <tr><td>Aktuelle Klassierung:</td><td><?php echo getClassment($playerInformation['elo']); ?></td></tr>
                        <tr><td>Aktuelle ELO:</td><td><?php echo $playerInformation['elo']; ?></td></tr>
                        <tr><td>Club:</td><td><?php echo $playerInformation['clubname']; ?></td></tr>
                        <tr><td>Kategorie:</td><td><?php echo getCategory($playerInformation['dateOfBirth']); ?></td></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" id="card-tt">
                <img src="assets/logos/table-tennis1.svg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tischtennis</h5>
                    <?php
                    $playername = $playerInformation['firstname'];
                    echo "<div id='div-button-elo'>";
                    echo "<button id='to-elo-results' class='btn btn-primary' onclick=\"window.location.href='alleEloResultate.php?licence=$licenceNr'\">Alle Eloresultate von $playername ansehen</button>";
                    echo "</div>";
                    ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Monat:</th>
                            <th scope="col">Wert:</th>
                        </tr>
                        </thead>
                        <?php
                        foreach ($playerElos as $monthValues){
                            echo "<tr>";
                            echo "<td>";
                            echo $monthValues['month'];
                            echo " ";
                            echo $monthValues['year'];
                            echo "</td>";
                            echo "<td>";
                            echo $monthValues['elo'];
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" id="card-pist">
                <img src="assets/logos/run.svg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Piste Test</h5>
                    <?php
                    $playername = $playerInformation['firstname'];
                    echo "<div id='div-button-piste'>";
                    echo "<button id='to-piste-results' class='btn btn-primary' onclick=\"window.location.href='allePisteResultate.php?licence=$licenceNr'\">Alle Pisteresultate von $playername ansehen</button>";
                    echo "</div>";
                    ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Datum:</th>
                            <th scope="col">Wert:</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($playerPiste as $pisteValues){
                            echo "<tr>";
                            echo "<td>";
                            echo $pisteValues['dateOfPistetest'];
                            echo "</td>";
                            echo "<td>";
                            echo $pisteValues['resultTotal'];
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<script type="text/javascript" src="js/spieler.js"></script>

<?php require_once "assets/footer.php"?>
