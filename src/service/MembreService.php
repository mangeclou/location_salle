<?php 
/**
 * Services related to the connexion to the site for a user
 * Must be autonomous with no dependencies to the controllers
 * Each time it is used in a method the object should be instantiated
 *
 * @author yoann
 */
namespace service;

require_once 'FilterService.php';
require_once 'UrlService.php';
require_once 'UserService.php';
require_once '/validator/UserValidatorService.php';
require_once '/../model/repository/MembreRepository.php';

use \repository\MembreRepository as MembreRepository;
use \service\UserService AS UserService;
use \service\FilterService AS FilterService;
use \service\UserValidatorService AS ValidatorService;
use \service\UrlService AS UrlService;

class MembreService extends UserService
{
    
    /**
     * Redirects to member authorized page
     * @return [[Type]] [[Description]]
     */
    public function redirectMembre()
    {
        return parent::redirect("MembreController", "displayIndexMembre");        
    }
      
    public function verifyAlreadyAuthenticatedMembre()
    {
        if (parent::verifyAlreadyAuthenticated()) {
            if (isset($this->session["email"])  &&
                isset($this->session["pseudo"])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
        
    public function connexionMembre($controllerAuth, $methodAuth)
    {
        //Check if the user is already authenticated
        if (self::verifyAlreadyAuthenticatedMembre()) {
            //Redirect
            self::redirectMembre();
        } else {
            //If the post has been submited
            if (parent::postConnexionExist()) {
                //Filter post
                $fs     = new FilterService();
                $mdp    = $fs->filterPostString('mdp');
                $pseudo = $fs->filterPostString('pseudo');
                $connexionErrors ="";

                $testMembre = new MembreRepository();
                //Method to find the form pseudo
                $newMembre  = $testMembre->findMembreByPseudo($pseudo);
                //If the pseudo exixts in the db
               
                if (isset($newMembre)) {
                    //Check if the password of the post matches the hased password in the db
                    if (password_verify($mdp, $newMembre[0]->getMdp())) {
                        //foreach ($membre as $indice=>$valeur) {
                        parent::startSessionUser($newMembre[0]->getEmail(), $newMembre[0]->getPseudo());
                        
                        //Redirect
                        self::redirect($controllerAuth, $methodAuth );
                        //echo 'bravo';
                    } else {
                        return $connexionErrors = "badPassword";
                    }
                    //END if !$_POST
                  //Si non, on
                } else {
                    return $connexionErrors = "badPasswordOrLogin";     
                }

            }//END if postConnexionExist()
        //If there is nothing in the post, redirect to the controller
        //that will display the page with the form
        //parent::redirect("VisiteurController", "connexion"); 
        }

    }//END function connexion
    
    public function createMembre()
    {
        //Check if the user is already authenticated
        if (self::verifyAlreadyAuthenticatedMembre()) {
            //Redirect
            self::redirectMembre();
        //If the user is not already authenticated
        } else {
            //If the form has not been posted
            //if (parent::postCreateUserExist()) {
                //Filter post
                $fs      = new FilterService();
                $pseudo  = $fs->filterPostString('pseudo');
                $mdp     = $fs->filterPostString('mdp');
                $nom     = $fs->filterPostString('nom');
                $prenom  = $fs->filterPostString('prenom');
                $email   = $fs->filterPostEmail('email');
                $sexe    = $fs->filterPostString('sexe');
                $ville   = $fs->filterPostString('ville');
                $cp      = $fs->filterPostString('cp');
                $adresse = $fs->filterPostString('adresse');
            
                $filteredMember = [
                    "pseudo"  => $pseudo,
                    "mdp"     => $mdp,
                    "nom"     => $nom,
                    "prenom"  => $prenom,
                    "email"   => $email,
                    "sexe"    => $sexe,
                    "ville"   => $ville,
                    "cp"      => $cp,
                    "adresse" => $adresse,
                    "statut"  => 0,
                ];
                //Check if the pseudo in the form already exists in the db  
                $mr         = new MembreRepository();
                $findPseudo = $mr ->findMembreByPseudo($pseudo);
                $findEmail  = $mr ->findMembreByEmail($email);
                   
                //If the pseudo already exists
                if ($findPseudo === true) {
                    $arrayErrors[] = 'Veuillez choisir un autre pseudo.';
                }
                //If the email already exists
                if ($findEmail === true) {
                    $arrayErrors[] = 'Veuillez choisir un autre email.';
                }
                //If the pseudo doesn't exist
                //} else {                   
                $vs = new ValidatorService();
                $validation = $vs->isFormValid($filteredMember);
                //Check if the form pass the validation test
                if ($validation !== true) {
                    ///Returns the arrayErrors
                    return $arrayErrors;//array( 'arrayErrors' => $arrayErrors)
                //If the form is validated         
                } else {
                    if ($validation === true) {
                        $filteredMember["mdp"] = \repository\MembreRepository::hashMdp($filteredMember["mdp"]);
                        //RegisterMembre make the query to register the membre to db
                        $mr->registerMembre($filteredMember);
                       
                        parent::startSessionUser($filteredMember['email'], $filteredMember['pseudo']);
                        self::redirectMembre();
                    }
                }//END if $validation !== true
               
        }//END else verifyAlreadyAuthenticatedMembre
        
    }//END createMembre()
}