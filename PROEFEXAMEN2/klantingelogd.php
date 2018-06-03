<?php
session_start();
if (!isset($_SESSION['klant_id'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
        
        <div class="nav">
            <div class="logo">
                <a href="index.php">Logo</a>
            </div>
            <div class="links">
                <a href="contact.php">Contact</a>
                <a href="uitloggen.php">Uitloggen klant</a>
                <a href="klantwijzigingen.php"><?php echo $_SESSION['klant_voornaam']; ?></a>
                <a href="assortiment.php">Artikelen overzicht</a>
                
            </div>
        </div>
    </body>
</html>


