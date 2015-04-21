<?php 
/**
 * Services related to the connexion to the site for a user
 * Must be autonomous with no dependencies to the controllers
 * Each time it is used in a method the object should be instantiated
 *
 * @author yoann
 */
namespace service;

require 'FilterService.php';
require 'UrlService.php';
require 'UserService.php';
require '/../model/repository/MembreRepository.php';

use \repository\MembreRepository as MembreRepository;
use service\UserService AS UserService;
use service\FilterService AS FilterService;
use service\UrlService AS UrlService;

class MembreService extends UserService
{
    
    /**
     * Redirects to member authorized page
     * @return [[Type]] [[Description]]
     */
    public function redirectMembre()
    {
        return parent::redirect("MembreController", "displayIndexmembre");        
    }
      
    public function verifyAlreadyAuthenticatedMembre()
    {
        if (parent::verifyAlreadyAuthenticated()) {
            if (isset($this->session["email"])  &&
                isset($this->session["pseudo"]) &&
                isset($this->session["email"])
               ) {
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
                print_r($newMembre);
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
            if (!parent::postCreateUserExist) {
                //Filter post
                $fs     = new FilterService();
                $pseudo  = $fs->filterPostString('pseudo');
                $mdp     = \repository\MembreRepository::hashMdp($fs->filterPostString('mdp'));
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
                $obj = new MembreRepository();
                $obj ->findMembreByPseudo($pseudo);
                //If the pseudo already exists
                if ($obj === true){
                    $arrayErrors[] = 'Veuillez choisir un autre pseudo.';
                //If the pseudo doesn't exist
                } else {
                    $vc = new ValidatorService();
                    $validation = $vc->isFormValid($filteredMember);
                    //Check if the form pass the validation test
                    if ($validation !== true) {
                        ///Returns the arrayErrors
                        return $arrayErrors;//array( 'arrayErrors' => $arrayErrors)
                    //If the form is validated         
                    } else {
                        //RegisterMembre make the query to register the membre to db
                        $mr = new MembreRepository();
                        $mr->registerMembre($filteredMember);

                        parent::startSessionUser($newMembre['email'], $newMembre['pseudo']);
                        redirectMembre();
                    }
                
                }//END if $pseudo doesn't exist
           
            }//END if !postCreateUserExist
            parent::redirect("VisiteurController", "displayConnexion");
        }//END else verifyAlreadyAuthenticatedMembre
    }//END createMembre()
}