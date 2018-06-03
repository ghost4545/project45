<?php
session_start();
// Bestanden importeren
require '../php/klant.php';

// Class aanroepen en opslaan in variabele
$klanten = new Klanten();

// Inhoud formuliervelden opslaan in variabelen
$id = $_SESSION['klant_id'];
$naam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$adres = $_POST['adres'];
$postcode = $_POST['postcode'];
$woonplaats = $_POST['woonplaats'];
$wachtwoord = $_POST['wachtwoord'];
// Functie uitvoeren en resultaat opslaan in vaiabele
$wijzigen = $klanten->klantWijzigen($id, $naam, $achternaam, $email, $adres, $postcode, $woonplaats, $wachtwoord);

// Als functie is gelukt, terug naar pagina, anders muslikt weergeven
if ($wijzigen == true) {
    header('Location: ../klantwijzigingen.php');
} else {
    echo 'mislukt';
}




