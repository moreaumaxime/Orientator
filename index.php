<?php


require_once('controllers/controllerAccueil.php');
require_once('controllers/controllerBranches.php');



if (isset($_GET['page']) && $_GET['page'] !== '') {
	if ($_GET['page'] === 'accueil') {
    	accueil();
    }
} else {
	Accueil();
}



?>
