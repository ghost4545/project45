<?php
session_start();
// Bestanden importeren
require '../php/artikel.php';

// Class aanroepen en opslaan in variabele
$artikelen = new Artikelen();

// Inhoud formuliervelden opslaan in variabelen
$id = $_POST['id_artikel'];
$naam = $_POST['artikelnaam'];
$prijs = $_POST['prijs'];

// Functie uitvoeren en resultaat opslaan in vaiabele
$wijzigen = $artikelen->artikelWijzigen($id, $naam, $prijs);

// Als functie is gelukt, terug naar pagina, anders muslikt weergeven
if ($wijzigen == true) {
    header('Location: ../medewerkerassortimentwijzigen.php');
} else {
    echo 'mislukt';
}