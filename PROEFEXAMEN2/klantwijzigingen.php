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
                <a href="index.php">uitloggen medewerker</a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>       
        <div>
            <h4>Klantaccount wijzigen</h4>
            <form method="post" action="formulieren/klantwijzigenformulier.php">
               
                <label>Voer uw gegevens in</label>      
                <br><br>
                <label>Nieuwe voornaam</label>
                <br>
                <input type="text" name='voornaam' required>
                <br>
                <label>Nieuwe achternaam</label>
                <br>
                <input type="text" name="achternaam" required>
                <br>
                <br>
                <label>Nieuwe email</label>
                <br>
                <input type="email" name="email" required>
                <br>
                <br>
                <label>Nieuwe adres</label>
                <br>
                <input type="text" name="adres" required>
                <br>
                <br>
                <label>Nieuwe postcode</label>
                <br>
                <input type="text" name="postcode" required>
                <br>
                <br>
                <label>Nieuwe woonplaats</label>
                <br>
                <input type="text" name="woonplaats" required>
                <br>
                <br>
                <label>Nieuwe wachtwoord</label>
                <br>
                <input type="password" name="wachtwoord" required>
                <br>
                <br>
                <input type="submit" value="account wijzigen">
            </form>
        </div>
        <div>
            <h4>Account verwijderen</h4>
            <form method="post" action="formulieren/klantverwijderenformulier.php">                         
                <input type="submit" value="Account verwijderen">
            </form>
        </div>
    </body>
</html>