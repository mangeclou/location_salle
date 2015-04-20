<?php 
/**
 * Services related to the connexion to the site for a user
 * Must be autonomous with no dependencies to the controllers
 *
 * @author yoann
 */
namespace service;

require 'FilterService.php';
require 'UserService.php';
require '../model/Repository/MembreRepository.php';

use repository\MembreRepository as MembreRepository;
use UserService;

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
        
    protected function connexionMembre()
    {
        
    //si la session est définie, donc si l'utilisateur est déjà connecté
    if (self::verifyAlreadyAuthenticatedMembre()) {
        //Redirect
        self::redirectMembre();
    } else {
          //On teste si le $_POST contient quelque chose,
          //Si le formulaire n'a pas été soumis
        if (!parent::postConnexionExist()) {
       
        //Filter post
        $mdp     = FilterService::filterPostString('mdp');
        $pseudo  = FilterService::filterPostString('pseudo');
        $connexionErrors ="";
        
        $testMembre = new MembreRepository();
        //Check if the pseudo exists in the db
        $newMembre  = $testMembre->findMembrePseudo($pseudo);

        if ($newMembre) { // si on obtient un résultat 
          if (password_verify($mdpForm, $newMembre['mdp'])) {

            // $msg .= "<div class='bg-success' height='30' style='padding: 10px'><p>Mdp Ok !</p></div>";
            //foreach ($membre as $indice=>$valeur) {
            session_start();
            $_SESSION["email"]   = $newMembre['email'];
            $_SESSION["pseudo"]  = $newMembre['pseudo'];
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
        parent::redirect("VisiteurController", "displayConnexion"); 
    }

  }//END function connexion
}