<?php require("header.php") ?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Orientateur</title>
        <link rel="icon" type="image/png" href="/images/OrientatorLogo.png">
        <link href="css/styles.css" rel="stylesheet" />
    </head>

<body>
    <?php 
    require 'controllers\controllerBranches.php';
    $statement = $db->query('
        SELECT filiere_nom, filière.Slogan, filiere_description, entreprise_nom, entreprise_description, formation_nom, formation_description, emploi_descriptionFROM filière
        LEFT JOIN Asso3 ON filière.ID = Asso3.filiere_id
        LEFT JOIN entreprises ON Asso3.entreprise_id = entreprises.ID
        LEFT JOIN Asso1 ON filière.ID = Asso1.filiere_id
        LEFT JOIN formations ON Asso1.formation_id = formations.ID
        LEFT JOIN Asso2 ON filière.ID = Asso2.filiere_id
        LEFT JOIN emploi ON Asso2.emploi_id = emploi.ID
    ');

    while($filiere = $statement->fetch()) 
    {
        echo '
    <div class="container">    
        <div class="row">
            <div class="col-sm-6" back>
                <h2 class="text-title2">' . htmlspecialchars($filiere['filiere_nom']) . '</h2>
            </div>
            <div class="col-sm-6">
                <h2 class="text-slogan">'. htmlspecialchars($filiere['Slogan']) . '</h2>
            </div> 
        </div>
        <div class="row">
            <div class="col-sm-6" back>  
                <h2 class="text-title2">Description :</h2>
                <u class="text">' . htmlspecialchars($filiere['filiere_description']) . '</u>
            </div>
            <div class="col-sm-6">
                    <h2 class="text-title2">Entreprises :</h2>
                    <ul>';
                    foreach ($filiere['entreprises'] as $entreprise) {
                        echo '<li><strong>' . htmlspecialchars($entreprise['nom']) . ':</strong> ' . htmlspecialchars($entreprise['description']) . '</li>';
                    }
                    echo '</ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h2 class="text-title2">Formations :</h2>
                <ul>';
                foreach ($filiere['formations'] as $formation) {
                    echo '<li><strong>' . htmlspecialchars($formation['nom']) . ':</strong> ' . htmlspecialchars($formation['description']) . '</li>';
                }
                echo '</ul>
            </div>
            <div class="col-sm-6">
                <h2 class="text-title2">Emplois :</h2>
                <ul>';
                foreach ($filiere['emplois'] as $emploi) {
                    echo '<li>' . htmlspecialchars($emploi) . '</li>';
                }
                echo '</ul>
            </div>
        </div>
    </div>';
    }
    ?>
        
</body>

<?php require("footer.php") ?>

</html>
