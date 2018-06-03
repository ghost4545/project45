<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
            <h2>Login klant</h2>
            <form method="post" action="formulieren/inlogformulierklant.php">
                Email:<br>
                <input type="text" name="Email"required>
                <br>
                Wachtwoord:<br>
                <input type="password" name="Wachtwoord"required>
                <br><br>
                <input type="submit" value="login">
            </form> 
        </div>
        
    </body>
</html>

