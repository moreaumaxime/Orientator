<?php


require_once('controllers/controllerAccueil.php');
require_once('controllers/controllerBranches.php');



if (isset($_GET['page']) && $_GET['page'] !== '') {
	if ($_GET['page'] === 'accueil') {
    	accueil();
    }
    if($_GET['page'] === 'branche' && isset($_POST['branche'])){
        branches($_POST['branche']);
    }
} else {
    accueil();
}


?>
