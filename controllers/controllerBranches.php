<?php
class ControllerBranche {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=orientator', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion: " . $e->getMessage();
            exit; // Arrêtez l'exécution si la connexion échoue
        }
    }

    public function afficherBranche($branch_id) {
        $statement = $this->db->prepare('
            SELECT 
            f.FiliereNom, 
            f.FiliereSlogan, 
            f.FiliereDescription, 
            e.EntrepriseNom, 
            fo.FormationNom, 
            fo.FormationDescription, 
            em.EmploiNom, 
            em.EmploiDescription
        FROM 
            Filiere f
        LEFT JOIN 
            Entreprises e ON f.FiliereID = e.FiliereID
        LEFT JOIN 
            Formation fo ON f.FiliereID = fo.FiliereID
        LEFT JOIN 
            Emploi em ON f.FiliereID = em.FiliereID
        WHERE 
            f.FiliereID = :branch_id
        ');

        $statement->bindParam(':branch_id', $branch_id, PDO::PARAM_INT);
        $statement->execute();

        // Récupère les résultats
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}

function branches($brancheId) {
    $controller = new ControllerBranche();
    $filiere = $controller->afficherBranche($brancheId); 

    if ($filiere) {
        require(dirname(__DIR__) . '/layouts/branches.php'); 
    } else {
        echo "Aucune filière trouvée.";
    }
}
?>
