<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Récupérer les données du formulaire
    $from = $_GET["email"];
    $subject = $_GET["subject"];
    $body = $_GET["message"];

    // Encodage des valeurs pour les inclure dans l'URL
    $encodedTo = rawurlencode("salmaramdi5@gmail.com");
    $encodedFrom = rawurlencode($from);
    $encodedSubject = rawurlencode($subject);
    $encodedBody = rawurlencode($body);

    // Création du lien mailto avec les paramètres spécifiés
    $mailtoLink = "mailto:$encodedTo?from=$encodedFrom&subject=$encodedSubject&body=$encodedBody";

    // Redirection vers le lien mailto
    header("Location: $mailtoLink");
    exit;
}
?>