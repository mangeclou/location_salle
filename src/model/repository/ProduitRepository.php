<?php
// 	Un repository centralise tout ce qui touche à la récupération de vos entités. Concrètement donc, vous ne devez pas faire la moindre requête SQL ailleurs que dans un repository, c'est la règle. 
// Cette classe contiendra les méthodes de Employé et demandera l'exécution à EntityRepository ! c'est un écran entre les deux, remplir la totalité, très facile !	
//	Ce fichier vendor/Repository/EmployeRepository.php donne une erreur lors d'un test sur son url mais c'est normal car il compose l'application et ce n'est donc pas un point d'entrée.

namespace repository;

require_once 'EntityRepository.php';
USE repository\EntityRepository; // l'utilisation du namespace permet d'extends la classe lors de l'héritage alors qu'il n'y a pas encore eu d'instanciation. //  USE déclenche l'autoload pour que la classe soit chargée et ainsi éviter une erreur.

class ProduitRepository extends EntityRepository {

    public function getAllProduit()
    {
        return $this->findAll(); // on va voir la méthode findAll() de EntityRepository
    }

    public function findProduitById($id)
    {
        return $this->find($id); // on va voir la méthode findAll() de EntityRepository
    }

    public function registerProduit()
    {
        return $this->register(); // on va voir la méthode findAll() de EntityRepository
    }
}