<?php require_once "assets/header.php" ?>

<link rel="stylesheet" href="css/alleEloResultate.css">
<script type="text/javascript" src="frameworks/chartjs/chart.min.js"></script>
<script type="text/javascript" src="frameworks/chartjs/chart.bundle.min.js"></script>
<script type="text/javascript" src="frameworks/canvas/canvasjs.min.js"></script>
<title>Ansicht Eloresultate</title>
<?php require_once "assets/navigation.php" ?>
<?php require_once "collections/helpfunctions/htmlentities.php" ?>

<?php
$licenceNr = e($_GET['licence']);
?>

<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary" onclick="window.location.href='https://batikego.myhostpoint.ch'">Zurück zur
                Übersicht
            </button>
        </div>
    </div>

    <br>

    <div class="row" id="alert">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                Der Spieler mit der Lizenznummer <?php echo $licenceNr ?> hat keine Elopunkte oder ist nicht vorhanden!
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <canvas id="myChart" width="400px" height="400px"></canvas>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/alleEloResultate.js"></script>

<?php require_once "assets/footer.php" ?>
