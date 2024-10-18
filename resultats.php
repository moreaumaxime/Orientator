<?php
session_start();

// Connexion à la base de données
try {
    $db = new PDO('mysql:host=localhost;dbname=orientator;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


// Vérifier si l'utilisateur est connecté
if (!isset($_POST['UtilisateurID'])) {
    die('Erreur 401 :  Vous devez être connecté pour accéder à cette page.');
}

// Récupérer l'ID de l'utilisateur connecté
$utilisateurId = $_POST['UtilisateurID'];
// Récupérer les derniers résultats de l'utilisateur depuis la base de données
$stmt = $db->prepare("
    SELECT * FROM Resultats WHERE UtilisateurID = :UtilisateurID ORDER BY id DESC LIMIT 1
");
$stmt->execute(['UtilisateurID' => $utilisateurId]);
$resultat = $stmt->fetch(PDO::FETCH_ASSOC);

// Si aucun résultat n'est trouvé, afficher un message d'erreur
if (!$resultat) {
    die('Aucun résultat trouvé pour cet utilisateur.');
}

// Afficher les résultats
echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/resultats.css'>
    <title>Vos Résultats</title>
</head>
<body>";

// Inclure la barre de navigation
include 'navbar.php';

echo "<div class='container'>
    <h2>Vos derniers résultats</h2>
    <p>Cybersécurité : " . round($resultat['cybersecurite'], 2) . "%</p>
    <p>Développement : " . round($resultat['developpement'], 2) . "%</p>
    <p>Intelligence Artificielle : " . round($resultat['IA'], 2) . "%</p>
    <p>Infrastructure : " . round($resultat['infrastructure'], 2) . "%</p>
    <p>Robotique : " . round($resultat['robotique'], 2) . "%</p>
    <button onclick='window.location.href=\"quizz.php\"'>Revenir au quiz</button>
</div>
</body>
</html>";

?>
