<?php
$conn = new mysqli('localhost', 'root', '', 'gestion_ecole');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
