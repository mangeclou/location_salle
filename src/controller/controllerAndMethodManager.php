<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

/**
 * Description of controllerAndMethodManager
 *
 * @author stagiaire
 */
class controllerAndMethodManager{
    public static $arrayControllers = ['VisiteurController',
                                   'MembreController',
                                   'BackController'];
    
    public static $arrayMethods = ['back'=>[
                            'displayEnvoiNewsletter',
                            'displayGestionAvis',
                            'displayGestionCommande',
                            'displayGestionMembre',
                            'displayGestionProduit',
                            'displayGestionPromo',
                            'displayGestionSalle',
                            'displayIndexBack',
                            'displayPanierBack',
                            'displayProfilBack',
                            'displayRechercheBack',
                            'displayReservationBack',
                            'displayStatistique'
                            ],
                        'membre'=>[
                            'displayContact',
                            'displayIndexMembre',
                            'displayNewsletterInscription',
                            'displayPanier',
                            'displayProfil'
                            ],
                        'visiteur'=>[
                            'creerMembre',
                            'displayCgv',
                            'connexion',
                            'displayIndex',
                            'displayInscription',                            
                            'displayMdpperdu',
                            'displayMention',
                            'displayPlan',
                            'displayRecherche',
                            'displayReservation',
                            'displayReservationdetail',
                            ]
                        ];
    
   //check si le controller existe
    public static function isValidController ($controller)
    {
        if (in_array($controller, self::$arrayControllers)) {
            return true;
        } else {
            echo "le controller n'est pas valide.";
            return false;
        }
    }
    
    //check si le couple méthode - controller existe
    public static function isValidMethodInController ($controller,$method)
    {
        if (self::isValidController($controller)) {
            //supprime 'controller' du nom du controller et le fait commencer par
            //une minuscule
           $controller = lcfirst($controller);
           echo $controller .'<br>';
           //$pos = strpos($haystack, $needle);
          //$controllerNew = strtr($controller, 'Controller', '$controller');
           
           //On enlève 'Controller' du nom du controller pour pouvoir chercher dans
           //le bon array
           $search = 'Controller';
           $replace ='';
           $subject = $controller;           
           $controllerName = str_replace($search, $replace, $subject);
                     
           //check the right array to look into
           $array = self::$arrayMethods[$controllerName];
           
           if (in_array($method, $array)) {
               return true;
            } else {
                echo "[debug]La méthode " . $method ."n'a pas été trouvée dans " .$controller;
                return false;
            }
       
        } else {
            echo '[debug]Controller non valide.';
            return false;
        }
    }
    
    /**
     * 
     * @param type $controller
     * @param type $method
     * @return boolean
     * @desc Check si le couple méthode / controller est valide.
     * Utilise les méthodes isValidController et isValidMethodInController      
     */
    public static function checkControllerAndMethod($controller,$method)
    {
        if ((self::isValidController($controller) == true) &&
           (self::isValidMethodInController($controller, $method) == true)){
            return true; 
        } else {
            echo "[debug]Le couple méthode controller n'est pas valide";
            return false;
        }
        
    }
    /**
     * 
     * @param type $controller
     * @param type $method
     * @desc filtre les string des méthodes et controller et instantie dynamiquement
     * l'objet. Utilise ensuite la méthode demandée de cet objet.
     */
    public static function filterInstantiateAndCall($controller,$method)
        {
            $controller = (filter_var($controller,FILTER_SANITIZE_STRING));
            $method = (filter_var($method,FILTER_SANITIZE_STRING));
            
            //On instancie dynamiquement la classe correspondante
           
            $obj = new $controller; // $myController = new MyController()

            call_user_func( array( $obj, $method) ); // $myController->myMethod()
                    
        }
}
