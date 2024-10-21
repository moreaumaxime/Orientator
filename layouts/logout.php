
<?php
session_start();

// Détruire la session et rediriger vers la page d'accueil
session_unset();
session_destroy();

header("Location: ../index.php"); // Redirection vers l'accueil

?>