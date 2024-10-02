<?php require("header.php") ?>


<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
        <link rel="icon" type="png" href="/images/OrientatorLogo.png">
        <link href="css/styles.css" rel="stylesheet" />
    </head>

<body>

<!-- premiere ligne de contenu -->
<div class= "inline-block">
    <div>
        <?= $loginCard ?>
    </div>
    <div class="inline-block">
        <p>Description du test a remplir</p>
        <button class="block" href="<?= $buttonlink ?>">
    </div>
</div>

<!-- lignes pour chaque branche -->
<div>
    <?php foreach($branches as list($title, $desc, $img)) {
    ?>
        <div class="branche">
            <div style="background-image: url('<?= $img ?>');">
                <h1><?= $title ?></h1>
            </div>
            <p>
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