<?php


require_once('controllers/controllerAccueil.php');
require_once('controllers/controllerBranches.php');



if (isset($_GET['page']) && $_GET['page'] !== '') {
	if ($_GET['page'] === 'accueil') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];

        	post($identifier);
    	} else {
        	echo 'Erreur : aucun identifiant de billet envoyé';

        	die;
    	}
	} else {
    	echo "Erreur 404 : la page que vous recherchez n'existe pas.";
	}
} else {
	Accueil();
}


?>