<?php
session_start();
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
                <a href="overzichtbestellingen.php">Bestellingen</a>
                <a href="medewerkerassortimentwijzigen.php">Artikelen</a>
                <a href="uitloggen.php">uitloggen medewerker</a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div>
            <?php
            $artikelen->bestellingInzien();
            ?>
        </div>
    </body>
</html>