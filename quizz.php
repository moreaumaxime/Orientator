<?php
session_start(); // Démarrer la session

// Connexion à la base de données
try {
    $db = new PDO('mysql:host=localhost;dbname=orientator;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// // Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateurId'])) {
    die('Erreur 401 : Vous devez être connecté pour accéder à cette page.');
}

// Récupérer l'ID de l'utilisateur connecté
$utilisateurId = $_SESSION['utilisateurId'];

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialiser les scores pour chaque domaine
    $scores = [
        'cybersecurite' => 0,
        'developpement' => 0,
        'IA' => 0,
        'infrastructure' => 0,
        'robotique' => 0,
    ];

    // Parcourir les réponses et compter les scores
    foreach ($_POST['questions'] as $reponse) {
        if (array_key_exists($reponse, $scores)) {
            $scores[$reponse]++;
        }
    }

    // Calculer les pourcentages des scores
    $totalQuestions = count($_POST['questions']);
    foreach ($scores as $metier => $score) {
        $scores[$metier] = ($score / $totalQuestions) * 100;
    }

    // Trier les métiers par ordre décroissant de score
    arsort($scores);

    // Vérifier si un score atteint 100 %
    $topMetiers = [];
    foreach ($scores as $metier => $pourcentage) {
        if ($pourcentage == 100) {
            $topMetiers = [$metier => $pourcentage];
            break; // Si un score atteint 100 %, on arrête la boucle
        }
    }

    // Si aucun score n'atteint 100 %, prendre les deux meilleurs scores
    if (empty($topMetiers)) {
        $topMetiers = array_slice($scores, 0, 2, true);
    }

    // Insérer les résultats dans la table `Resultats`
    $stmt = $db->prepare("
        INSERT INTO Resultats (UtilisateurID, cybersecurite, developpement, IA, infrastructure, robotique)
        VALUES (:UtilisateurID, :cybersecurite, :developpement, :IA, :infrastructure, :robotique)
    ");
    $stmt->execute([
        'UtilisateurID' => 1,
        'cybersecurite' => $scores['cybersecurite'],
        'developpement' => $scores['developpement'],
        'IA' => $scores['IA'],
        'infrastructure' => $scores['infrastructure'],
        'robotique' => $scores['robotique'],
    ]);

    // Afficher les résultats
    echo "<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='css/resultats.css'>
        <title>Résultats du Quiz</title>
    </head>
    <body>
    <div class='container'>
        <h2>Résultats du Quizz</h2>";

    if (reset($topMetiers) == 100) {
        // Si un score est de 100%, l'afficher seul
        $metier = key($topMetiers);
        echo "<p class='result-item unique'>Vous correspondez parfaitement au domaine de : $metier (100%)</p>";
    } else {
        // Afficher les deux meilleurs résultats
        echo "<p>Voici les métiers auxquels vous correspondez le plus :</p>";
        foreach ($topMetiers as $metier => $pourcentage) {
            echo "<p class='result-item'>$metier : " . round($pourcentage, 2) . "%</p>";
        }
    }

    echo "<button onclick='window.location.href=\"quizz.php\"'>Revenir au quiz</button>
    </div>
    </body>
    </html>";
}else {
    
?>
<?php require("navbar.php") ?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleQuizz.css">
    

    <title>Quiz d'Orientation Informatique</title>
</head>
<body>
    <h1>Quiz d'Orientation - Métiers de l'Informatique</h1>
    <form method="POST" action="quizz.php">
        <p>Répondez à ces questions pour découvrir le métier informatique qui vous correspond le plus.</p>
        <h3>1. Quelle activité vous semble la plus captivante ?</h3>
    <label><input type="radio" name="questions[1]" value="cybersecurite" required> Protéger des données sensibles contre les cyberattaques.</label><br>
    <label><input type="radio" name="questions[1]" value="developpement"> Développer des applications ou des logiciels innovants.</label><br>
    <label><input type="radio" name="questions[1]" value="IA"> Concevoir des systèmes capables d'apprendre et de s'adapter.</label><br>
    <label><input type="radio" name="questions[1]" value="infrastructure"> Gérer et optimiser des réseaux et des infrastructures.</label><br>
    <label><input type="radio" name="questions[1]" value="robotique"> Construire et programmer des machines autonomes.</label><br>

    <h3>2. Quel aspect de l'informatique vous passionne le plus ?</h3>
    <label><input type="radio" name="questions[2]" value="cybersecurite" required> La sécurité des systèmes et la protection contre les menaces.</label><br>
    <label><input type="radio" name="questions[2]" value="developpement"> La création de solutions logicielles fonctionnelles et esthétiques.</label><br>
    <label><input type="radio" name="questions[2]" value="IA"> L'analyse de données pour rendre des systèmes intelligents.</label><br>
    <label><input type="radio" name="questions[2]" value="infrastructure"> Le maintien des serveurs et des infrastructures en bon état.</label><br>
    <label><input type="radio" name="questions[2]" value="robotique"> La construction de robots capables de réaliser des tâches complexes.</label><br>

    <h3>3. Lorsque vous travaillez sur un projet, vous préférez :</h3>
    <label><input type="radio" name="questions[3]" value="cybersecurite" required> Assurer la sécurité et la fiabilité du projet.</label><br>
    <label><input type="radio" name="questions[3]" value="developpement"> Coder et voir le résultat directement sur une application.</label><br>
    <label><input type="radio" name="questions[3]" value="IA"> Résoudre des problèmes en utilisant des algorithmes sophistiqués.</label><br>
    <label><input type="radio" name="questions[3]" value="infrastructure"> Travailler sur la performance des systèmes.</label><br>
    <label><input type="radio" name="questions[3]" value="robotique"> Programmer des mouvements précis pour des robots.</label><br>

    <h3>4. Quel type de problèmes aimez-vous résoudre ?</h3>
    <label><input type="radio" name="questions[4]" value="cybersecurite" required> Protéger des systèmes contre des intrusions.</label><br>
    <label><input type="radio" name="questions[4]" value="developpement"> Créer des fonctionnalités et résoudre des bugs.</label><br>
    <label><input type="radio" name="questions[4]" value="IA"> Développer des modèles prédictifs à partir de données.</label><br>
    <label><input type="radio" name="questions[4]" value="infrastructure"> Diagnostiquer des pannes réseau ou des systèmes.</label><br>
    <label><input type="radio" name="questions[4]" value="robotique"> Concevoir des machines qui interagissent avec leur environnement.</label><br>

    <h3>5. Vous aimez travailler avec :</h3>
    <label><input type="radio" name="questions[5]" value="cybersecurite" required> Des protocoles de sécurité et des pare-feux.</label><br>
    <label><input type="radio" name="questions[5]" value="developpement"> Des langages de programmation comme Python, Java, etc.</label><br>
    <label><input type="radio" name="questions[5]" value="IA"> Des systèmes qui analysent et traitent des données automatiquement.</label><br>
    <label><input type="radio" name="questions[5]" value="infrastructure"> Des infrastructures réseau et serveurs.</label><br>
    <label><input type="radio" name="questions[5]" value="robotique"> Des microcontrôleurs et des moteurs pour animer des robots.</label><br>

    <h3>6. Quel type d'environnement de travail préférez-vous ?</h3>
    <label><input type="radio" name="questions[6]" value="cybersecurite" required> Un environnement où je dois surveiller et prévenir des attaques.</label><br>
    <label><input type="radio" name="questions[6]" value="developpement"> Un bureau où je peux coder tranquillement et collaborer avec des développeurs.</label><br>
    <label><input type="radio" name="questions[6]" value="IA"> Un laboratoire où je peux expérimenter avec des algorithmes et des données.</label><br>
    <label><input type="radio" name="questions[6]" value="infrastructure"> Un centre de données ou une salle de serveurs.</label><br>
    <label><input type="radio" name="questions[6]" value="robotique"> Un atelier où je peux travailler avec des machines physiques.</label><br>

    <h3>7. Comment décririez-vous votre style de travail ?</h3>
    <label><input type="radio" name="questions[7]" value="cybersecurite" required> Je suis méthodique et prudent avec les systèmes critiques.</label><br>
    <label><input type="radio" name="questions[7]" value="developpement"> J'aime être créatif et rapide dans le développement d'applications.</label><br>
    <label><input type="radio" name="questions[7]" value="IA"> Je suis analytique et j'aime résoudre des problèmes complexes.</label><br>
    <label><input type="radio" name="questions[7]" value="infrastructure"> Je suis technique et aime optimiser les processus.</label><br>
    <label><input type="radio" name="questions[7]" value="robotique"> J'ai un esprit pratique et j'aime voir des résultats tangibles.</label><br>

    <h3>8. Quelle compétence vous attire le plus ?</h3>
    <label><input type="radio" name="questions[8]" value="cybersecurite" required> Analyser les vulnérabilités d'un système informatique.</label><br>
    <label><input type="radio" name="questions[8]" value="developpement"> Écrire du code pour développer des logiciels ou des sites web.</label><br>
    <label><input type="radio" name="questions[8]" value="IA"> Travailler avec des algorithmes d'apprentissage automatique.</label><br>
    <label><input type="radio" name="questions[8]" value="infrastructure"> Configurer et optimiser des serveurs et réseaux.</label><br>
    <label><input type="radio" name="questions[8]" value="robotique"> Concevoir et programmer des robots pour qu'ils accomplissent des tâches.</label><br>

    <h3>9. Quel type de formation aimeriez-vous suivre ?</h3>
    <label><input type="radio" name="questions[9]" value="cybersecurite" required> Une formation en cybersécurité pour comprendre les failles des systèmes.</label><br>
    <label><input type="radio" name="questions[9]" value="developpement"> Un cours sur les frameworks de développement moderne (ex. React, Django).</label><br>
    <label><input type="radio" name="questions[9]" value="IA"> Un cursus spécialisé en intelligence artificielle et machine learning.</label><br>
    <label><input type="radio" name="questions[9]" value="infrastructure"> Une formation sur l'architecture réseau et la gestion des serveurs.</label><br>
    <label><input type="radio" name="questions[9]" value="robotique"> Un cursus en robotique et mécatronique.</label><br>

    <h3>10. Quel impact voulez-vous avoir dans votre travail ?</h3>
    <label><input type="radio" name="questions[10]" value="cybersecurite" required> Protéger les entreprises et les individus contre les cybermenaces.</label><br>
    <label><input type="radio" name="questions[10]" value="developpement"> Améliorer la vie des gens grâce à des applications innovantes.</label><br>
    <label><input type="radio" name="questions[10]" value="IA"> Rendre les machines plus intelligentes et autonomes.</label><br>
    <label><input type="radio" name="questions[10]" value="infrastructure"> Garantir que les infrastructures technologiques fonctionnent sans faille.</label><br>
    <label><input type="radio" name="questions[10]" value="robotique"> Automatiser des tâches répétitives grâce à la robotique.</label><br>

    <h3>11. Comment gérez-vous les projets sous pression ?</h3>
    <label><input type="radio" name="questions[11]" value="cybersecurite" required> J'analyse rapidement les menaces et applique des solutions.</label><br>
    <label><input type="radio" name="questions[11]" value="developpement"> Je code méthodiquement pour résoudre les problèmes sans précipitation.</label><br>
    <label><input type="radio" name="questions[11]" value="IA"> Je teste des modèles jusqu'à ce que je trouve la solution optimale.</label><br>
    <label><input type="radio" name="questions[11]" value="infrastructure"> Je priorise les problèmes critiques pour maintenir le système en marche.</label><br>
    <label><input type="radio" name="questions[11]" value="robotique"> J'adapte les réglages des machines pour éviter des dysfonctionnements.</label><br>

    <h3>12. Quel domaine de l'informatique vous paraît le plus crucial pour l'avenir ?</h3>
    <label><input type="radio" name="questions[12]" value="cybersecurite" required> La cybersécurité pour protéger les données sensibles.</label><br>
    <label><input type="radio" name="questions[12]" value="developpement"> Le développement de logiciels pour répondre aux besoins changeants.</label><br>
    <label><input type="radio" name="questions[12]" value="IA"> L'intelligence artificielle pour révolutionner la prise de décision.</label><br>
    <label><input type="radio" name="questions[12]" value="infrastructure"> L'infrastructure pour supporter la croissance des données et des utilisateurs.</label><br>
    <label><input type="radio" name="questions[12]" value="robotique"> La robotique pour automatiser les processus industriels et du quotidien.</label><br>

    <h3>13. Dans vos projets, vous préférez :</h3>
    <label><input type="radio" name="questions[13]" value="cybersecurite" required> Anticiper et bloquer les failles de sécurité.</label><br>
    <label><input type="radio" name="questions[13]" value="developpement"> Écrire des lignes de code et voir l'application prendre vie.</label><br>
    <label><input type="radio" name="questions[13]" value="IA"> Expérimenter avec des algorithmes et des données pour optimiser un système.</label><br>
    <label><input type="radio" name="questions[13]" value="infrastructure"> Maintenir et mettre à jour des systèmes complexes.</label><br>
    <label><input type="radio" name="questions[13]" value="robotique"> Concevoir des robots pour automatiser des tâches physiques.</label><br>

    <h3>14. Que pensez-vous de l'automatisation dans le domaine de l'informatique ?</h3>
    <label><input type="radio" name="questions[14]" value="cybersecurite" required> Il est essentiel d'automatiser les systèmes pour les rendre plus sécurisés.</label><br>
    <label><input type="radio" name="questions[14]" value="developpement"> Automatiser les tâches de développement peut augmenter la productivité.</label><br>
    <label><input type="radio" name="questions[14]" value="IA"> C'est l'avenir, en particulier avec l'intelligence artificielle.</label><br>
    <label><input type="radio" name="questions[14]" value="infrastructure"> Automatiser les tâches de gestion d'infrastructure réduit les erreurs humaines.</label><br>
    <label><input type="radio" name="questions[14]" value="robotique"> L'automatisation permet aux robots de réaliser des tâches complexes sans intervention humaine.</label><br>

    <h3>15. Si vous deviez choisir une tâche pour les 10 prochaines années, ce serait :</h3>
    <label><input type="radio" name="questions[15]" value="cybersecurite" required> Développer des solutions de cybersécurité pour des entreprises sensibles.</label><br>
    <label><input type="radio" name="questions[15]" value="developpement"> Construire des applications innovantes qui simplifient la vie.</label><br>
    <label><input type="radio" name="questions[15]" value="IA"> Créer des systèmes intelligents capables d'apprendre de leur environnement.</label><br>
    <label><input type="radio" name="questions[15]" value="infrastructure"> Gérer des systèmes critiques et les garder à jour.</label><br>
    <label><input type="radio" name="questions[15]" value="robotique"> Fabriquer des robots capables d'effectuer des tâches automatisées dans l'industrie.</label><br>
    <br>
    
        <button type ="submit">Envoyer</button>
    </form>
</body>
</html>
<?php
}
?>

