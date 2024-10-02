@ -1,57 +0,0 @@
<?php require("header.php") ?>
<html>
    <head>
        <meta charset="utf-8" />
        <title> </title>
        <link rel="icon" type="png" href="/images/OrientatorLogo.png">
        <link href="css/styles.css" rel="stylesheet" />
    </head>

<body>

<div class="container">
    <!-- premiere ligne de contenu -->







    
    <div class="row">
        <div class="col-sm-6" back>
            <h2 class="text-title2">Branche</h2>
            <u class="text"></u>
        </div>
        <div class="col-sm-6">
            <h2 class="text-slogan">Slogan</h2>
        </div>
    </div>


</div>

<!-- lignes pour chaque branche -->
<div>
    <?php foreach($branches as list($title, $slogan, $desc, $img)) {
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

</body>

<?php require("footer.php") ?>

</html>