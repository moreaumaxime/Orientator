
<?php
try {
      $bdd = new PDO('mysql:host=localhost;dbname=Orientator', 'root', '');
      $bdd->setAttribute(PDO::ATTR_ERRMODE /*rapport d'erreues*/, PDO::ERRMODE_EXCEPTION/*emet une exception*/);

      // echo "vous etes bien connecte";
}
catch (Exception $e) {
      die('Erreur : erreur de connexion' . $e->getMessage());
}

//if(isset($POST['connexion'])){
      if(!empty($_POST['UtilisateurHash']) and !empty($_POST['UtilisateurEmail']) ){
            $UtilisateurHash=htmlspecialchars($_POST['UtilisateurHash']);
            $email=htmlspecialchars($_POST['UtilisateurEmail']);
            $select= $con -> prepare(" SELECT * FROM Utilisateur WHERE UtilisateurUtilisateurEmail= ? and  UtilisateurHash= ?" );
            $select -> execute([$email,$UtilisateurHash]);
            //On vérifie la forme maintenant
            
            if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
            {
               // $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
                //$i++;
                echo 'Votre adresse E-Mail est au format invalide.'
            }  

            if($select -> rowcount()>0){
            

                $_SESSION['UtilisateurHash'] = $UtilisateurHash;
                $_SESSION['UtilisateurEmail'] = $email;

                header("Location: ../index.php");
                
            }else {
                echo " Adresse Email ou mot de passe incorrect. ";
            }
        }else {
            echo "tous les champs doivent être remplis.";
        }
//}


?>



