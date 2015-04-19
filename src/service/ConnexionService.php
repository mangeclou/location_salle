<?php 
/**
 * Services related to the connexion to the site for a user
 * Must be autonomous with no dependencies to the controllers
 *
 * @author yoann
 */
namespace service;

include 'FilterService.php';
include '../model/Repository/MembreRepository.php';

use repository\MembreRepository as MembreRepository;

class ConnexionService
{
    private $session = $_SESSION;
    
    protected function getSession()
    {
        return $this->session;
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
        
    protected function connexion($controllerNotAuth,
                                 $methodNotAuth,
                                 $controllerAuth,
                                 $methodAuth                                       
                                       )
    {
        
    //si la session est définie, donc si l'utilisateur est déjà connecté
    if (self::verifyAlreadyAuthenticated()) {
        //Redirect
        self::redirect($controllerAuth, $methodAuth )
    } else {
          //On teste si le $_POST contient quelque chose,
          //Si le formulaire n'a pas été soumis
       
        //Filter post
        $mdp     = FilterService::filterPostString('mdp')
        $pseudo  = FilterService::filterPostString('pseudo');
        $connexionErrors ="";
        
        $testMembre = new MembreRepository();
        //Comparaison entre le mdp fourni et le mdp en base
        $newMembre = $testMembre->findMembrePseudoAndMdp($pseudo,$mdp);

        if ($newMembre) { // si on obtient un résultat 
          if (password_verify($mdpForm, $newMembre['mdp'])) {

            // $msg .= "<div class='bg-success' height='30' style='padding: 10px'><p>Mdp Ok !</p></div>";
            //foreach ($membre as $indice=>$valeur) {
            session_start();
            $_SESSION["logged"] = true;
            $_SESSION["mail"]   = $newMembre['email'];
            $_SESSION["pseudo"] = $newMembre['pseudo'];
            //Redirect
            self::redirect($controllerAuth, $methodAuth )
            //echo 'bravo';
          } else {
            return $connexionErrors = "badPassword";
          }
        //END if !$_POST
          //Si non, on
        } else {
            return $connexionErrors = "badPasswordOrLogin";     
        }
      
    }//===========================

  }//END function connexion
}