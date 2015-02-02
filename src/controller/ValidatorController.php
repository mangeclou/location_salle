<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

/**
 * Description of ValidatorController
 *
 * @author stagiaire
 */
abstract class ValidatorController extends controller{
    
    //protected $nom;
    //protected $prenom;
    //protected $email;
    //protected $pseudo;
    //protected $adresse;
    //protected $ville;
    //protected $cp;
    //protected $email;
    //protected $sexe;
    //protected $pays;
    //protected $titre;
    //protected $description;
    //protected $photo;
    //protected $capacite;
    //protected $categorie;
    //protected $prix;
    //protected $etat;
    //protected $date;
    //protected $commentaire;
    //protected $note;
    

    /**
     * Fonction qui fonctionne pour les noms qui ne comportent pas de chiffres mais
     * comportent des apostrophes, des tirets et des espaces. Le deuxième argument est
     * le nombre maximum de caractères 
     * 20 caractères
     * @param type $nom
     * @return type string
     * @throws Exception
     */
    public function validateNom($nom, $max)
    {
        //A TESTER
        
        if((is_string($nom)) 
                && (is_int($max))
                && ((strlen($nom)<= $max))
                && (preg_match("#(?:[^\w|'-\s]|[\d])#i",$nom))){
            return $nom;
        }  else {
            throw new Exception('Veuillez saisir un nom de '.$max .' caractères maximum.');
        }
    }
            
    public function validateEmail($email)
    {
        //On teste la validité de l'email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)== true){
            return $email;
        } else {
            throw new Exception('Veuillez saisir un email valide.');
        }
    }
    
    public function validatePseudo($pseudo)
    {
        //On autorise les lettres, les chiffres et "_"
        if((is_string($pseudo)) && (strlen($pseudo)<= 30)&& preg_match("/^[a-z0-9_]$/i",$pseudo)){
            return $pseudo;
        }  else {
            throw new Exception('Seuls les chiffres, les lettres de "a" à "z" et les "_" sont autorisés.');
        }
    }
    
    public function validateCp($cp)
    {
        //On autorise uniquement les chiffres, au maximum 12 caractères
        if((is_int($cp)) && (strlen($cp)<= 12)){
            return $cp;
        }  else {
            throw new Exception('Veuillez saisir un code postal valide.');
        }
    }
    
    public function validateSexe($sexe)
    {
        //On autorise uniquement les lettre "m" ou "f"
        if(($sexe == 'm')||($sexe == 'f')){
            return $sexe;
        }  else {
            throw new Exception('Veuillez saisir un code postal valide.');
        }
    }
    
    public function validatePays($pays)
    {
        //On autorise uniquement les lettre "m" ou "f"
        if(($sexe == 'm')||($sexe == 'f')){
            return $sexe;
        }  else {
            throw new Exception('Veuillez saisir un code postal valide.');
        }
    }
    
}
