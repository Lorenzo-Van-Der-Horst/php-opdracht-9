<?php
// Functie: Algemene functies
// Auteur: Lorenzo

function ConnectDb(){
    echo "connect<br>";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bieren";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully 1<br>";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    echo "Connected successfully 2<br>";
    return $conn;
}

function OvzBieren($conn){
    echo"<br><br>";
    echo"overzicht<br>";
    echo"<br>";
    try {
        $query = $conn->prepare("SELECT * FROM bier");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        echo"<table>";
            echo "<tr>";
                echo "<td>" . "Bier Code " . "</td>";
                echo "<td>" . "Bier Naam " . "</td>";
                echo "<td>" . "Alcohol % " . "</td>";
            echo "</tr>";
            foreach($result as &$data) {
                echo "<tr>";
                    echo "<td>" . $data["biercode"] . "</td>";
                    echo "<td>" . $data["naam"] . "</td>";
                    echo "<td>" . $data["alcohol"] . "</td>";
                echo "</tr>";
            }
        echo"</table>";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
}
?>