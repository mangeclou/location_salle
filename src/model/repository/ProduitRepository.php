<?php
// 	Un repository centralise tout ce qui touche à la récupération de vos entités. Concrètement donc, vous ne devez pas faire la moindre requête SQL ailleurs que dans un repository, c'est la règle. 
// Cette classe contiendra les méthodes de Employé et demandera l'exécution à EntityRepository ! c'est un écran entre les deux, remplir la totalité, très facile !	
//	Ce fichier vendor/Repository/EmployeRepository.php donne une erreur lors d'un test sur son url mais c'est normal car il compose l'application et ce n'est donc pas un point d'entrée.

namespace repository;

require_once '\EntityRepository.php';

use PDO;
use \repository\EntityRepository AS EntityRepository;

class ProduitRepository extends EntityRepository {

public function getAllProduit()
    {
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne

        $query = $db->prepare( "SELECT *
                                FROM produit;");

        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;          
    }

    public function findProduitById($id)
    {
        $id = (int)$id;
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne
        $query = $db->prepare("SELECT *
                                FROM produit
                                WHERE id_produit = :id;");

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        
        $data = $query->fetch(PDO::FETCH_ASSOC);
        
        return $data;          
    }

    public function registerProduit($produit)
    {
        return $this->register($produit); // on va voir la méthode findAll() de EntityRepository
    }
    
    public function deleteProduit($id)
    {
 
        $id=(int)$id;
        $db = $this->getDb();
        $query = $db->prepare( "DELETE FROM produit
                            WHERE id_produit = :id;");
 
        $query->bindValue(':id', $id, PDO::PARAM_INT);    
 
        $delete = $query->execute();
        if (!is_null($delete)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updateProduit($values)
    {
        extract($values);
        
        $db = $this->getDb();
        //NOTE : ajouter un throw new Exception et un try catch dans le cas où la requête ne trouve aucune colonne
        $query = $db->prepare("UPDATE produit
                                SET date_arrivee = :date_arrivee, date_depart= :date_depart, id_salle= :id_salle, id_promo=:id_promo, prix=:prix
                                    WHERE id_produit = :id_produit;");

        $query->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
        $query->bindValue(':date_arrivee', $date_arrivee, PDO::PARAM_STR);
        $query->bindValue(':date_depart', $date_depart, PDO::PARAM_STR);
        $query->bindValue(':id_salle', $id_salle, PDO::PARAM_INT);
        $query->bindValue(':id_promo', $id_promo, PDO::PARAM_INT);
        $query->bindValue(':prix', $prix, PDO::PARAM_INT);
        $update = $query->execute();
       
        return $update;          
    }
}