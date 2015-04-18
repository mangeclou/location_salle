<?php 
/**
 * Services related to the connexion to the site for a user
 * Must be autonomous with no dependencies
 *
 * @author yoann
 */
namespace service;

include 'FilterService.php';
include '../model/Repository/MembreRepository.php';

use repository\MembreRepository as MembreRepository;

abstract class ConnexionService
{
    protected function getSession()
    {
    return $this->session;
    }

    protected function getRedirectAlreadyConnected()
    {
    return $this->redirectAlreadyConnected;
    }

    protected function getRedirectNotAuthentified()
    {
    return $this->redirectNotAuthentified;
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
                                        $methodAuth,
                                        $controllerAlreadyAuth,
                                        $methodAlreadyAuth
                                       )
    {
        
    //si la session est définie, donc si l'utilisateur est déjà connecté
    if (self::verifyAlreadyAuthenticated()) {
        //Redirect
        self::redirect($controllerAlreadyAuth, $methodAlreadyAuth )
    } else {
          //On teste si le $_POST contient quelque chose,
          //Si le formulaire n'a pas été soumis
       
        //mdp du post
        $mdp     = FilterService::filterPostString('mdp');
        $pseudo      = FilterService::filterPostString('pseudo');
        
        $testMembre = new MembreRepository();
        //Comparaison entre le mdp fourni et le mdp en base
        $newMembre = $testMembre->findMembrePseudoAndMdp($pseudo,$pseudo);

        if ($newMembre) { // si on obtient un résultat 
          if (password_verify($mdpForm, $newMembre['mdp'])) {

            // $msg .= "<div class='bg-success' height='30' style='padding: 10px'><p>Mdp Ok !</p></div>";
            //foreach ($membre as $indice=>$valeur) {
            session_start();
            $_SESSION["logged"] = true;
            $_SESSION["mail"]   = $newMembre['email'];
            $_SESSION["pseudo"] = $newMembre['pseudo'];
            header("location:index.php?controller=MembreController&method=displayIndexMembre");
            //echo 'bravo';
          } else {
            echo ("Mauvais mot de passe ou pseudo 1");
          }

        //END if !$_POST
          //Si non, on
        } else {
          echo ("Mauvais mot de passe ou pseudo 2");      
        }
      
    }//===========================

  }//END function connexion
}