<?php


require_once('controllers/controllerAccueil.php');
require_once('controllers/controllerBranches.php');
require_once('controllers/controllerConnexion.php');

if (isset($_GET['page']) && $_GET['page'] !== '') {
	if ($_GET['page'] === 'accueil') {
    	accueil();
    }
    if($_GET['page'] === 'branche' && isset($_GET['branche'])){
        branches($_GET['branche']);
    }
    if($_GET['page'] == 'connexion'){
        pageConnexion();
    }
    if($_GET['page'] == 'inscription'){
        pageInscription();
    }
    
} else {
    accueil();
}


?>
