<?php

function accueil(){

    // a recuperer dans la bdd
    $branches = [
        ["Cybersecurité", "la branche des hackers", "Description de la filiere g la flemme c du statique", "images/orientatorLogo.jpg"],
        ["developpement", "Creez des applications", "", ""]


    ];
    $buttonlink = "";
    $loginCard="";

    include("layouts/accueil.php");
}

?>