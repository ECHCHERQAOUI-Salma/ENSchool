<?php
// Connexion à la base de données (remplacez les informations de connexion)
$conn = new mysqli('localhost', 'root', '', 'gestion_ecole');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération du PDF depuis la base de données (par exemple, le premier enregistrement)
$result = $conn->query("SELECT title, content FROM cours WHERE idCours = ".$_GET["idCours"]."");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Récupération des données du PDF
    $pdfContent = $row['content'];
    $pdfTitle = $row['title'];

    // En-têtes pour afficher le PDF dans le navigateur
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $pdfTitle . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');

    // Affichage du contenu du PDF
    echo $pdfContent;
} else {
    echo "PDF not found.";
}


