<?php require_once "assets/header.php" ?>
<link rel="stylesheet" href="css/index.css">
<title>Uebersicht Kaderspieler</title>
<?php require_once "assets/navigation.php" ?>

<br />
<br />

<div class="container">
    <div class="row">
        <div class="col-lg-12">
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
    </div>
</div>
<br>
<br>

<script type="text/javascript" src="js/index.js"></script>

<?php require_once "assets/footer.php" ?>
