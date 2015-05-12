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
require_once '/../validator/SalleValidatorService.php';
require_once '/../../model/repository/SalleRepository.php';

use \repository\SalleRepository as SalleRepository;
use \repository\ProduitRepository as ProduitRepository;
use \service\UserService AS UserService;
use \service\FilterService AS FilterService;
use \service\SalleValidatorService AS ValidatorService;
use \service\UrlService AS UrlService;

class SalleService
{
    
    protected function redirect($controller, $method)
    {
        header("location:index.php?controller=" .ucfirst($controller) ."&method=" .$method);
    }
    
    protected static function FilterProduit()
    {
        $fs           = new FilterService();
        $salle        = $fs->filterPostString('salle');
        $date_arrivee = $fs->filterPostString('date_arrivee');
        $date_depart  = $fs->filterPostString('date_depart');
        $prix         = $fs->filterPostString('prix');    
        $promotion    = $fs->filterPostString('promotion');    

        $filteredPromotion = [
            "salle"        => $salle,
            "date_arrivee" => $date_arrivee,
            "date_depart"  => $date_depart,   
            "prix"         => $prix,          
            "promotion"    => $promotion,          
        ];
        return $filteredPromotion;        
    }
    
    public function addProduitService()
    {

       //If the form has not been posted
        //if (parent::postCreateUserExist()) {
        //Filter post
        $filteredProduit = self::FilterProduit();
        
        $arrayErrors = [];
       
        $vs         = new ValidatorService();
        $validation = $vs->isFormValid($filteredPromotion);
        //Check if the form pass the validation test
        print_r($validation);
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
      
    public function editSalleService()
    {
        //If the form has not been posted
        //if (parent::postCreateUserExist()) {
        //Filter post
        $filteredSalle = self::FilterSalle();
        //Check if the titre in the form already exists in the db  (the titre is 
        //unique in the db)
        $sr          = new SalleRepository();
        $findTitre   = $sr ->findSalleByTitre($filteredSalle['titre']);
        $arrayErrors = [];
       
        //If the titre already exists
        if ($findTitre === true) {
            $arrayErrors[] = 'Veuillez choisir un autre titre.';
            self::redirect("BackController", "editSalle");
        }        
        //If the pseudo doesn't exist
        $vs = new ValidatorService();
        $validation = $vs->isFormValid($filteredSalle);
        //Check if the form pass the validation test
        if ($validation !== true) {
            //Returns the arrayErrors
            echo "not ok valid";
            return $validation;
        //If the form is validated         
        } else {
                            
                //The id of the salle to be edited is taken from the $_GET
                $filteredSalle["id_salle"] = (int)filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
                //Add salle data to db
                $sr->updateSalle($filteredSalle);
              
                self::redirect("BackController", "displaySalle");
            
        }//END if $validation !== true
       
    }
    
    public function deleteSalleService($id)
    {
        echo $id;
        $sr         = new SalleRepository();
        $sr ->deleteSalle($id);
         self::redirect("BackController", "displaySalle");
    }
}