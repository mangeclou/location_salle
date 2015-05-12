<?php
// 	Un repository centralise tout ce qui touche à la récupération de vos entités. Concrètement donc, vous ne devez pas faire la moindre requête SQL ailleurs que dans un repository, c'est la règle. 
// Cette classe contiendra les méthodes de Employé et demandera l'exécution à EntityRepository ! c'est un écran entre les deux, remplir la totalité, très facile !	
//	Ce fichier vendor/Repository/EmployeRepository.php donne une erreur lors d'un test sur son url mais c'est normal car il compose l'application et ce n'est donc pas un point d'entrée.

namespace repository;

require_once '\EntityRepository.php';

use PDO;
use \repository\EntityRepository AS EntityRepository;

class PromotionRepository extends EntityRepository {

    /**
     * Gets all the promotions
     * @return Array with all the salles
     */
    public function getAllPromotion()
    {
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne

        $query = $db->prepare( "SELECT *
                                FROM promotion;");

        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;          
    }
    
    public function findPromotionById($id)
    {
        return $this->find($id); // on va voir la méthode findAll() de EntityRepository
    }

    public function registerPromotion()
    {
        return $this->register(); // on va voir la méthode findAll() de EntityRepository
    }
}