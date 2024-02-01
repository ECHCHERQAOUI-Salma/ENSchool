
<?php
session_start();
$uploadDir = '../uploads/';
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
$sql = "INSERT INTO cours (title, content, idProfesseur) VALUES (?, ?,(select idProfesseur from professeur where email ='".$_SESSION["login"]."'))";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $pdfTitle, $pdfContent);
$stmt->execute();
header("location:../profDashboard.php");
?>