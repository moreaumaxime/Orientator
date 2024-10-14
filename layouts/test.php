<?php require("header.php") ?>


<?php
// Démarrage 
session_start();

// Vérifier utilisateur  connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit();
}

// Fonction  déconnexion
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php'); 
    exit();
}

// Exemple de récupération des informations de l'utilisateur
$userName = "Nom Utilisateur";
$profilePic = "path/to/profile-pic.jpg"; 
$resultTest = "Votre  résultat est : Informatique";
$filiere = "Informatique"; 
$descriptionFiliere = "La filière Informatique vous permet de développer des compétences en développement logiciel, gestion de systèmes informatiques, etc."; 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test d'Orientation</title>
    <link rel="stylesheet" href="../css/stylePageTest.css"> 
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    
    <?php require 'navbar.php'; ?>

    <div class="container">
        <!-- Case profil (en haut à gauche) -->
        <div class="case profile">
    <div class="profile-left">
        <form action="resultats.php" method="GET">
            <button type="submit" class="btn-result">Voir Résultats</button>
        </form>
        <form method="POST">
            <button type="submit" name="logout" class="btn-logout">Déconnexion</button>
        </form>
    </div>
    <div class="profile-right">
        <img src="<?php echo $profilePic ? $profilePic : 'path/to/default-avatar.jpg'; ?>" alt="Photo de profil" class="profile-pic">
    </div>
</div>


        <!-- Case bouton test (en haut à droite) -->
        <div class="case test">
            <h2>Test de filière</h2>
            <p>Faites le test pour découvrir quelle filière vous correspond !</p>
            <a href="quiz.php" class="btn-test">Commencer le test</a>
        </div>

        <!-- Case filière (en bas à gauche) -->
        <div class="case filiere">
            <h3>Filière obtenue :</h3>
            <p><?php echo $filiere; ?></p>
        </div>

        <!-- Case description filière (en bas à droite) -->
        <div class="case description">
            <h3>Description de la filière :</h3>
            <p><?php echo $descriptionFiliere; ?></p>
        </div>
    </div>

  
    <?php require 'footer.php'; ?>

</body>
</html>
