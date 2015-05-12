<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace service\validator;

/**
 * Description of SalleValidatorController
 *
 * @author yoann
 */
class ProduitValidatorService
{
    
    /**
     * TODO : ajouter une requête pour vérifier que la salle existe
     * @param type $nom
     * @return string
     */
    public static function validateSalle($salle)
    {
        //A TESTER
        if ($salle ===""){
            return 'Veuillez saisir une salle.';
        }
        if (!preg_match("/^[a-zA-Z\'áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\-\|\s-]+/",$salle)){
            return 'Certains caractères ne sont pas supportés.';
        }
        if((strlen($salle)> 255)){
           return 'Votre nom de salle est trop long.';
        }
        return true;
    }
     
    /**
     * TODO : à faire
     * @param type $nom
     * @return string
     */
    public static function validateDateArrivee($date)
    {
        //A TESTER
        if ($titre ===""){
            return 'Veuillez saisir un titre.';
        }
        if (!is_string($titre)){
            return 'Votre titre ne peut pas contenir uniquement des chiffres.';
        }
        if (!preg_match("/^[a-zA-Z0-9\'áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/",$titre)){
            return 'Le titre contient des caractères invalides.';
        }
        if((strlen($titre)> 50)){
           return 'Votre titre est trop long.';
        }
        
        return true;
    }
    
    /**
     * 
     * @param type $nom
     * @return string
     */
    public static function validateDescription($description)
    {
        //A TESTER
        if ($description ===""){
            return 'Veuillez saisir une description.';
        }
        if (!is_string($description)){
            return 'Votre description ne peut pas contenir uniquement des chiffres.';
        }
        if (!preg_match("/^[a-zA-Z0-9\'áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/",$description)){
            return 'La description contient des caractères invalides.';
        }
        
        if((strlen($description)> 255)){
           return 'Votre description est trop longue.';
        }
              
        return true;
    }
       
    /**
     * 
     * @param type $cp
     * @return type
     * @throws Exception
     */
    public static function validateCp($cp)
    {
        if (empty($cp)){
            return 'Veuillez saisir un code postal.';
        } 
        //On autorise au maximum 12 caractères
        if((strlen($cp)> 12)){
           return 'Votre code postal est trop long.';
        }
                
        return true;
    }
   
    /**
     * 
     * @param type $pays
     * @return type
     * @throws Exception
     */
    public static function validatePays($pays)
    {
        //On autorise uniquement les noms de pays valides
        if(!in_array($pays, self::getCountryList())){
          return 'Veuillez saisir un pays valide.';
        }
        return true;
    }
    
    /**
     * 
     * @param type $adresse
     * @return type
     * @throws Exception
     */
    public static function validateAdresse($adresse)
    {
        //On teste la validité de l'email
        
        if (empty($adresse)){
            return 'Veuillez saisir une adresse.';
        } 
        if (strlen($adresse) >250){
            return 'Votre adresse est trop longue.';
        }
        return true;
    }
    
    /**
     * [[Description]]
     * @param  [[Type]]       $adresse [[Description]]
     * @return string|boolean [[Description]]
     */
    public static function validatePhoto($photo)
    {
        //On teste la validité de la photo
        
        if (empty($photo)){
            return 'Veuillez saisir un lien.';
        } 
       /* if (strlen($photo) >250){
            return 'Votre lien est trop long.';
        }*/
        return true;
    }
    
    /**
     * [[Description]]
     * @param  [[Type]]       $capacite [[Description]]
     * @return string|boolean [[Description]]
     */
    public static function validateCapacite($capacite)
    {
        //On teste la validité de la capacite
        
        if (empty($capacite)) {
            return 'Veuillez saisir une capacite.';
        }
        if (!is_numeric($capacite)) {
            return 'Veuillez saisir un nombre entier.';
        }
        if ($capacite >999999){
            return 'Votre capacité est trop grande.';
        }
        return true;
    }
    
     public static function validateCategorie($categorie)
    {
        //On teste la validité de la capacite
        
        if (empty($categorie)) {
            return 'Veuillez saisir une catégorie.';
        }
        if (!is_string($categorie)) {
            return 'Vous devez saisir des caractères.';
        }
        if ($categorie !== "reunion"){
            return "Votre catégorie n'est pas valide.";
        }
        return true;
    }
    
    /**
     * @desc Validateur pour le formulaire inscription, on lui passe $_POST, on peut donc
     * récupérer toutes les valeurs ensuite
     * @param type $form
     * @return boolean
     */
    public function isFormValid(/*$pseudo,$mdp,$prenom,$email,$sexe,$ville,
            $cp,$adresse*/$array){
            //echo 'array de isformvalid';
             //var_dump($array);
             //exit();
        if ((self::validatePays($array['pays']) === true)
            && (self::validateVille($array['ville']) === true)
            && (self::validateAdresse($array['adresse']) === true)
            && (self::validateCp($array['cp']) === true)
            && (self::validateTitre($array['titre']) === true)
            && (self::validateDescription($array['description']) === true)
            //&& (self::validatePhoto($array['photo']) === true)
            && (self::validateCapacite($array['capacite']) === true)
            && (self::validateCategorie($array['categorie']) === true)
                ){
            return true;
        }  else {
            //Si au moins un validateur renvoie false, on crée un array de
            // toutes les erreurs
            
            return $arrayErrors = [
                "errorPays"        => self::validatePays($array['pays']),
                "errorVille"       => self::validateVille($array['ville']),
                "errorAdresse"     => self::validateAdresse($array['adresse']),
                "errorCp"          => self::validateCp($array['cp']),
                "errorTitre"       => self::validateTitre($array['titre']),
                "errorDescription" => self::validateDescription($array['description']),
                //"errorPhoto"       => self::validatePhoto($array['photo']),
                "errorCapacite"    => self::validateCapacite($array['capacite']),
                "errorCategorie"   => self::validateCategorie($array['categorie']),
            ];
        }
    }
}
