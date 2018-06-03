<?php
session_start();
require '../php/klant.php';
$klanten = new Klanten();

$email = $_POST['Email'];
$wachtwoord = $_POST['Wachtwoord'];

$inloggen = $klanten->klantLogin($email, $wachtwoord);

if ($inloggen == true) {
    header('Location: ../klantingelogd.php');
} else {
    echo 'mislukt';
}
