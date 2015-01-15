<?php
// 	Un repository centralise tout ce qui touche à la récupération de vos entités. Concrètement donc, vous ne devez pas faire la moindre requête SQL ailleurs que dans un repository, c'est la règle. 
// Entity Repository ne connait pas "employes" ou autre, il connait que des entités. cela doit rester généric afin que cela soit ré-utilisable.
namespace repository;
//require_once(__DIR__ . '/../autoload.php'); // le retirer à la fin des tests
use controller\PDOManager; // nous avons besoin de PDOManager car en utilisant ce namespace, nous aurons accès à tout ce qui est static de Manager/PDOManager. //  USE déclenche l'autoload pour que la classe soit chargée et ainsi éviter une erreur.

class EntityRepository
{
    private $db;
    public function __construct(){}
//-------
    public function getDb()
    {
        if(!$this->db)
		{
            $this->db = PDOManager::getInstance()->getPdo(); // getInstance est retourne un objet, on peux donc remettre une fléche pour appeler une méthode. Ceci déclenche aussi l'autoload car c'est une instance
        }
        return $this->db;
    }
//-------
    private function getTableName()
    {
		 // echo get_called_class() . '<br />'; // Dire à la fin : éxecuté ds findAll (fichier actuel), qui est éxecuté ds getAllEmploye (EmployeRepository), qui est éxecuté ds getRepository('Employe') (dans EmployeController), qui est éxécuté dans employeDisplay (dans EmployeController)
		  //return 'employe'; // permet de faire les tests pendant la construction avant de revenir ici plus tard pour le faire dynamiquement.
		 // echo strtolower(str_replace(array('Backoffice\\','Repository\\', 'Repository'), '', get_called_class()));
        return strtolower(str_replace(array('Backoffice\\','Repository\\', 'Repository'), '', get_called_class())); // je veux retirer Repository\\ et repository de Repository\EmployeRepository pour garder seulement Employe.
    }
//-------
    public function findAll() // permet d'aller chercher toutes les informations sur un employe - c'est à ce moment là que PDO est instancié!
    {
        $q = $this->getDb()->query('SELECT * FROM ' . $this->getTableName()); // FROM employe
		// echo PDO::FETCH_PROPS_LATE;
		// echo PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE;
		// echo $this->getEntityClass();

        $r = $q->fetchAll(\PDO::FETCH_CLASS, 'Entity\\' . $this->getTableName()); // on récupère un tableau array composé d'objets. FETCH_CLASS fais une instanciation de Employe, en remplissant les propriétés qui correspondent aux noms des champs SQL. (c'est pourquoi il faut avoir la même ortographe entre les propriétés et les noms SQL). Il rempli tous meme les private et protected.
        // Pour chaque ligne SQL il instancie un objet. Donc il déclenche aussi l'autoload..
        if(!$r) { // si la query ne fonctionne pas
            return false;
        }
        else { // sinon, on retourne les résultats
            return $r;
        }
    }
//-------
    public function find($id)
    {
        $q = $this->getDb()->query('SELECT * FROM ' . $this->getTableName() . ' WHERE id' . ucfirst($this->getTableName()) . '= ' . (int) $id); // id'Employe' le premier champ est toujours le nom de la table. Caster en int permet d'éviter des erreurs de requete sql.
        $r = $q->fetchAll(\PDO::FETCH_CLASS, 'Entity\\' . $this->getTableName());

        if(!$r) {
            return false;
        }
        else {
            // return $q->fetch(PDO::FETCH_ASSOC);
            return $r;
        }
    }
//-------
	public function register()
	{
		// echo implode(',',array_keys($_POST)) . '<hr />' ;
		// echo  "'" . implode("','", $_POST) . "'";
		$q = $this->getDb()->query('INSERT INTO '. $this->getTableName() . '(' . implode(',',array_keys($_POST)) . ') VALUES (' . "'" . implode("','", $_POST) . "'" . ')'); // array_keys me permet de parcourrir les indices plutot que les valeur pour annoncer les champs.
		return $this->getDb()->lastInsertId(); // dernier identifiant généré
	}
}


//$o = new EntityRepository();
//var_dump($o->findAll());




/**********
        // $q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Entity\\' . $this->getEntityClass()); 
		// $q->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		/* Sans l'option PDO::FETCH_PROPS_LATE, on peut constater que l'ordre est le suivant : initialisation des propriétés de l'objet puis appel du constructeur alors qu'avec, c'est le contraire (appel du constructeur puis initialisation des variables).
		
		Quand tu fais FETCH_CLASS, tu n'as pas besoin de passer tes arguments au constructeur... Tu peux quand même en passer en spécifiant un tableau d'argument à utiliser dans le troisième argument de setFetchMode(), mais avec FETCH_CLASS, les variables sont remplies quels que soient leur visibilité (private, protected, etc...).
		Si la variable n'existe pas, alors elle est créé automatiquement avec une visibilité publique. 

		$stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,
                           'classname', 
                            <array of parameter names(in order) used in constructor>);
							
			$utils->setFetchMode(PDO::FETCH_INTO, new Utilisateur);
			Le fonctionnement de PDO::FETCH_INTO est totalement différent. Son but n'est pas de créer un objet pour chaque résultat mais de n'en utiliser qu'un, qui est mis à jour pour chaque résultat.
			
			http://www.julp.fr/articles/2-4-exploitation-des-donnees-de-requetes-select.html
********/
		