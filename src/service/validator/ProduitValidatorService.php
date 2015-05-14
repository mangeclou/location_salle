<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace service\validator;

require_once '/../../model/repository/SalleRepository.php';
require_once '/../../model/repository/PromotionRepository.php';

use \repository\PromotionRepository as PromotionRepository;
use \repository\SalleRepository as SalleRepository;


/**
 * Description of ProduitValidatorController
 *
 * @author yoann
 */
class ProduitValidatorService
{
    
    /**Checks the validity of a date
     * @param  $date of type datetime
     * @param  $format. The format of the date. Default is 'Y-m-d H:i:s'
     * @return boolean. True if the date is valid, false if not.
     */
    public static function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
        
    /**
     * [[Description]]
     * @param  [[Type]]       $salle [[Description]]
     * @return string|boolean [[Description]]
     */
    public static function validateSalle($salle)
    {
        //A TESTER
        if ($salle ===""){
            return 'Veuillez saisir une salle.';
        }
        
        $sr    = new SalleRepository();
        $salle = $sr->findSalleById($salle);
        if (empty($salle)) {
            return 'Cette salle n\'existe pas.';
        }
           
        return true;
    }
        
    /**
     * Validates the date_arrivee
     * @param  [[Type]]       $date_arrivee [[Description]]
     * @return string if not validated |boolean true if valid
     */
    public static function validateDateArrivee($date_arrivee)
    {
        //A TESTER
        if ($date_arrivee ==="") {
            return 'Veuillez saisir une date d\'arrivée.';
        }
        if (self::validateDate($date_arrivee) === false) {
            return 'Veuillez saisir une date valide.';
        }
        return true;
    }
    
     /**
     * Validates the date_arrivee
     * @param  [[Type]]       $date_arrivee [[Description]]
     * @return string if not validated |boolean true if valid
     */
    public static function validateDateDepart($date_depart)
    {
        //A TESTER
        if ($date_depart ==="") {
            return 'Veuillez saisir une date d\'arrivée.';
        }
        if (self::validateDate($date_depart) === false) {
            return 'Veuillez saisir une date valide.';
        }
        return true;
    }
    

    public static function validateDateInterval($date_arrivee, $date_depart)
    {
        $date_arriveeDt = new \DateTime($date_arrivee);
        $date_departDt  = new \DateTime($date_depart);
        if ($date_arriveeDt >= $date_departDt) {
            return 'Veuillez saisir un intervalle de date cohérent.';
        }
        return true;
    }
    
    
    /**
     * 
     * @param type $nom
     * @return string
     */
    public static function validatePrix($prix)
    {
        if ($prix ===""){
            return 'Veuillez saisir un prix.';
        }
        $num_length = strlen((string)$prix);
        if($num_length > 10) {
           return 'Votre prix est trop grand.';
        }       
        if (!is_numeric($prix)){
            return 'Veuillez saisir un chiffre correct.';
        }      
        return true;
    }
       
    /**
     * 
     * @param type $cp
     * @return type
     * @throws Exception
     */
    public static function validatePromotion($promo)
    {
        $pr    = new PromotionRepository();
        $promo = $pr->findPromotionById($promo);
        if (empty($promo)) {
            return 'Cette salle n\'existe pas.';
        }
        
        //On autorise au maximum 10 caractères
      /*  if((strlen($promo) > 6)){
           return 'Votre code promo est trop long.';
        }*/
          
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
        if ((self::validateSalle($array['id_salle']) === true)
            && (self::validateDateArrivee($array['date_arrivee']) === true)
            && (self::validateDateDepart($array['date_depart']) === true)
            && (self::validateDateInterval($array['date_arrivee'],$array['date_depart']) === true)
            && (self::validatePrix($array['prix']) === true)
            && (self::validatePromotion($array['id_promo']) === true)          
                ){
            return true;
        }  else {
            //Si au moins un validateur renvoie false, on crée un array de
            // toutes les erreurs
            
            return $arrayErrors = [
                "errorSalle"        => self::validateSalle($array['id_salle']),
                "errorDateArrivee"  => self::validateDateArrivee($array['date_arrivee']),
                "errorDateDepart"   => self::validateDateDepart($array['date_depart']),
                "errorDateInterval" => self::validateDateInterval($array['date_arrivee'],$array['date_depart']),
                "errorPrix"         => self::validatePrix($array['prix']),
                "errorPromotion"    => self::validatePromotion($array['id_promo']),              
            ];
        }
    }
}
