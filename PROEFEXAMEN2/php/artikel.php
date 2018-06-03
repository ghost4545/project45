<?php

class Artikelen {
    
    private function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new PDO("mysql:host=$servername;dbname=shop", $username, $password);
        
        return $conn;
    }
    
    public function artikelAanmaken($naam, $prijs) {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stmt = $conn->prepare("INSERT INTO artikel (artikelnaam, prijs) VALUES (:naam, :prijs)");
        $stmt->bindParam(':naam',$naam);
        $stmt->bindParam(':prijs',$prijs);
        // als query is gelukt, true terugsturen, anders false terugsturen
        if($stmt->execute()){           
            return true;          
        }else{
            return false;
        }
    }
    
    public function artikelWijzigen($id, $naam, $prijs) {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stmt = $conn->prepare("UPDATE artikel SET artikelnaam = :naam, prijs = :prijs WHERE id_artikel = :id");
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':naam',$naam);
        $stmt->bindParam(':prijs',$prijs);
        // als query is gelukt, true terugsturen, anders false terugsturen
        if($stmt->execute()){           
            return true;          
        }else{
            return false;
        }
      }
      
    public function artikelVerwijderen($id) {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stmt = $conn->prepare("DELETE FROM artikel WHERE id_artikel = :id");
        $stmt->bindParam(':id',$id);
        // als query is gelukt, true terugsturen, anders false terugsturen
        if($stmt->execute()){
            return true;          
        }else{
            return false;
        }
    }
    
    public function getID() {
        // Connectie maken met de database
        $conn = $this->connect();
        // SQL Query voorbereiden
        $stmt = $conn->prepare("SELECT * FROM artikel");
        // Als query is gelukt... anders false terugsturen
        if ($stmt->execute()) {
            // Voor elke gevonden rij het artikel id en de artikelnaam weergeven in een HTML option
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['id_artikel'] . '">' . $row['artikelnaam'] . '</option>';
            }
        } else {
            return false;
        }
    }
    
    public function plaatsBestelling($id_klant, $id_artikel, $aantal) {
        // Connectie maken met de database
        $conn = $this->connect();
        // SQL Query voorbereiden en variabelen binden aan de query
        $stap1 = $conn->prepare("INSERT INTO bestelling (id_klant, datum) VALUES (:id, NOW())");
        $stap1->bindParam(':id', $id_klant);
        // als uitvoeren is gelukt, verder gaan, anders false terugsturen
        if ($stap1->execute()) {
            // id van de vorige query ophalen en opslaan
            $id_bestelling = $conn->lastInsertId();
            // SQL Query voorbereiden en variabelen binden aan de query
            $stap2 = $conn->prepare("INSERT INTO bestelregel (id_bestelling, id_artikel, aantal) VALUES (:id_bestelling, :id_artikel, :aantal)");
            $stap2->bindParam(':id_bestelling', $id_bestelling);
            $stap2->bindParam(':id_artikel', $id_artikel);
            $stap2->bindParam(':aantal', $aantal);
            // als query is gelukt true terugsturen, anders false terugsturen
            if ($stap2->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function assortimentLatenZien() {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden
        $stmt = $conn->prepare("SELECT * FROM artikel");
        // als query is gelukt, verder gaan, anders false terugsturen
        if($stmt->execute()){           
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<form method="post" action="formulieren/bestellingplaatsen.php">';
                echo '<input type="hidden" name="id_artikel" value="' . $row['id_artikel'] . '">';
                echo '<br>';
                echo $row['artikelnaam'];
                echo '<br>';
                echo '<input type="number" name="aantal">';
                echo '<br>';
                echo '<input type="submit" value="Bestel">';
                echo '</form>';
            }
        }else{
            return false;
        }
    }
    
    public function bestellingInzien() {
        // Connectie maken met database
        $conn = $this->connect();
        // SQL Query voorbereiden
        $stmt = $conn->prepare("SELECT * FROM bestelling");
        // als query is gelukt, verder gaan, anders false terugsturen
        if($stmt->execute()){           
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id_bestelling = $row['id_bestelling'];
                $id_klant = $row['id_klant'];
                $stmt2 = $conn->prepare("SELECT * FROM bestelregel WHERE id_bestelling = :id");
                $stmt2->bindParam(':id', $id_bestelling);
                if ($stmt2->execute()) {
                    $regel = $stmt2->fetch(PDO::FETCH_ASSOC);
                    $id_artikel = $regel['id_artikel'];
                    $stmt3 = $conn->prepare("SELECT * FROM klant WHERE id_klant = :id");
                    $stmt3->bindParam(':id', $id_klant);
                    if ($stmt3->execute()) {
                        $klant = $stmt3->fetch(PDO::FETCH_ASSOC);
                        $stmt4 = $conn->prepare("SELECT * FROM artikel WHERE id_artikel = :id");
                        $stmt4->bindParam(':id', $id_artikel);
                        if ($stmt4->execute()) {
                            $artikel = $stmt4->fetch(PDO::FETCH_ASSOC);
                            echo '<p>';
                            echo $row['id_bestelling'];
                            echo ' - ';
                            echo $row['datum'];
                            echo ' - ';
                            echo $klant['voornaam'] . ' ' . $klant['achternaam'];
                            echo ' - ';
                            echo $artikel['artikelnaam'];
                            echo ' - ';
                            echo $regel['aantal'];
                            echo '</p>';
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        }else{
            return false;
        }
    }
    
}
    
