

<?php require_once("header.php")?>
<?php require_once("controllers/controllerAccueil.php")?>

<!-- premiere ligne de contenu -->
<div class="ligne-1">
    <!-- affichage du test -->
    <div class="test-box">
        <p class="test-desc">Faites votre test d'orientation pour savoir laquelle de ces branches de l'informatique pourrait vous correspondre</p>
        
        
        <a href = "quizz.php"><button type = 'submit' class = 'test-button'>Faites Votre Test !</button></a>    
    </div>


    <!-- affichage compte -->
    <div>
        <?php session_start(); // Démarrage de la session
        // Vérification si l'utilisateur est connecté
        if(isset($_SESSION['UtilisateurID'])) { 

            $UtilisateurID = $_SESSION['UtilisateurID'];

            try {
                $bdd = new PDO('mysql:host=localhost;dbname=Orientator', 'root', '');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                die('Erreur : erreur de connexion ' . $e->getMessage());
            }

            $select = $bdd->prepare("SELECT UtilisateurUsername FROM Utilisateur WHERE UtilisateurID = ? ");
            $select->execute([$UtilisateurID]);

            // Récupérer le résultat
            $result = $select->fetch(PDO::FETCH_ASSOC);

            $UtilisateurUsername = $result['UtilisateurUsername'];

        ?>
            <p><i>Bienvenue sur notre forum,</i> <h2> <u><strong> <?= htmlspecialchars($UtilisateurUsername); ?> </strong></u> </h2> </p>

           <h3> <a href="layouts/logout.php">Déconnexion</a> </h3>
        <?php 
        } else { 
        ?>
            <h3><a href="index.php?page=connexion">Se connecter</a></h3>
        <?php 
        } 
        ?>
    </div>
</div>

<!-- lignes pour chaque branche -->




<div>
    <?php $branches = getBranches(); ?>


    <?php foreach($branches as list($id,$nom,$desc,$slogan,$img)) {  ?>

        <div class="branche" style="background-image: url('<?= $img ?>');">

            <div>
                <h2 class="branche-nom"><?= $nom ?></h3>
            </div>

            <div>

                <h3 class=branche-slogan>
                    <?= $slogan ?></h3>

            </div>

        </div>

    <?php } 
    ?>



</div>


<?php require_once("footer.php") ?>

</body>
</html>