<?php require_once "assets/header.php" ?>
<link rel="stylesheet" href="css/allePisteResultate.css">
<title>Ansicht Pisteresultate</title>
<?php require_once "assets/navigation.php" ?>
<?php require_once "collections/helpfunctions/stdClassToArray.php" ?>
<?php require_once "collections/helpfunctions/rgo.php" ?>
<?php require_once "collections/helpfunctions/trfunction.php" ?>
<?php require_once "collections/helpfunctions/dateFormat.php" ?>

<?php
$licenceNr = $_GET['licence'];

$url_get_player_piste_details = "https://batikego.myhostpoint.ch/api/get_player_piste_details.php?licence=$licenceNr";

$json = file_get_contents($url_get_player_piste_details);
$obj = json_decode($json);
$playerPisteTests = stdClassToArray($obj);

?>
<br/>
<br/>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary" onclick="window.location.href='https://batikego.myhostpoint.ch'">Zurück zur
                Übersicht
            </button>
        </div>
    </div>
    <br>

    <?php
    if (count($playerPisteTests) == 0) {
        echo '<div class="row">';
        echo '<div class="col-lg-12">';
        echo '<div class="alert alert-danger" role="alert">';
        echo " Der Spieler mit der Lizenznummer $licenceNr hat keinen Pistetest oder ist nicht vorhanden!";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        exit();
    }
    ?>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Disziplin:</th>
                    <?php
                    foreach ($playerPisteTests AS $singlePisteTestOfThisPlayer) {
                        echo "<th>";
                        echo formatDate($singlePisteTestOfThisPlayer['dateOfPistetest']);
                        echo "</th>";
                    }
                    ?>
                </thead>
                <tbody>
                <?php
                $table = '';
                $resultTotal = [];
                $pktPendellauf2m = [];
                $pktYoyotest = [];
                $pktSprungAusStand = [];
                $pktExplosivitaetDerArme = [];
                $pktExplosivitaetDerArme = [];
                $pktRumpftest = [];
                $pktRueckentest = [];
                $pktSeilspringenEinzel = [];
                $pktSeilspringenDoppel = [];
                $pktBeweglichkeitstest = [];
                $pktPropriozeptionstest = [];
                $pktBalleimer = [];
                $pktRueckschlag = [];
                $i = 0;

                foreach ($playerPisteTests AS $singlePisteTestOfThisPlayer) {
                    $resultTotal[$i] = $singlePisteTestOfThisPlayer['resultTotal'];
                    $pktPendellauf2m[$i] = $singlePisteTestOfThisPlayer['pktPendellauf2m'];
                    $pktYoyotest[$i] = $singlePisteTestOfThisPlayer['pktYoyotest'];
                    $pktSprungAusStand[$i] = $singlePisteTestOfThisPlayer['pktSprungAusStand'];
                    $pktExplosivitaetDerArme[$i] = $singlePisteTestOfThisPlayer['pktExplosivitaetDerArme'];
                    $pktRumpftest[$i] = $singlePisteTestOfThisPlayer['pktRumpftest'];
                    $pktRueckentest[$i] = $singlePisteTestOfThisPlayer['pktRueckentest'];
                    $pktSeilspringenEinzel[$i] = $singlePisteTestOfThisPlayer['pktSeilspringenEinzel'];
                    $pktSeilspringenDoppel[$i] = $singlePisteTestOfThisPlayer['pktSeilspringenDoppel'];
                    $pktBeweglichkeitstest[$i] = $singlePisteTestOfThisPlayer['pktBeweglichkeitstest'];
                    $pktPropriozeptionstest[$i] = $singlePisteTestOfThisPlayer['pktPropriozeptionstest'];
                    $pktBalleimer[$i] = $singlePisteTestOfThisPlayer['balleimer'];
                    $pktRueckschlag[$i] = $singlePisteTestOfThisPlayer['rueckschlag'];
                    $i++;
                }
                $table .= tableRow("Resultat Total", $resultTotal);
                $table .= tableRow("Pendellauf 2m", $pktPendellauf2m);
                $table .= tableRow("Yoyotest", $pktYoyotest);
                $table .= tableRow("Sprung aus Stand", $pktSprungAusStand);
                $table .= tableRow("Explosivität der Arme:", $pktExplosivitaetDerArme);
                $table .= tableRow("Rumpftest", $pktRumpftest);
                $table .= tableRow("Rückentest", $pktRueckentest);
                $table .= tableRow("Seilspringen einzel", $pktSeilspringenEinzel);
                $table .= tableRow("Seilspringen doppel", $pktSeilspringenDoppel);
                $table .= tableRow("Beweglichkeitstest", $pktBeweglichkeitstest);
                $table .= tableRow("Propriozeptionstest", $pktPropriozeptionstest);
                $table .= tableRow("Balleimer", $pktBalleimer);
                $table .= tableRow("Rückschlag", $pktRueckschlag);
                echo $table;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<br>

<script type="text/javascript" src="js/allePisteResultate.js"></script>

<?php require_once "assets/footer.php" ?>
