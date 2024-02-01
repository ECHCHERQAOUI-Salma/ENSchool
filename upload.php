<?php
$uploadDir = 'uploads/';
$uploadFile = $uploadDir . basename($_FILES['pdfFile']['name']);

move_uploaded_file($_FILES['pdfFile']['tmp_name'], $uploadFile);

$pdfContent = file_get_contents($uploadFile);
$pdfTitle = $_FILES['pdfFile']['name'];

$conn = new mysqli('localhost', 'root', '', 'gestion_ecole');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Requête SQL pour insérer le PDF dans la base de données
$sql = "INSERT INTO emploisdutemps (title, content) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $pdfTitle, $pdfContent);
$stmt->execute();
header("location:emplois.php");
?>