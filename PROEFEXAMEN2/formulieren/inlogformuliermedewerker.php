<?php
require '../php/medewerker.php';
$medewerkers = new Medewerkers();

$email = $_POST['Email'];
$wachtwoord = $_POST['Wachtwoord'];

$inloggen = $medewerkers->medewerkerLogin($email, $wachtwoord);

if ($inloggen == true) {
    header('Location: ../medewerkerwijzigingen.php');
} else {
    echo 'mislukt';
}

