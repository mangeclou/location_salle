<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace service\validator;

/**
 * Description of ValidatorController
 *
 * @author yoann
 */
class UserValidatorService
{

    /**
     * 
     * @param type $nom
     * @return string
     */
    public static function validateNom($nom)
    {
        $valid = array();
        //A TESTER
        if ($nom ==="") {
            //return 'Veuillez saisir un nom.';
            return "Veuillez saisir un nom.";
        }

        if (!preg_match("/^[a-zA-Z\'áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/", $nom)) {
            //return 'Votre nom ne peut pas contenir de chiffre.';
            return "Certains caractères ne sont pas supportés.";
        }
         
        return true;
    }
    
    /**
     * 
     * @param type $nom
     * @return string
     */
    public static function validateVille($ville)
    {
        //A TESTER
        if ($ville ===""){
            return 'Veuillez saisir une ville.';
        }
        if (!is_string($ville)){
            return 'Votre ville ne peut pas contenir uniquement des chiffres.';
        }
        if (!preg_match("/^[a-zA-Z\'áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/",$ville)){
            return 'Certains caractères ne sont pas supportés.';
        }
        return true;
    }
     
    /**
     * 
     * @param type $nom
     * @return string
     */
    public static function validatePrenom($prenom)
    {
        //A TESTER
        if ($prenom ===""){
            return 'Veuillez saisir un prénom.';
        }
        if (!is_string($prenom)){
            return 'Votre prénom ne peut pas contenir uniquement des chiffres.';
        }
        if (!preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/",$prenom)){
            return 'Votre prénom ne peut pas contenir de chiffre.';
        }
              
        return true;
    }
    
    /**
     * 
     * @param type $email
     * @return type
     * @throws Exception
     */
    public static function validateEmail($email)
    {
        //On teste la validité de l'email
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)== false){
            return 'Veuillez saisir un email valide.';
        } 
        if ($email ===""){
            return 'Veuillez saisir un email.';
        }
        //si l'arrayErrors est vide on retourne l'email, sinon on retourne l'arrayErrors
        
        return true;
        
    }
    /**
     * 
     * @param type $email
     * @return type
     * @throws Exception
     */
    public static function validateMdp($mdp)
    {
        if ($mdp ===""){
            return 'Veuillez saisir un mot de passe.';
        }
        if (strlen($mdp)> 30 ){
            return 'Veuillez saisir un mot de passe de moins de 30 caract&egrave;res..';
        }
        if (strlen($mdp)< 7 ){
            return 'Veuillez saisir un mot de passe d\'au moins 7 caract&egrave;res.';
        }
        if(!preg_match("/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ#*£$._\s-]+/",$mdp)){
            return 'Vous utilisez des caractères non supportés.';
        }
        return true;
    }
    
    /**
     * Teste si le pseudo est valide, retourne un arrayErrors si c'est le cas et
     * sinon retourne le pseudo
     * @param type $pseudo
     * @return boolean
     */
    public static function validatePseudo($pseudo)
    {
        if ($pseudo ===""){
            return 'Veuillez saisir un pseudo.';
        }
        if (strlen($pseudo)> 30 ){
            return 'Veuillez saisir un pseudo de moins de 30 caract&egrave;res..';
        }
        if (strlen($pseudo)< 3 ){
            return 'Veuillez saisir un pseudo d\'au moins 3 caract&egrave;res.';
        }
        if (!is_string($pseudo)){
            return 'Votre pseudo ne peut pas contenir uniquement des chiffres.';
        }
        if(!preg_match("/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ#*£$._\s-]+/",$pseudo)){
            return 'Vous utilisez des caractères non supportés.';
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
        //On autorise au maximum 12 caractères
        if((strlen($cp)> 12)){
           return 'Votre code postal est trop long.';
        }
                
        return true;
    }
    /**
     * 
     * @param type $sexe
     * @return type
     * @throws Exception
     */
    public static function validateSexe($sexe)
    {
        //On autorise uniquement les lettre "m" ou "f"
        if(!$sexe == 'm'||!$sexe == 'f'){
           return 'Veuillez saisir un sexe valide.';
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
        if(!in_array($pays, getCountryList())){
          return 'Veuillez saisir un pays valide.';
        }
        return true;
    }
    
    /**
     * 
     * @param type $email
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
        if ((self::validatePseudo($array['pseudo']) === true)
            && (self::validateMdp($array['mdp']) === true)
            && (self::validateNom($array['nom']) === true)
            && (self::validatePrenom($array['prenom']) === true)
            && (self::validateEmail($array['email']) === true)
            && (self::validateSexe($array['sexe']) === true)
            && (self::validateVille($array['ville']) === true)
            && (self::validateCp($array['cp']) === true)
            && (self::validateAdresse($array['adresse']) === true)
                ){
            return true;
        }  else {
            //Si au moins un validateur renvoie false, on crée un array de
            // toutes les erreurs
            
            return $arrayErrors = [
                "errorPseudo"  => self::validatePseudo($array['pseudo']),
                "errorMdp"     => self::validateMdp($array['mdp']),
                "errorNom"     => self::validateNom($array['nom']),
                "errorPrenom"  => self::validatePrenom($array['prenom']),
                "errorEmail"   => self::validateEmail($array['email']),
                "errorSexe"    => self::validateSexe($array['sexe']),
                "errorVille"   => self::validateVille($array['ville']),
                "errorCp"      => self::validateCp($array['cp']),
                "errorAdresse" => self::validateAdresse($array['adresse']),
            ];
        }
    }
}
