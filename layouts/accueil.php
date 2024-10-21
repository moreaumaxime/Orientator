

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
    <div class='user-section'>
        <div>
            <img src="Images/logo_utilisateur.png" />
        </div>
        <div>
            <a class="user-buttons" href = "index.php?page=connexion">  <button type = 'submit' class = 'connexion-button'>Connexion</button></a>
            <a class="user-buttons" href = "quizz.php?page=inscription"><button type = 'submit' class = 'inscription-button'>Inscription</button></a>
        </div>
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