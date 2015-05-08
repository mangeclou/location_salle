<?php 
/**
 * Services related to the connexion to the site for a user
 * Must be autonomous with no dependencies to the controllers
 * Each time it is used in a method the object should be instantiated
 *
 * @author yoann
 */
namespace service\Admin;

require '/../FilterService.php';
require '/../UrlService.php';
require '/../UserService.php';
require '/../validator/UserValidatorService.php';
require '/../../model/repository/MembreRepository.php';

use \repository\MembreRepository as MembreRepository;
use \service\UserService AS UserService;
use \service\FilterService AS FilterService;
use \service\ValidatorService AS ValidatorService;
use \service\UrlService AS UrlService;

class UserAdminService extends UserService
{
    
    /**
     * Redirects to member authorized page
     * @return [[Type]] [[Description]]
     */
    public function redirectAdmin()
    {
        return parent::redirect("BackController", "displayIndexBack");        
    }
      
    public function verifyAlreadyAuthenticatedAdmin()
    {
        if (parent::verifyAlreadyAuthenticated()) {
            if (isset($this->session["email"])  &&
                isset($this->session["admin"])&&
                isset($this->session["pseudo"]) 
               ) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    protected function startSessionAdmin($email, $pseudo)
    {
        parent::startSessionUser($email, $pseudo);
        $_SESSION["admin"]   = true;      
        
    }
    
    /**
     * [[Description]]
     * @param  [[Type]] $controllerAuth [[Description]]
     * @param  [[Type]] $methodAuth     [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function connexionAdmin($controllerAuth, $methodAuth)
    {
        //Check if the user is already authenticated
        if (self::verifyAlreadyAuthenticatedAdmin()) {
            //Redirect
            self::redirectAdmin();
        } else {
            //If the post has been submited
            if (parent::postConnexionExist()) {
                //Filter post
                $fs     = new FilterService();
                $mdp    = $fs->filterPostString('mdp');
                $pseudo = $fs->filterPostString('pseudo');
                $connexionErrors ="";

                $mr = new MembreRepository();
                //Method to find the form pseudo
                $newMembre  = $mr->findAdminByPseudo($pseudo);
                                
                //If the pseudo exists in the db with admin status
                if (isset($newMembre)) {
                    //Check if the password of the post matches the hashed password in the db
                    if (password_verify($mdp, $newMembre["mdp"])) {
                        //foreach ($membre as $indice=>$valeur) {
                        self::startSessionAdmin($newMembre["email"], $newMembre["pseudo"]);
                        
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
    
    public function addAdmin()
    {
       //If the form has not been posted
        //if (parent::postCreateUserExist()) {
        //Filter post
        $fs      = new FilterService();
        $pseudo  = $fs->filterPostString('pseudo');
        $mdp     = $fs->filterPostString('mdp');
        $email   = $fs->filterPostEmail('email');      

        $filteredMember = [
            "pseudo"  => $pseudo,
            "mdp"     => $mdp,
            "email"   => $email,   
            "statut"  => 1,
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
              
                parent::startSessionUser($filteredMember['email'], $filteredMember['pseudo']);
                //Temp
                echo "Admin ajouté";
            }
        }//END if $validation !== true
    }//END addAdmin()
}