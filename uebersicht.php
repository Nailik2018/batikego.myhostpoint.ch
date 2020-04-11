<?php require_once "assets/header.php" ?>
    <link rel="stylesheet" href="css/uebersicht.css">
    <title>Uebersicht Kaderspieler</title>
<?php require_once "assets/navigation.php" ?>

<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Lizenznummer</th>
            <th scope="col">Vorname</th>
            <th scope="col">Nachname</th>
        </tr>
        </thead>
        <tbody id="players-data">
        </tbody>
    </table>
</div>

<script type="text/javascript" src="js/uebersicht.js"></script>

<?php require_once "assets/footer.php" ?>
