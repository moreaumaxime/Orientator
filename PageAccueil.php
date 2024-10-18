<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Site d'Orientation</title>
    <link rel="stylesheet" href="styleAccueil.css">
</head>
<body>

    <!-- Navbar -->
    <nav>
        <ul class="ul-nav">
            <li class="li-nav">
            <?php
                // Définir l'URL du lien

                $url = "layouts/accueil.php";
                // Afficher le lien sans que ça ressemble à un lien
                echo '<a href="' . $url . '" style="text-decoration: none; color: inherit;">Accueil</a>';
            ?>
                <i class="fa fa-home" aria-hidden="true"></i>
                <div class="underline"></div>
            </li>
            <li class="li-nav"> 
                <?php  
                $url = "Accueil.php";
                echo '<a href="' . $url . '" style="text-decoration: none; color: inherit;">Branche 1</a>';
                ?>
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <div class="underline"></div>
            </li>
            <li class="li-nav">
            <?php
                $url = "Accueil.php";
                echo '<a href="' . $url . '" style="text-decoration: none; color: inherit;">Questionnaire</a>';
            ?>
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <div class="underline"></div>
            </li>
        </ul>
    </nav>
        <div class="user-buttons">
            <button class="btn deconnexion">Déconnexion</button>
            <button class="btn resultats">Résultats</button>
        </div>
    </div>

    <!-- Bouton Faire le test -->
    <div class="test-section">
        <a href="questionnaire.html" class="btn faire-test">Faire le test</a>
    </div>

    <!-- Section explicative des branches -->
    <div class="branches-explanation">
        <h2>Les branches proposées par domaine</h2>
        <div class="branch">
            <h3>Domaine Informatique</h3>
            <p>Explorez les possibilités dans le développement logiciel, l'intelligence artificielle, la cybersécurité et bien plus.</p>
        </div>
        <div class="branch">
            <h3>Domaine Médecine</h3>
            <p>Découvrez les opportunités en médecine générale, chirurgie, recherche médicale, etc.</p>
        </div>
        <div class="branch">
            <h3>Domaine Mécanique</h3>
            <p>Étudiez les systèmes mécaniques, l'ingénierie automobile, et la fabrication industrielle.</p>
        </div>
        <div class="branch">
            <h3>Domaine Aviation</h3>
            <p>Formation dans le pilotage, la maintenance aéronautique, et la gestion aéroportuaire.</p>
        </div>
    </div>

    <!-- Mention légale -->
    <footer class="footer">
        <p>© 2024 Site d'Orientation. Tous droits réservés. <a href="#">Mentions légales</a></p>
    </footer>

</body>
</html>
