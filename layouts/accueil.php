

<?php require_once("header.php")?>

<!-- premiere ligne de contenu -->
<div class="ligne-1">
    <!-- affichage du test -->
    <div class="test-box">
        <p class="test-desc">Faites votre test d'orientation pour savoir laquelle de ces branches de l'informatique pourrait vous correspondre</p>
        
        
        <a href = "quizz.php"><button type = 'submit' class = 'test-button'>Faites Votre Test !</button></a>    
    </div>
    <!-- affichage compte -->
    <div>
        <?= $loginCard ?>
    </div>
</div>

<!-- lignes pour chaque branche -->
<div>
    <?php foreach($branches as list($id,$nom,$desc,$slogan)) {
    ?>
        <div class="branche">
            <div style="background-image: url('<?= $img ?>');">
                <h1><?= $title ?></h1>
            </div>
            <p class=branche-description>
                <?= $desc ?>
            </p>
        </div>

    <?php
    }
    ?>
</div>


<?php require("footer.php") ?>

</body>
</html>