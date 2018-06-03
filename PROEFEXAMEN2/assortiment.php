<?php
session_start();
if (!isset($_SESSION['klant_id'])) {
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
                <a href="index.php">uitloggen klant</a>
                <a href="klantwijzigingen.php">Naam..</a>
                <a href="assortiment.php">Artikelen overzicht</a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
            <div class="productweergave">
                <?php
                $artikelen->assortimentLatenZien();
                ?>
            </div>