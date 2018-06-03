<?php

session_start();
require '../php/artikel.php';

$artikelen = new Artikelen();

$id_klant = $_SESSION['klant_id'];
$id_artikel = $_POST['id_artikel'];
$aantal = $_POST['aantal'];

$bestellen = $artikelen->plaatsBestelling($id_klant, $id_artikel, $aantal);

if ($bestellen == true) {
    echo 'geplaatst';
} else {
    echo 'mislukt';
}