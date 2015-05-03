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
        return $this->find($id);
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
}