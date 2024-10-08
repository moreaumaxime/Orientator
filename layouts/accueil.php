

<?php require_once("header.php")?>

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