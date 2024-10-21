<!DOCTYPE html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Fichiers CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Fichiers javscript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
<div align="center">
    <h1 class="text-title">Orientator</h1>
    <nav>
        <ul class="ul-nav">
            <li class="li-nav">
                <?php
                $url = "index.php";
                echo '<a href="' . $url . '" style="text-decoration: none; color: inherit;">Accueil</a>';
                ?>
                <i class="fa fa-home" aria-hidden="true"></i>
                <div class="underline"></div>
            </li> 
                <?php  
                $branches = [
                    ['id' => 1, 'nom' => 'Cybersécurité', 'fa' => 'fas fa-shield'],
                    ['id' => 2, 'nom' => 'Développement', 'fa' => 'fas fa-desktop'],
                    ['id' => 3, 'nom' => 'IA', 'fa' => 'fas fa-brain'],
                    ['id' => 4, 'nom' => 'Infrastructure', 'fa' => 'fas fa-building'],
                    ['id' => 5, 'nom' => 'Robotique/IoT', 'fa' => 'fas fa-robot'],
                ];
                foreach ($branches as $branch) {
                    $url = "index.php?page=branche&branche=" . $branch['id'];
                    echo '<li class="li-nav">';
                    echo '<a href="' . $url . '" style="text-decoration: none; color: inherit;"> ' . htmlspecialchars($branch['nom']) . ' </a>';
                    echo '<i class="' . $branch['fa'] . '" aria-hidden="true"></i>';
                    echo '<div class="underline"></div>';
                    echo '</li>';
                }
                ?>
            <li class="li-nav">
                <?php
                $url = "quizz.php";
                echo '<a href="' . $url . '"style="text-decoration: none; color: inherit;">Questionnaire</a>';
                ?>
                
                <i class="fab fa-quora" aria-hidden="true"></i>
                <div class="underline"></div>
            </li>
            <li class="li-nav">
                <?php
                $url = "resultats.php";
                echo '<a href="' . $url . '"style="text-decoration: none; color: inherit;">Resultats</a>';
                ?>
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <div class="underline"></div>
            </li>
        </ul>
    </nav>
</div>
