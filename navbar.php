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
            <li class="il-nav">
                <a href="Accueil.php"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
                <div class="underline"></div>
            </li>
            
            <li class="li-nav"> 
                <?php  
                echo '
                <a href="Accueil.php">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i> Branche 1
                </a>
                '; 
                ?>
                <div class="underline"></div>
            </li>
            <li class="li-nav">
                <a href="Questionnaire.php"><i class="fa fa-info-circle" aria-hidden="true"></i> Questionnaire</a>
                <div class="underline"></div>
            </li>
        </ul>
    </nav>
</div>
