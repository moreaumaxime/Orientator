<?php require("header.php"); ?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Détails de la Branche</title>
    <link rel="icon" type="image/png" href="/images/OrientatorLogo.png">
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container">    
        <?php 
        if ($filiere) {
            echo '
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="text-title2">' . htmlspecialchars($filiere['FiliereNom']) . '</h2>
                </div>
                <div class="col-sm-6">
                    <h2 class="text-slogan">' . htmlspecialchars($filiere['FiliereSlogan']) . '</h2>
                </div> 
            </div>
            <div class="row">
                <div class="col-sm-6">  
                    <h2 class="text-title2">Description :</h2>
                    <u class="text">' . htmlspecialchars($filiere['FiliereDescription']) . '</u>
                </div>
                <div class="col-sm-6">
                    <h2 class="text-title2">Entreprises :</h2>
                    <ul class="text">';
                    if ($filiere['EntrepriseNom']) {
                        echo '<li><strong>' . htmlspecialchars($filiere['EntrepriseNom']) . '</li>';
                    } else {
                        echo '<li>Aucune entreprise disponible.</li>';
                    }
                    echo '</ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="text-title2">Formations :</h2>
                    <ul class="text">';
                    if ($filiere['FormationNom']) {
                        echo '<li><strong>' . htmlspecialchars($filiere['FormationNom']) . ':</strong> ' . htmlspecialchars($filiere['FormationDescription']) . '</li>';
                    } else {
                        echo '<li>Aucune formation disponible.</li>';
                    }
                    echo '</ul>
                </div>
                <div class="col-sm-6">
                    <h2 class="text-title2">Emplois :</h2>
                    <ul class="text">';
                    if ($filiere['EmploiNom']) {
                        echo '<li><strong>' . htmlspecialchars($filiere['EmploiNom']) . ':</strong> ' . htmlspecialchars($filiere['EmploiDescription']) . '</li>';
                    } else {
                        echo '<li>Aucun emploi disponible.</li>';
                    }
                    echo '</ul>
                </div>
            </div>';
        } else {
            echo "<p>Aucune filière trouvée pour l'ID spécifié.</p>";
        }
        ?>
    </div>
</body>

<?php require("footer.php"); ?>
</html>
