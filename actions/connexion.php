<?php
session_start(); // Démarrer la session

try {
    $bdd = new PDO('mysql:host=localhost;dbname=Orientator', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : erreur de connexion ' . $e->getMessage());
}

// Vérifier si le formulaire est soumis
if (isset($_POST['connexion'])) {
    // Vérifier que les champs ne sont pas vides
    if (!empty($_POST['UtilisateurHash']) && !empty($_POST['UtilisateurEmail'])) {
        $UtilisateurHash = htmlspecialchars($_POST['UtilisateurHash']);
        $UtilisateurEmail = htmlspecialchars($_POST['UtilisateurEmail']);

        // Méthode de hachage du mot de passe
        $UtilisateurHashcode = hash('sha256', $UtilisateurHash);

        // Comparer le mot de passe haché avec les mots de passe de la base de données
        $select = $bdd->prepare("SELECT * FROM Utilisateur WHERE UtilisateurEmail = ? AND UtilisateurHash = ?");
        $select->execute([$UtilisateurEmail, $UtilisateurHashcode]);

        // Récupérer le résultat
        $result = $select->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe
        if ($select->rowCount() > 0) {
            // Définir l'identifiant de l'utilisateur dans la session
            $_SESSION['UtilisateurID'] = $result['UtilisateurID'];

            // Redirection vers la page d'accueil
            header("Location: ../index.php");
            exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
        } else {
            echo "Adresse email ou mot de passe incorrect.";
        }
    } else {
        echo "Tous les champs doivent être remplis.";
    }
}
?>
