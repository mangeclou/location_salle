<?php
// 	Un repository centralise tout ce qui touche à la récupération de vos entités. Concrètement donc, vous ne devez pas faire la moindre requête SQL ailleurs que dans un repository, c'est la règle. 
// Cette classe contiendra les méthodes de Employé et demandera l'exécution à EntityRepository ! c'est un écran entre les deux, remplir la totalité, très facile !	
//	Ce fichier vendor/Repository/EmployeRepository.php donne une erreur lors d'un test sur son url mais c'est normal car il compose l'application et ce n'est donc pas un point d'entrée.

namespace repository;

require_once '\EntityRepository.php';

use PDO;
use \repository\EntityRepository AS EntityRepository;
 // l'utilisation du namespace permet d'extends la classe lors de l'héritage alors qu'il n'y a pas encore eu d'instanciation. //  USE déclenche l'autoload pour que la classe soit chargée et ainsi éviter une erreur.

class SalleRepository extends EntityRepository {

    /**
     * Gets all the salles
     * @return Array with all the salles
     */
    public function getAllSalle()
    {
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne

        $query = $db->prepare( "SELECT *
                                FROM salle;");

        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;          
    }

    public function findSalleById($id)
    {
        $id_salle = (int)$id;
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne
        $query = $db->prepare("SELECT *
                                FROM salle
                                WHERE id_salle = :id_salle;");

        $query->bindValue(':id_salle', $id_salle, PDO::PARAM_INT);
        $query->execute();
        
        $data = $query->fetch(PDO::FETCH_ASSOC);
        
        return $data;          
    }

    public function registerSalle($salleValues)
    {
        
        return $this->register($salleValues);
    }
    
    public function findSalleByTitre($titre)
    {
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne
        $query = $db->prepare("SELECT titre
                                      FROM salle
                                      WHERE titre = :titre;");

        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->execute();
        
        $data = $query->fetch(PDO::FETCH_LAZY);
        
        return $data;          
    }
    
    public function updateSalle($values)
    {
        extract($values);
        
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne
        $query = $db->prepare("UPDATE salle
                                SET pays = :pays, ville= :ville, adresse= :adresse, cp=:cp, titre=:titre, description= :description,
                                    photo= :photo, capacite= :capacite, categorie = :categorie
                                    WHERE id_salle = :id_salle;");

        $query->bindValue(':id_salle', $id_salle, PDO::PARAM_INT);
        $query->bindValue(':pays', $pays, PDO::PARAM_STR);
        $query->bindValue(':ville', $ville, PDO::PARAM_STR);
        $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $query->bindValue(':cp', $cp, PDO::PARAM_STR);
        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':photo', $photo, PDO::PARAM_STR);
        $query->bindValue(':capacite', $capacite, PDO::PARAM_STR);
        $query->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $update = $query->execute();
       
        return $update;          
    }
    
    public function deleteSalle($id){
 
       $id=(int)$id;
    $db = $this->getDb();
    $query = $db->prepare( "DELETE FROM Salle
                            WHERE id_salle = :id;");
 
    $query->bindValue(':id', $id, PDO::PARAM_INT);    
 
    $delete = $query->execute();
    if (!is_null($delete)) {
        return true;
    } else {
        return false;
    }
    }
}