<?php
session_start();
require '../php/klant.php';
$klanten = new Klanten();

$voornaam = $_POST['Voornaam'];
$achternaam = $_POST['Achternaam'];
$email = $_POST['Email'];
$adres = $_POST['Adres'];
$postcode = $_POST['Postcode'];
$woonplaats = $_POST['Woonplaats'];
$wachtwoord = $_POST['Wachtwoord'];

$registreren = $klanten->klantAanmaken($voornaam, $achternaam, $email, $adres, $postcode, $woonplaats, $wachtwoord);

if ($registreren == true) {
    header('Location: ../inloggenklant.php');
} else {
    echo 'mislukt';
}
