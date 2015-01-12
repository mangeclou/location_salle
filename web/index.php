<?php
/**
*This page redirects to index_visitor.php, index_member.php, index_back.php according to the status of the visitor
*
*
*/
 require_once '/inc/visiteur/head.inc.php';

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
    require_once '/inc/visiteur/header.inc.php';
    //require_once '/inc/body.inc.php';
    
    /**
     * On fait le lien entre l'url et les méthodes qui vont faire le traitement
     * et l'affichage
     */
     $url = explode("/", $_SERVER['REQUEST_URI']);
     echo '<hr>';
     print_r( $url);
    //if (!empty($_GET['controller']) && !empty($_GET['method'])  ) {
     if (!empty($url)) {
         
       $url = trim($url);
         
        //$controller = (filter_var(ucfirst($_GET['controller']),FILTER_SANITIZE_STRING));
        $controllerArray = ['VisiteurController','MembreController','BackController'];

        if (in_array($controller, $controllerArray)) {
            $path = __DIR__ . '\..\src\controller\\' . $controller . '.php';
            include $path;
            //on ajoute le namespace (controller)
            $namespace = '\controller\\';
            $controllerNamespace  = $namespace. $controller ;
            echo $controllerNamespace;
            
            //On instantie dynamiquement la classe correspondante
            $obj = new $controllerNamespace; // $myController = new MyController()
            
            call_user_func( array( $obj, $_GET['method'] ) ); // $myController->myMethod()
        } else {
            echo 'erreur 404';
        }
    }
    
       require_once '/inc/visiteur/footer.inc.php';