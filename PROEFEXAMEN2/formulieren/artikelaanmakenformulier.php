<?php
session_start();
// Bestanden importeren
require '../php/artikel.php';

// Class aanroepen en opslaan in variabele
$artikelen = new Artikelen();

// Inhoud formuliervelden opslaan in variabelen
$artikelnaam = $_POST['artikelnaam'];
$prijs = $_POST['prijs'];

// Functie uitvoeren en resultaat opslaan in vaiabele
$invoeren = $artikelen->artikelAanmaken($artikelnaam, $prijs);

// Als functie is gelukt, terug naar pagina, anders muslikt weergeven
if ($invoeren == true) {
    header('Location: ../medewerkerassortimentwijzigen.php');
} else {
    echo 'mislukt';
}