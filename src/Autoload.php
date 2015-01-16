<?php

/*
class Autoload
{
    public static $nb = 0; // permet de compter le nbre de fois où l'on passe dans l'autoload 
    public static function className($className)
    {
       if(class_exists($className)){
        echo '<pre>' . self::$nb . ' - Autoload : ' . $className;
        $check = explode('\\', $className); // me permet de créer un tableau Array de ce qui est passé en paramètres ($className)
        var_dump($check);
        //à corriger -> on va tout le temps dans le dossier controller\
           $path = __DIR__ . '\\'  . $className . '.php'; // sinon je vais faire un require direct (donc dans le dossier Vendor)
        
        echo "\n => $path</pre><hr>";
        
        require $path;        
        self::$nb++;
        } else {
           echo 
            "<br>La classe " .$className ." n'existe pas."; 
        }
        
    }
}
spl_autoload_register(array('Autoload', 'className')); 
// $u = new Employe\Nom_De_LaClasse;
*/