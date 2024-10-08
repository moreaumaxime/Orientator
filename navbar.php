<!DOCTYPE html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Fichiers CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/styles.css">

    <!-- Fichiers javscript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div align="center">
    <h1 class="text-title">Orientator</h1>
    <nav>
        <ul class="ul-nav">
            <li class="li-nav">
            <?php
                // Définir l'URL du lien
                $url = "index.php";
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
                $url = "accueil.php";
                ?>
                <a style="text-decoration: none; color: inherit;">Questionnaire</a>';
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <div class="underline"></div>
            </li>
            <li class="li-nav">
                <?php
                $url = "index.php";
                ?>
                <a style="text-decoration: none; color: inherit;">Résultat</a>';
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <div class="underline"></div>
            </li>
        </ul>
    </nav>
</div>
