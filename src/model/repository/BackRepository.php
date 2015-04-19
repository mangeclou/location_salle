<?php
// 	Un repository centralise tout ce qui touche à la récupération de vos entités. Concrètement donc, vous ne devez pas faire la moindre requête SQL ailleurs que dans un repository, c'est la règle. 
// Cette classe contiendra les méthodes de Employé et demandera l'exécution à EntityRepository ! c'est un écran entre les deux, remplir la totalité, très facile !	
//	Ce fichier vendor/Repository/EmployeRepository.php donne une erreur lors d'un test sur son url mais c'est normal car il compose l'application et ce n'est donc pas un point d'entrée.

namespace repository;
require_once 'UserRepository.php';
//use PDO;
use repository\UserRepository; // l'utilisation du namespace permet d'extends la classe lors de l'héritage alors qu'il n'y a pas encore eu d'instanciation. //  USE déclenche l'autoload pour que la classe soit chargée et ainsi éviter une erreur.

class BackRepository extends UserRepository {

    public function getAllAdminUsers()
    {
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne
        $query = $db->prepare( "SELECT *
                                FROM membre 
                                WHERE statut = 2;");
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if (count($data) < 1) {
           return false;
        } else {
          return $data;
        }       
    }
    /**
     * statut 2 = for admin, 1 = for back user but not admin
     * @param  [[Type]] $id [[Description]]
     * @return boolean  [[Description]]
     */
    public function findAdminById($id)
    {
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne
        $query = $db->prepare( "SELECT *
                                FROM membre 
                                WHERE statut = 2
                                AND id = :id;");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if (count($data) < 1) {
           return false;
        } else {
          return $data;
        }       
    }
    /**
     * [[Description]]
     * @param  [[Type]] $pseudo     [[Description]]
     * @param  [[Type]] $hashed_mdp [[Description]]
     * @return boolean  [[Description]]
     */
    public function findAdminPseudoAndMdp($pseudo, $hashed_mdp)
    {
         $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne

        $query = $db->prepare("SELECT pseudo, mdp
                                      FROM membre
                                      WHERE pseudo = :pseudo
                                      AND statut = 2
                                      AND mdp = :hashed_mdp;");

        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':mdp', $hashed_mdp, PDO::PARAM_STR);

        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);
        if (count($data) < 1) {
           return false;
        } else {
          return $data;
        }         
    }
    
    /*NOTE : NO NEED to have a registerAdmin, use registerMember*/
   
}