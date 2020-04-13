<?php require_once "assets/header.php" ?>
    <link rel="stylesheet" href="css/spieler.css">
    <title>Ansicht Kaderspieler</title>
<?php require_once "assets/navigation.php" ?>
<br />
<?php $licenceNr = $_GET['licence'];?>

<div class="container">
    <div class="row" id="noPlayer" >
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                Der Spieler mit der Lizenznummer <?php echo $licenceNr?> ist nicht vorhanden
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/spieler.js"></script>

<?php require_once "assets/footer.php"?>
