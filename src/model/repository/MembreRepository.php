<?php
// 	Un repository centralise tout ce qui touche à la récupération de vos entités. Concrètement donc, vous ne devez pas faire la moindre requête SQL ailleurs que dans un repository, c'est la règle. 
// Cette classe contiendra les méthodes de Employé et demandera l'exécution à EntityRepository ! c'est un écran entre les deux, remplir la totalité, très facile !	
//	Ce fichier vendor/Repository/EmployeRepository.php donne une erreur lors d'un test sur son url mais c'est normal car il compose l'application et ce n'est donc pas un point d'entrée.

namespace repository;
require_once 'UserRepository.php';
//use PDO;
use \repository\UserRepository; // l'utilisation du namespace permet d'extends la classe lors de l'héritage alors qu'il n'y a pas encore eu d'instanciation. //  USE déclenche l'autoload pour que la classe soit chargée et ainsi éviter une erreur.

class MembreRepository extends UserRepository {

    public function getAllMembre()
    {
      return $this->findAll(); // on va voir la méthode findAll() de EntityRepository
    }

    public function findMembreById($id)
    {
        return $this->find($id); // on va voir la méthode findAll() de EntityRepository
    }
    
    /**
     * [[Description]]
     * @param  [[Type]] $pseudo     [[Description]]
     * @param  [[Type]] $hashed_mdp [[Description]]
     * @return boolean  [[Description]]
     */
    public function findMembrePseudoAndMdp($pseudo, $hashed_mdp)
    {
        $table ="membre";
        return $this->findUserPseudoAndMdp($pseudo, $hashed_mdp, $table);         
    }
       
    public function findMembreByPseudo($pseudo)
    {
        $table = 'membre';
        return $this->findUserByPseudo($pseudo, $table);    
    }
    
    public function findMembreByEmail($email)
    {
        $table = 'membre';
        return $this->findUserByEmail($email, $table);
    }

    public function registerMembre($membreValues)
    {
        // on fait appel à la méthode register de EntityRepository
        $table ="membre";
        return $this->register($membreValues);
    }  
    
    public function verifyStatut($pseudo)
    {
        $table = 'membre';
        return $this->findUserByEmail($email, $table);
    }
    
     /**
     * [[Description]]
     * @param  [[Type]] $pseudo     [[Description]]
     * @param  [[Type]] $hashed_mdp [[Description]]
     * @return boolean  [[Description]]
     */
    public function findMembreStatut($pseudo)
    {
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne

        $query = $db->prepare("SELECT statut
                                      FROM membre
                                      WHERE pseudo = :pseudo;");

        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_OBJ);
        
        return $data;          
    }
    
    public function findAdminByPseudo($pseudo)
    {
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne

        $query = $db->prepare("SELECT pseudo, email, mdp, statut
                                      FROM membre
                                      WHERE pseudo = :pseudo
                                      AND statut = 1;");

        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->execute();
        
        
        $data = $query->fetch(PDO::FETCH_OBJ);
        
        return $data;          
    }
}