<?php
session_start();
// Bestanden importeren
require '../php/artikel.php';

// Class aanroepen en opslaan in variabele
$artikelen = new Artikelen();

// Inhoud formuliervelden opslaan in variabelen
$id = $_POST['id_artikel'];

// Functie uitvoeren en resultaat opslaan in vaiabele
$verwijderen = $artikelen->artikelVerwijderen($id);

// Als functie is gelukt, terug naar pagina, anders muslikt weergeven
if ($verwijderen == true) {
    header('Location: ../medewerkerassortimentwijzigen.php');
} else {
    echo 'mislukt';
}