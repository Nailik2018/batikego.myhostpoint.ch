<?php require_once "assets/header.php" ?>

<link rel="stylesheet" href="css/alleEloResultate.css">
<script type="text/javascript" src="frameworks/chartjs/chart.min.js"></script>
<script type="text/javascript" src="frameworks/chartjs/chart.bundle.min.js"></script>
<script type="text/javascript" src="frameworks/canvas/canvasjs.min.js"></script>
<title>Ansicht Eloresultate</title>
<?php require_once "assets/navigation.php" ?>

<?php
$licenceNr = $_GET['licence'];

$url = "https://batikego.myhostpoint.ch/api/get_player_elos_details.php?"
?>

<br>
<br>

<div class="container">
    <div class="row">
        <canvas id="myChart" width="400px" height="400px"></canvas>
    </div>
</div>

<script type="text/javascript" src="js/alleEloResultate.js"></script>

<?php require_once "assets/footer.php" ?>
