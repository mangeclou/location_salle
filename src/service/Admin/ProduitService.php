<?php 
/**
 * Services related to the connexion to the site for a user
 * Must be autonomous with no dependencies to the controllers
 * Each time it is used in a method the object should be instantiated
 *
 * @author yoann
 */
namespace service\Admin;

require_once '/../FilterService.php';
require_once '/../UrlService.php';
require_once '/../UserService.php';
require_once '/../validator/ProduitValidatorService.php';
require_once '/../../model/repository/SalleRepository.php';

use \repository\SalleRepository as SalleRepository;
use \repository\ProduitRepository as ProduitRepository;
use \service\UserService AS UserService;
use \service\FilterService AS FilterService;
use \service\validator\ProduitValidatorService AS ValidatorService;
use \service\UrlService AS UrlService;

class ProduitService
{
    
    protected function redirect($controller, $method)
    {
        header("location:index.php?controller=" .ucfirst($controller) ."&method=" .$method);
    }
    
    protected static function FilterProduit()
    {
        $fs           = new FilterService();
        $salle        = $fs->filterPostInt('id_salle');
        $date_arrivee = $fs->filterPostDatetime('date_arrivee');
        $date_depart  = $fs->filterPostDatetime('date_depart');
        $prix         = $fs->filterPostString('prix');    
        $promotion    = $fs->filterPostInt('id_promo');    
      /*  print_r($_POST);*/
echo $date_depart;
        $filteredProduit = [
            "id_salle"        => $salle,
            "date_arrivee" => $date_arrivee,
            "date_depart"  => $date_depart,   
            "prix"         => $prix,          
            "id_promo"    => $promotion,          
        ];
        return $filteredProduit;        
    }
    
    public function addProduitService()
    {

       //If the form has not been posted
        //if (parent::postCreateUserExist()) {
        //Filter post
        $filteredProduit = self::FilterProduit();
        $arrayErrors = [];
        $vs         = new ValidatorService();
        $validation = $vs->isFormValid($filteredProduit);
        //Check if the form pass the validation test
        if ($validation !== true) {
            //Returns the arrayErrors
            return $validation;//array( 'arrayErrors' => $arrayErrors)
        //If the form is validated         
        } else {
                //Add salle data to db
            echo "salle service else";
                $pr = new ProduitRepository();
                $pr->registerProduit($filteredProduit);
             
                self::redirect("BackController", "displayProduit");
            }
        //END if $validation !== true
    }//END addSalle()  
      
    public function editProduitService()
    {
        //If the form has not been posted
        //if (parent::postCreateUserExist()) {
        //Filter post
        echo 'hihi';
        $filteredProduit = self::FilterProduit();
        //TODO : add a repo method that checks if there is already one produit with
        //the same date_arrivee and the same id_salle 
        //Check if the produit doesn't already exist
        //TODO
        $arrayErrors = [];
       
        //If the produit already exists
       /* if ($findProduit === true) {
            $arrayErrors[] = 'Veuillez choisir un autre titre.';
            self::redirect("BackController", "editSalle");
        }      */  
        
        //If the produit doesn't exist
        echo 'hoho';
        $vs = new ValidatorService();
        $validation = $vs->isFormValid($filteredProduit);
        print_r($validation);
        //Check if the form pass the validation test
        if ($validation !== true) {
            //Returns the arrayErrors
            echo "not ok valid";
            return $validation;
        //If the form is validated         
        } else {
            echo 'coucou';
                            
                //The id of the salle to be edited is taken from the $_GET
                $filteredProduit["id_produit"] = (int)filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
                //Add salle data to db
                $pr = new ProduitRepository();
                $pr->updateProduit($filteredProduit);
              
                self::redirect("BackController", "displayProduit");
            
        }//END if $validation !== true
       
    }
    
    public function deleteProduitService($id)
    {
        echo $id;
        $sr         = new ProduitRepository();
        $sr ->deleteProduit($id);
         self::redirect("BackController", "displayProduit");
    }
}