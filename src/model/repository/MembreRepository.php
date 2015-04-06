<?php
// 	Un repository centralise tout ce qui touche à la récupération de vos entités. Concrètement donc, vous ne devez pas faire la moindre requête SQL ailleurs que dans un repository, c'est la règle. 
// Cette classe contiendra les méthodes de Employé et demandera l'exécution à EntityRepository ! c'est un écran entre les deux, remplir la totalité, très facile !	
//	Ce fichier vendor/Repository/EmployeRepository.php donne une erreur lors d'un test sur son url mais c'est normal car il compose l'application et ce n'est donc pas un point d'entrée.

namespace repository;
require_once 'EntityRepository.php';
use PDO;
use repository\EntityRepository; // l'utilisation du namespace permet d'extends la classe lors de l'héritage alors qu'il n'y a pas encore eu d'instanciation. //  USE déclenche l'autoload pour que la classe soit chargée et ainsi éviter une erreur.

class MembreRepository extends EntityRepository {

    public function getAllMembre()
    {
      return $this->findAll(); // on va voir la méthode findAll() de EntityRepository
    }

    public function findMembreById($id)
    {
        return $this->find($id); // on va voir la méthode findAll() de EntityRepository
    }
    
    public function findMembrePseudoAndMdp($pseudo, $hashed_mdp)
    {
      $query = $this->getDb();
      //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne

      $myQuery = $query->prepare("SELECT *
                                    FROM membre 
                                    WHERE pseudo = :pseudo
                                    AND mdp = :mdp");
      $myQuery->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
      $myQuery->bindParam(':mdp', $hashed_mdp, PDO::PARAM_STR);
   
      $myQuery->execute();
      return $myQuery->fetchAll();
    }
  
    public function findMembreByPseudo($pseudo)
    {
      $table = 'membre';
      $column = 'pseudo';
      return $this->findByTableAndColumnName($table, $column, $pseudo);
    }

    public function registerMembre($membreValues)
    {
      // on fait appel à la méthode register de EntityRepository
      return $this->register($membreValues);
    }
    
    /**
     * Trim and hash a string password
     * @param type $mdp
     * @return type
     */
    public static function hashMdp($mdp){
      $hashedMdp = trim(password_hash($mdp,PASSWORD_DEFAULT));
      return $hashedMdp;
    }
       
}