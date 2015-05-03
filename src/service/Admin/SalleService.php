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
    
    protected function FilterSalle()
    {
        $fs          = new FilterService();
        $pays        = $fs->filterPostString('pays');
        $ville       = $fs->filterPostString('ville');
        $adresse     = $fs->filterPostString('adresse');
        $cp          = $fs->filterPostString('cp');    
        $titre       = $fs->filterPostString('titre');    
        $description = $fs->filterPostString('description');    
        $photo       = $fs->filterPostUrl('photo');    
        $capacite    = $fs->filterPostString('capacite');    
        $categorie   = $fs->filterPostString('categorie');    

        $filteredSalle = [
            "pays"        => $pays,
            "ville"       => $ville,
            "adresse"     => $adresse,   
            "cp"          => $cp,          
            "titre"       => $titre,
            "description" => $description,
            "photo"       => $photo,   
            "capacite"    => $capacite,      
            "categorie"   => $categorie,         
        ];
        return $filteredSalle;        
    }
    
    public function addSalle()
    {

       //If the form has not been posted
        //if (parent::postCreateUserExist()) {
        //Filter post
        $fs          = new FilterService();
        $pays        = $fs->filterPostString('pays');
        $ville       = $fs->filterPostString('ville');
        $adresse     = $fs->filterPostString('adresse');
        $cp          = $fs->filterPostString('cp');    
        $titre       = $fs->filterPostString('titre');    
        $description = $fs->filterPostString('description');    
        $photo       = $fs->filterPostUrl('photo');    
        $capacite    = $fs->filterPostString('capacite');    
        $categorie   = $fs->filterPostString('categorie');    

        $filteredSalle = [
            "pays"        => $pays,
            "ville"       => $ville,
            "adresse"     => $adresse,   
            "cp"          => $cp,          
            "titre"       => $titre,
            "description" => $description,
            "photo"       => $photo,   
            "capacite"    => $capacite,      
            "categorie"   => $categorie,         
        ];
        //Check if the titre in the form already exists in the db  (the titre is 
        //unique in the db)
        $sr         = new SalleRepository();
        $findTitre = $sr ->findSalleByTitre($titre);
        $arrayErrors = [];
        //print_r($mr);
        //print_r($filteredMember);
        //exit();
        //If the titre already exists
        if ($findTitre === true) {
            $arrayErrors[] = 'Veuillez choisir un autre titre.';
        }        
        //If the pseudo doesn't exist
        $vs = new ValidatorService();
        $validation = $vs->isFormValid($filteredSalle);
        //Check if the form pass the validation test
        if ($validation !== true) {
            ///Returns the arrayErrors
            //print_r($validation);
            //exit();
            return $arrayErrors;//array( 'arrayErrors' => $arrayErrors)
        //If the form is validated         
        } else {
            if ($validation === true) {
                //Add salle data to db
                $sr->registerSalle($filteredSalle);
               // print_r($query);
               // exit();
               
                echo "Salle ajoutée";
                self::redirect("BackController", "displaySalle");
            }
        }//END if $validation !== true
    }//END addSalle()  
    
    

    
    public function editSalleService()
    {
        //If the form has not been posted
        //if (parent::postCreateUserExist()) {
        //Filter post
        $filteredSalle = $this->FilterSalle();
        //Check if the titre in the form already exists in the db  (the titre is 
        //unique in the db)
        $sr          = new SalleRepository();
        $findTitre   = $sr ->findSalleByTitre($filteredSalle['titre']);
        $arrayErrors = [];
        //print_r($mr);
        //print_r($filteredMember);
        //exit();
        //If the titre already exists
        if ($findTitre === true) {
            $arrayErrors[] = 'Veuillez choisir un autre titre.';
        }        
        //If the pseudo doesn't exist
        $vs = new ValidatorService();
        $validation = $vs->isFormValid($filteredSalle);
        //Check if the form pass the validation test
        if ($validation !== true) {
            ///Returns the arrayErrors
            //print_r($validation);
            //exit();
            return $arrayErrors;//array( 'arrayErrors' => $arrayErrors)
        //If the form is validated         
        } else {
            if ($validation === true) {
                //The id of the salle to be edited is taken from the $_GET
                $filteredSalle["id_salle"] = (int)filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
                //Add salle data to db
                $sr->updateSalle($filteredSalle);
               // print_r($query);
               // exit();
               
                echo "Salle ajoutée";
                self::redirect("BackController", "displaySalle");
            }
        }//END if $validation !== true
       
    }
    
    public function deleteSalle()
    {
        
    }
}