
<?php
try {
      $bdd = new PDO('mysql:host=localhost;dbname=Orientator', 'root', '');
      $bdd->setAttribute(PDO::ATTR_ERRMODE /*rapport d'erreues*/, PDO::ERRMODE_EXCEPTION/*emet une exception*/);

      echo "vous etes bien connecte";
}
catch (Exception $e) {
      die('Erreur : erreur de connexion' . $e->getMessage());
}

//if(isset($POST['inscription'])){
        if(!empty($_POST['UtilisateurEmail']) || !empty($_POST['UtilisateurUsername'])|| !empty($_POST['UtilisateurHash']) || !empty($_POST['confirmpass'])){
            $UtilisateurEmail_erreur1 = '';
            $UtilisateurEmail_erreur2 = '';
            $mdp_erreur = '';        
            $i=0;
            $UtilisateurEmail=htmlspecialchars($_POST['UtilisateurEmail']);
            $UtilisateurUsername=htmlspecialchars($_POST['UtilisateurUsername']);
            $UtilisateurHash=htmlspecialchars($_POST['UtilisateurHash']);
            $confirmpass=htmlspecialchars($_POST['confirmpass']);

            //On vérifie la forme maintenant
            if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $UtilisateurEmail) || empty($UtilisateurEmail))
            {
                $UtilisateurEmail_erreur1 = "Votre adresse E-Mail n'a pas un format valide";
                $i++;
            }  

           //Vérification de l'adresse email
            //Il faut que l'adresse email n'ait jamais été utilisée
            $query=$bdd->prepare('SELECT COUNT(*) AS nbr FROM utilisateur WHERE UtilisateurEmail =:UtilisateurEmail');
            $query->bindValue(':UtilisateurEmail',$UtilisateurEmail, PDO::PARAM_STR);
            $query->execute();
            $UtilisateurEmail_free=($query->fetchColumn()==0)?1:0;
            $query->CloseCursor();
            if(!$UtilisateurEmail_free)
            {
                $UtilisateurEmail_erreur2 = "Votre adresse email est déjà utilisée par un membre";
                $i++;
            }
            
            //Vérification du mdp
            if ($UtilisateurHash != $confirmpass || empty($confirmpass) || empty($UtilisateurHash))
            {
                $mdp_erreur = "Votre mot de passe et votre confirmation sont différents, ou sont vides";
                $i++;
            }

            if ($i==0)
            {
             echo'<h1>Inscription terminée</h1>';
             echo'<p>Bienvenue '.stripslashes(htmlspecialchars($_POST['UtilisateurUsername'])).' vous êtes maintenant inscrit sur le forum</p>';
             
             //methode de hachage du mot de passe
             $UtilisateurHashcode= hash('sha256',$UtilisateurHash);

             //à présent nous insérons le mot de passe haché
            $query=$bdd->prepare('INSERT INTO utilisateur (UtilisateurEmail, UtilisateurHash, UtilisateurUsername)
            VALUES (:UtilisateurEmail, :UtilisateurHash, :UtilisateurUsername)');
             $query->bindValue(':UtilisateurEmail', $UtilisateurEmail, PDO::PARAM_STR);
             $query->bindValue(':UtilisateurHash', $UtilisateurHashcode, PDO::PARAM_STR);
             $query->bindValue(':UtilisateurUsername', $UtilisateurUsername, PDO::PARAM_STR);
             $query->execute();
             $query->CloseCursor();
             //Et on définit les variables de sessions
                 $POST_['userID']= $result['UtilisateurID'];

                 

                 header("Location: ../index.php?page=connexion");
                 die();
                //$_SESSION['level'] = 2;
             }
             else
             {
                 echo'<h1>Inscription interrompue</h1>';
                 echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';
                 echo'<p>'.$i.' erreur(s)</p>';
                 echo'<p>'.$UtilisateurEmail_erreur1.'</p>';
                 echo'<p>'.$UtilisateurEmail_erreur2.'</p>';
                 echo'<p>'.$mdp_erreur.'</p>';
                 echo'<p>Cliquez <a href="./Inscription.php">ici</a> pour recommencer</p>';
             }  
        
        
            
            
        }else {
            echo "tous les champs doivent être remplis.";
        }
    
//}

?>

