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
                <a href="inloggenklant.php">inloggen klant</a>
                <a href="inloggenmedewerker.php">inloggen medewerker</a>
                <a href="registratieklant.php">registratie klant</a>
                
                
            </div>
        </div>
            <br>
            <br>
            <br>
            <br>       
        <div>        
            <h2>Registratie Klant</h2>
<p>Wil jij een nieuwe account maken. Registreer je dan op deze pagina</p>

<form method="post" action="formulieren/klantaanmakenformulier.php">
  <fieldset>
    <legend>Personelijke informatie</legend>
       Voornaam<br>
       <input type="text" name="Voornaam"  required>
       <br>
       Achternaam<br>
       <input type="text" name="Achternaam"  required>
       <br>
       E-mail<br>
       <input type="text" name="Email" required>
       <br>
       Adres<br>
       <input type="text" name="Adres" required>
       <br>
       Postcode<br>
       <input type="text" name="Postcode"  required>
       <br>
       Woonplaats<br>
       <input type="text" name="Woonplaats" required>
       <br>     
       Wachtwoord<br>
       <input type="password" name="Wachtwoord"  required>
    <br><br>
    <input type="submit" value="registreer">
  </fieldset>
</form>
        
    </body>
</html>