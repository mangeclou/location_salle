<?php

namespace repository;
require_once 'EntityRepository.php';
use PDO;
use \repository\EntityRepository AS EntityRepository; // l'utilisation du namespace permet d'extends la classe lors de l'héritage alors qu'il n'y a pas encore eu d'instanciation. //  USE déclenche l'autoload pour que la classe soit chargée et ainsi éviter une erreur.

class UserRepository extends EntityRepository {
    
    /**
     * [[Description]]
     * @param  [[Type]] $pseudo     [[Description]]
     * @param  [[Type]] $hashed_mdp [[Description]]
     * @return boolean  [[Description]]
     */
    public function findUserPseudoAndMdp($pseudo, $hashed_mdp, $table)
    {
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne

        $query = $db->prepare("SELECT pseudo, mdp
                                      FROM :table
                                      WHERE pseudo = :pseudo
                                      AND mdp = :mdp;");

        $query->bindValue(':table', $table, PDO::PARAM_STR);
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
      
    public function findUserByPseudo($pseudo, $table)
    {
        $column = 'pseudo';
        return $this->findByTableAndColumnName($table, $column, $pseudo);
    }
    
    public function findUserByEmail($email, $table)
    {
        $column = 'email';
        return $this->findByTableAndColumnName($table, $column, $email);
    }
        
    /**
     * Trim and hash a string password
     * @param type $mdp
     * @return type
     */
    public static function hashMdp($mdp)
    {
        $hashedMdp = trim(password_hash($mdp,PASSWORD_DEFAULT));
        return $hashedMdp;
    }
       
}