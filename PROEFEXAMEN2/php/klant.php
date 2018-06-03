<?php

class Klanten {
    
    private function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new PDO("mysql:host=$servername;dbname=shop", $username, $password);
        
        return $conn;
    }
    
    public function klantAanmaken($naam, $achternaam, $email, $adres, $postcode, $woonplaats, $wachtwoord) {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stmt = $conn->prepare("INSERT INTO klant (voornaam, achternaam, email, adres, postcode, woonplaats, wachtwoord) VALUES (:naam, :achternaam, :email, :adres, :postcode, :woonplaats, :wachtwoord)");       
        $stmt->bindParam(':naam',$naam);
        $stmt->bindParam(':achternaam',$achternaam);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':adres',$adres);
        $stmt->bindParam(':postcode',$postcode);
        $stmt->bindParam(':woonplaats',$woonplaats);
        $stmt->bindParam(':wachtwoord',$wachtwoord);            
        // als query is gelukt, true terugsturen, anders false terugsturen
        if($stmt->execute()){
            return true;          
        }else{
            return false;
              }
    }
    
            
    public function klantWijzigen($id, $naam, $achternaam, $email, $adres, $postcode, $woonplaats, $wachtwoord ) {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stmt = $conn->prepare("UPDATE klant SET voornaam = :naam, achternaam = :achternaam, email = :email, adres = :adres ,postcode = :postcode, woonplaats = :woonplaats ,wachtwoord = :wachtwoord WHERE id_klant = :id");
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':naam',$naam);
        $stmt->bindParam(':achternaam',$achternaam);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':adres',$adres);
        $stmt->bindParam(':postcode',$postcode);
        $stmt->bindParam(':woonplaats',$woonplaats);
        $stmt->bindParam(':wachtwoord',$wachtwoord);
        // als query is gelukt, true terugsturen, anders false terugsturen
        if($stmt->execute()){
            return true;          
        }else{
            return false;
        }
    }
    
    public function klantVerwijderen($id) {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stmt = $conn->prepare("DELETE FROM klant WHERE id_klant = :id");
        $stmt->bindParam(':id',$id);
        // als query is gelukt, true terugsturen, anders false terugsturen
        if($stmt->execute()){
            return true;          
        }else{
            return false;
         }
        
    }
    
    public function klantLogin($email, $wachtwoord) {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stmt = $conn->prepare("SELECT * FROM klant WHERE email = :email AND wachtwoord = :wachtwoord");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':wachtwoord', $wachtwoord);
        // als query is gelukt, gegevens ophalen en terugsturen, anders false terugsturen
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['klant_id'] = $result['id_klant'];
            $_SESSION['klant_voornaam'] = $result['voornaam'];
            $_SESSION['klant_achternaam'] = $result['achternaam'];
            $_SESSION['klant_email'] = $result['email'];
            $_SESSION['klant_adres'] = $result['adres'];
            $_SESSION['klant_postcode'] = $result['postcode'];
            $_SESSION['klant_woonplaats'] = $result['woonplaats'];
            return true;
        } else {
            return false;
        }
   }
}

