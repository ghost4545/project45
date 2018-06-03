<?php
session_start();
if (!isset($_SESSION['medewerker_id'])) {
    header('Location: index.php');
}
require 'php/artikel.php';
$artikelen = new Artikelen();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="nav">
            <div class="logo">
                <a href="index.php">Logo</a>
            </div>
            <div class="links">
                <a href="contact.php">Contact</a>
                <a href="index.php">uitloggen medewerker</a>
                <a href="medewerkerwijzigingen.php">Account wijzigingen</a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>       
        <div>
            <h4>Artikel aanmaken</h4>
            <form method="post" action="formulieren/artikelaanmakenformulier.php">
                <label>Naam artikel</label>
                <br>
                <input type="text" name="artikelnaam" required>
                <br>
                <label>Prijs artikel</label>
                <br>
                <input type="text" name="prijs" required>
                <br>
                <input type="submit" value="Artikel aanmaken">
            </form>
        </div>
        <div>
            <h4>Artikel wijzigen</h4>
            <form method="post" action="formulieren/artikelwijzigenformulier.php">
                <label>Selecteer artikel</label>
                <br>
                <select name="id_artikel">
                    <?php
                    $artikelen->getID();
                    ?>
                </select>
                <br>
                <label>Nieuwe naam</label>
                <br>
                <input type="text" name="artikelnaam" required>
                <br>
                <label>Nieuwe prijs</label>
                <br>
                <input type="text" name="prijs" required>
                <br>
                <input type="submit" value="Artikel wijzigen">
            </form>
        </div>
        <div>
            <h4>Artikel verwijderen</h4>
            <form method="post" action="formulieren/artikelverwijderenformulier.php">
                <label>Selecteer artikel</label>
                <br>
                <select name="id_artikel">
                    <?php
                    $artikelen->getID();
                    ?>
                </select>
                <br>
                <input type="submit" value="Artikel verwijderen">
            </form>
        </div>
    </body>
</html>