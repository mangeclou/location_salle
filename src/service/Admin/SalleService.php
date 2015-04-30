<?php 
/**
 * Services related to the connexion to the site for a user
 * Must be autonomous with no dependencies to the controllers
 * Each time it is used in a method the object should be instantiated
 *
 * @author yoann
 */
namespace service\Admin;

require '../FilterService.php';
require '../UrlService.php';
require '../UserService.php';
require '../ValidatorService.php';
require '/../model/repository/MembreRepository.php';

use \repository\MembreRepository as MembreRepository;
use \service\UserService AS UserService;
use \service\FilterService AS FilterService;
use \service\ValidatorService AS ValidatorService;
use \service\UrlService AS UrlService;

class AdminService extends UserService
{
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
        //Check if the pseudo in the form already exists in the db  
        $mr         = new MembreRepository();
        $findPseudo = $mr ->findMembreByPseudo($pseudo);
        $findEmail  = $mr ->findMembreByEmail($email);
        //print_r($mr);
        //print_r($filteredMember);
        //exit();
        //If the pseudo already exists
        if ($findPseudo === true) {
            $arrayErrors[] = 'Veuillez choisir un autre pseudo.';
        }
        //If the email already exists
        if ($findEmail === true) {
            $arrayErrors[] = 'Veuillez choisir un autre email.';
        }
        //If the pseudo doesn't exist
        $vs = new ValidatorService();
        $validation = $vs->isFormValid($filteredMember);
        //Check if the form pass the validation test
        if ($validation !== true) {
            ///Returns the arrayErrors
            return $arrayErrors;//array( 'arrayErrors' => $arrayErrors)
        //If the form is validated         
        } else {
            if ($validation === true) {
                //Hash the password
                $filteredMember["mdp"] = \repository\MembreRepository::hashMdp($filteredMember["mdp"]);
                //Add admin data to db
                $mr->registerMembre($filteredMember);
               // print_r($query);
               // exit();
                parent::startSessionUser($filteredMember['email'], $filteredMember['pseudo']);
                //Temp
                echo "Admin ajouté";
            }
        }//END if $validation !== true
    }//END addAdmin()  
    
    
    public function editSalle()
    {
        
    }
    
    public function deleteSalle()
    {
        
    }
}