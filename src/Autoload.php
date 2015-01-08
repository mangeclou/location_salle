<?php
class Autoload
{
    public static $nb = 0; // permet de compter le nbre de fois où l'on passe dans l'autoload 
    public static function className($className)
    {
        echo '<pre>' . self::$nb . ' - Autoload : ' . $className;
        $check = explode('\\', $className); // me permet de créer un tableau Array de ce qui est passé en paramètres ($className)
        var_dump($check);
        if($check[0] == 'backoffice')
            $path = __DIR__ . '\..\backoffice\\' . $className . '.php'; // si la classe contient BackOffice, je vais faire un require sur le dossier src
        else
            $path = __DIR__ . '\\' . $className . '.php'; // sinon je vais faire un require direct (donc dans le dossier Vendor)
        
        echo "\n => $path</pre><hr>";
        
        require $path;        
        self::$nb++;
    }
}
spl_autoload_register(array('Autoload', 'className')); 
// $u = new Employe\Nom_De_LaClasse;