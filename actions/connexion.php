
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



