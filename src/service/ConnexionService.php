<?php 
/**
 * Services related to the connexion to the site for a user
 * Must be autonomous with no dependencies
 *
 * @author yoann
 */
namespace service;


abstract class ConnexionService()
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
        if ((!filter_has_var(INPUT_POST, 'pseudo')) &&
          (!filter_has_var(INPUT_POST, 'mdp'))){
              //  si oui, on teste dans la bdd si
              //le couple pseudo / mdp existe, si oui on affiche la page indexMembre
              require __DIR__ . '/../views/viewParameters.php';
              $this->connexionParameters = $viewPageParameters['visiteur']['connexion']; 
              $this->render($this->layout, $this->connexionTemplate, $this->connexionParameters);  
      } else {
        //mdp du post
        $mdpForm     = FilterController::filterPostString('mdp');
        $pseudo  = \controller\FilterController::filterPostString('pseudo');
        //Comparaison entre le mdp fourni et le mdp en base
        $testMembre = new \repository\MembreRepository();
        //on appelle la méthode findMembreMdp

        $newMembre = $testMembre->findMembrePseudoAndMdp($pseudo);

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
      }
    }//===========================

  }//END function connexion
}