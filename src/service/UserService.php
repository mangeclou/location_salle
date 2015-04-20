<?php 
/**
 * Services related to the connexion to the site for a user
 * Must be autonomous with no dependencies to the controllers
 *
 * @author yoann
 */
namespace service;

require 'FilterService.php';
require '../model/Repository/MembreRepository.php';

use repository\MembreRepository as MembreRepository;

class ConnexionService
{

    protected function sessionExist()
    {
        if (isset($_SESSION)) {
            return true;
        } else {
            return false;
        }
    }  
    
    protected function startSession($email, $pseudo)
    {
        session_start();
        $_SESSION["email"]   = $email;
        $_SESSION["pseudo"]  = $pseudo;
    }
    
    protected function postConnexionExist()
    {
        if ((filter_has_var(INPUT_POST, 'pseudo')) &&
            (filter_has_var(INPUT_POST, 'mdp'))) {
            return true;
        } else {
            return false;
        }
    }
    

    static private function redirect($controller, $method)
    {
        header("location:index.php?controller=" .ucfirst($controller) ."&method=" .$method);
    }
      
    static private function verifyAlreadyAuthenticated()
    {
        if (isset($this->$session)) {
            return true;
        } else {
            return false;
        }
    }
        
    protected function connexion($pseudo, $mdp, $controllerAuth, $methodAuth)
    {
        $connexionErrors ="";
        
        $testMembre = new MembreRepository();
        //Check if the pseudo is in the DB
        $newMembre  = $testMembre->findMembrePseudo($pseudo);
        //if the query gets a result
        if ($newMembre) {
            //Compares the POST password with the salted password in the DB
            if (password_verify($mdp, $newMembre['mdp'])) {
            //start session and store in it email and pseudo
            self::startSession($newMembre['email'], $newMembre['pseudo']);
            
            //Redirect to indexMembre page
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
      
    //===========================

  }//END function connexion
}