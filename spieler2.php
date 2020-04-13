<?php require_once "assets/header.php" ?>
    <link rel="stylesheet" href="css/spieler.css">
    <title>Ansicht Kaderspieler</title>
<?php require_once "assets/navigation.php" ?>
<br />
<?php $licenceNr = $_GET['licence'];?>

<div class="container">
    <div class="row" id="no-player" >
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                Der Spieler mit der Lizenznummer <?php echo $licenceNr?> ist nicht vorhanden
            </div>
        </div>
    </div>
    <div class="row" id="player-informations">
        <div class="col-12">
            <div class="card-deck">
                <div class="card" id="card-informations">
                    <img src="assets/logos/table-tennis1.svg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Spielerinformationen</h5>
                        <table>
                            <tr><td>Vorname:</td><td></td></tr>
                            <tr><td>Nachname:</td><td></td></tr>
                            <tr><td>Lizenznummer:</td><td></td></tr>
                            <tr><td>Geschlecht:</td><td></td></tr>
                            <tr><td>Geburtsdatum:</td><td></td></tr>
                            <tr><td>Aktuelle Klassierung:</td><td></td></tr>
                            <tr><td>Aktuelle ELO:</td><td></td></tr>
                            <tr id="club"><td>Club:</td></tr>
                            <tr><td>Kategorie:</td><td></td></tr>

                        </table>
                    </div>
                </div>
                <div class="card" id="card-tt">
                    <img src="assets/logos/table-tennis1.svg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tischtennis</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
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
