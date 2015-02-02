<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Yoann
 */
namespace controller; // toujours le même nom que le dossier, pour que l'autoload puisse trouver le fichier

class Controller {
	protected $table;
        //public $test = "ok";
//-----------------------
	public function __construct() {}
//-----------------------
	public function getRepository($table)
	{
		$class = 'Repository\\' . $table . 'Repository'; // Repository\EmployesRepository
		if(!isset($this->table))
		{
                    $this->table = new $class; // j'instancie la classe EmployesRepository
		}
		return $this->table; // je retourne la classe Employes
	}
	
	public function render($layout, $template, $parameters = array())
	{
            $dirViews = __DIR__ . '/../views'; // je récupère le chemin vers le dossier qui contient les vues propres à mon application (layout.php et employes.php)
            $dirFileTemp = lcfirst(get_called_class()) ;
        
        //On passe du nom de la classe au nom du dossier
        $pattern = "/controller/";
        preg_match($pattern, $dirFileTemp,  $arrayDir);
        //print_r($arrayDir);
        $trans = array($arrayDir[0] => "", "\\" => "","Controller" =>"");
        $newDir = strtr ($dirFileTemp, $trans );
        //echo '<br>' .$newDir;
        
        //On appelle le chemin du template correspondant
		$__template__ = $dirViews . '/' . $newDir . '/' . $template; // chemin pour aller au bon endroit du template 
		// echo $__template__;
		$__layout__ = $dirViews . '/' . $layout; // chemin pour aller au bon endroit du Layout
        //echo $__template__ . '<br>';
		//echo $__layout__ . '<br>';
		
		//extract() transforme l'array parameters en variables que l'on peut utiliser
                extract($parameters, EXTR_SKIP); // EXTR_SKIP me permet de ne pas écraser une variable qui porterait le même nom qu'une des variables générées par extract 
		
		ob_start();
		// A partir de maintenant tout ce qui se trouve entre ob_start et ob_get_clean sera temporisé (càad non envoyé au navigateur)
		require $__template__; // je prend tout ce qu'il y a dans la page template
		
		$content = ob_get_clean(); // je le stock dans $content 
		
		ob_start();
		require $__layout__; // Je retrouve $content DANS layout, DONC je récupère son contenu (employes.php) 
		
		return ob_end_flush(); // je retourne tout ce qu'il y a dans la mémoire tampon et je ferme la temporisation (càd, je ressort le $content (=employes.php) + layout.php)
	}
        
        //autoload function permet d'inclure les classes quand elles sont instantiées
        /*
        public function __autoload($class_name) {
            include "$class_name.php";
        }
        */
        /*
        static function filterControllerAndMethod($controller,$method)
        {
            if (!empty($controller) && !empty($method)) {
                $controller = (filter_var(ucfirst($_GET['controller']),FILTER_SANITIZE_STRING));
                $method = (filter_var($_GET['method'],FILTER_SANITIZE_STRING));
            }
        }
        
        static function checkValidityControllerAndMethod($controller,$method)
        {
            if (in_array($controller, $controllerArray))&&
            ((in_array($method, $methodArray['back']))
                ||(in_array($method, $methodArray['membre'])) 
                ||(in_array($method, $methodArray['visiteur'])) 
        }
        
        
        static function dynamicInstantiateAndCall($class,$method)
        {
            if (!empty($class) && !empty($method)) {
                $class = (filter_var(ucfirst($class),FILTER_SANITIZE_STRING));
                $method = (filter_var($method,FILTER_SANITIZE_STRING));
    
                               
                 //on ajoute le namespace (controller)
                //$namespace = '\controller\\';
                //$controllerNamespace  = $namespace. $controller ;
                //echo $controllerNamespace;

                //On instancie dynamiquement la classe correspondante
           
                $obj = new $class; // $myController = new MyController()

                call_user_func( array( $obj, $method) ); // $myController->myMethod()
            }
        } 
        */
}
      