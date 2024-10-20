<?php

// try {
//     $db = new PDO('mysql:host=localhost;dbname=orientator;charset=utf8', 'root', '');
// } catch (Exception $e) {
//     die('Erreur : ' . $e->getMessage());
// }

function getBranches(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=orientator;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $stmt = $db->query("
       SELECT f.filiereId, f.filiereNom, f.filiereDescription, f.filiereSlogan, i.ImageEmplacement 
        FROM Filiere f
        LEFT JOIN Images i ON f.ImageID = i.ImageID
    ");

    $branches = $stmt->fetchAll();

    return $branches;
}
function getBranche($id){
    try {
        $db = new PDO('mysql:host=localhost;dbname=orientator;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
    $stmt = $db->prepare("
        SELECT f.filiereId, f.filiereNom, f.filiereDescription, f.filiereSlogan, i.ImageEmplacement 
        FROM Filiere f
        LEFT JOIN Images i ON f.ImageID = i.ImageID
        WHERE filiereID = :id;
    ");

    $stmt->execute(['id' => $id]); 

    $branche = $stmt->fetchAll();

    return $branche;
}



function accueil(){
    //head parameters
    $stylesheets = ["css/styles.css","css/styleAccueil.css"];
    $scripts = [];


    include("layouts/accueil.php");
}

?>