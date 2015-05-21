<?php
/**
*This page redirects to index_visitor.php, index_member.php, index_back.php according to the status of the visitor
*
*
*/

/**
*On charge l'autoload pour qu'il puisse appeler les bonnes classes à l'instantiation
**
*/

//require_once(__DIR__ . '/../src/autoload.php');
require_once(__DIR__ .'/../src/controller/controllerAndMethodManager.php');

$controller = $_GET['controller'];
$methodName = $_GET['method'];

$path = __DIR__ . '/../src/controller/' . $controller . '.php';
include $path;

$controllerName = 'controller/'. $controller;

//on appelle deux méthodes de controllerAndMethodManager pour checker, instancier
//et appeler la bonne méthode
if (controller\controllerAndMethodManager::checkControllerAndMethod($controller, $methodName)== true) {
	controller\controllerAndMethodManager::filterInstantiateAndCall($controllerName, $methodName);
} else {
    require_once '404.php';
}
         
 
 //Appel de la method statique dynamicInstantiateAndCall de Controller
 //controller\Controller::dynamicInstantiateAndCall($class,$classMethodName);


  //if (Autoload::$nb == 0) {
       /**
            * Si le controller ou la method n'existent pas on affiche 404.php
            */
           // require_once '404.php';
      
 // } 
           
        
/**
*faire un if qui en fonction de ce que renvoie une methode de la classe controller (?)  qui elle va chercher la méthode  isAdmin va 
*rediriger (header(location:'index_front.php') vers index_membre.php pour un membre, index_visitor.php pour un visiteur simple
*et index_back.php pour un compte ayant des droits type admin
*
*
*/
//use ;//classes à utiliser

/*$user = Controller->getUserStatus();
if (!isset(userStatus)) {
	//the visitor home page is displayed
	header(location:'index_visitor.php');
}
elseif (Controller->userStatus ==0) {
	header(location:'index_member.php');
}
elseif (Controller->userStatus ==1) {
	header(location:'index_back.php');
}
else {
	header(location:'index_visitor.php');
}
*/
    
     
    /**
     * On fait le lien entre l'url et les méthodes qui vont faire le traitement
     * et l'affichage
     * TODO v2 : faire un explode plutôt qu'un GET
     */
 
     
      
 
    /*if (!empty($_GET['controller']) && !empty($_GET['method'])  ) {
        $controller = (filter_var(ucfirst($_GET['controller']),FILTER_SANITIZE_STRING));
        $method = (filter_var($_GET['method'],FILTER_SANITIZE_STRING));
    
        /**
        * Array des controllers valides
        */
 /*
        $controllerArray = ['VisiteurController',
                            'MembreController',
                            'BackController'];
        
        /**
        * Array des méthodes valides
        */
       /*
        $methodArray = ['back'=>[
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
                            'displayCgv',
                            'displayConnexion',
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
        
        /**
        * On teste si le controller et l'array font partie des arrays correspondants
        */
        /*
        if ((in_array($controller, $controllerArray))&&
            ((in_array($method, $methodArray['back']))
                ||(in_array($method, $methodArray['membre'])) 
                ||(in_array($method, $methodArray['visiteur'])) 
            )
           ) {
         */
            //$path = __DIR__ . '\..\src\controller\\' . $controller . '.php';
            //include $path;
            //on ajoute le namespace (controller)
           // $namespace = '\controller\\';
           // $controllerNamespace  = $namespace. $controller ;
            //echo $controllerNamespace;

            //On instancie dynamiquement la classe correspondante
           
         // $obj = new $controllerNamespace; // $myController = new MyController()

          //call_user_func( array( $obj, $_GET['method'] ) ); // $myController->myMethod()
    
               
       
       
          
   // }//END if(!empty(GET))
   