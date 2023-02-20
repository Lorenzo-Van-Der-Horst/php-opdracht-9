<?php
// functie: Programma overzicht bieren
// auteur: Lorenzo

// initialisatie
include 'functions.php';

// Main

// Connect database bieren
$conn = ConnectDb();
var_dump($conn);


//print bieren
OvzBieren($conn);

?>