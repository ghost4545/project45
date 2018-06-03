<?php
session_start();
// Bestanden importeren
require '../php/klant.php';

// Class aanroepen en opslaan in variabele
$klanten = new Klanten();

// Inhoud formuliervelden opslaan in variabelen
$id =  $_SESSION['klant_id'];

// Functie uitvoeren en resultaat opslaan in vaiabele
$verwijderen = $klanten->klantVerwijderen($id);

// Als functie is gelukt, terug naar pagina, anders muslikt weergeven
if ($verwijderen == true) {
    header('Location: ../klantwijzigingen.php');
} else {
    echo 'mislukt';
}