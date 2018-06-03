<?php
session_start();
// Bestanden importeren
require '../php/medewerker.php';

// Class aanroepen en opslaan in variabele
$medewerkers = new Medewerkers();

// Inhoud formuliervelden opslaan in variabelen
$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

// Functie uitvoeren en resultaat opslaan in variabele
$invoeren = $medewerkers->medewerkerAanmaken($voornaam, $achternaam, $email, $wachtwoord);

// Als functie is gelukt, terug naar pagina, anders muslikt weergeven
if ($invoeren == true) {
    header('Location: ../medewerkerwijzigingen.php');
} else {
    echo 'mislukt';
}