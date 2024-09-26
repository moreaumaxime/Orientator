<?php
// Variables dynamiques pour le titre, les stylesheets et les scripts
$title = isset($title) ? $title : "Titre par défaut";
$stylesheets = isset($stylesheets) ? $stylesheets : ["style.css"];
$scripts = isset($scripts) ? $scripts : ["https://code.jquery.com/jquery-3.6.0.min.js"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>

    <!-- Feuilles de style CSS -->
    <?php foreach ($stylesheets as $stylesheet): ?>
        <link href="<?= htmlspecialchars($stylesheet) ?>" rel="stylesheet" />
    <?php endforeach; ?>

    <!-- Scripts JavaScript -->
    <?php foreach ($scripts as $script): ?>
        <script src="<?= htmlspecialchars($script) ?>"></script>
    <?php endforeach; ?>
</head>
<body>
    <!-- Inclusion de la barre de navigation -->
    <?php include 'navbar.php'; ?>
