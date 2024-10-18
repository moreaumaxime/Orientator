
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
            $UtilisateurEmail=htmlspecialchars($_POST['UtilisateurEmail']);

            //methode de hachage du mot de passe
            $UtilisateurHashcode= hash('sha256',$UtilisateurHash);

            //à présent nous comparons le mot de passe haché avec les mots de passe de la base de donnée
            $select= $bdd -> prepare(" SELECT * FROM Utilisateur WHERE UtilisateurEmail= ? and  UtilisateurHash= ?" );
            $select -> execute([$UtilisateurEmail,$UtilisateurHashcode]);
            
            // Récupérer le résultat
            $result = $select->fetch(PDO::FETCH_ASSOC);

            if($select -> rowcount()>0){
                
                // identifiant de l'utilisateur connecte
                $conID= $result['UtilisateurID'];
            

                $_SESSION['UtilisateurHash'] = $UtilisateurHashcode;
                $_SESSION['UtilisateurEmail'] = $UtilisateurEmail;

                header("Location: ../index.php");
            
            }else {
                echo " Adresse Email ou mot de passe incorrect. ";
            }
        }else {
            echo "tous les champs doivent être remplis.";
        }
//}


?>



