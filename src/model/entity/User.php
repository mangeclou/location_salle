<?php
/**
 * 
 * La classe abstract User est la classe mère de Member et Admin.
 * Tous les setters sanitize les données
 */
namespace entity; // toujours le même nom que le dossier, pour que l'autoload puisse trouver le fichier
abstract class User {

/**
 * 
 * @var int
 * @access protected
 */
protected  $id_membre;

/**
 * 
 * @var string
 * @access protected
 */
protected  $pseudo;

/**
 * 
 * @var string
 * @access protected
 */
protected  $mdp;

/**
 * Droit : admin = 1; membre = 0
 * @var integer
 * @access protected
 */
protected  $statut;

//----------- GETTERS -----------------
    public function getIdMembre()
    {
        return $this->id_membre;
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getMdp()
    {
        return $this->mdp;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    
    //--------- SETTERS ------------------
    /*
    public function setIdSalle($arg)
    {
        if ()
        $this->idEmploye = $arg;
    }
    */
    public function setPseudo($pseudo)
    {
        /**
        * Filtre des inputs de formulaire.
        * On teste si l'input est non vide et si c'est un string bien formatté
        * 
        */
        if((filter_has_var(INPUT_POST, $pseudo))&&(filter_input(INPUT_POST, $pseudo, FILTER_SANITIZE_STRING)) === true) {
        $this->pseudo = $pseudo;
        }
    }
    
    public function setMdp($mdp)
    {
        /**
        * Filtre des inputs de formulaire.
        * On teste si l'input est non vide et si c'est un string bien formatté
        * 
        */
        if (filter_has_var(INPUT_POST, $mdp)){
            if (((filter_input(INPUT_POST, $mdp, FILTER_SANITIZE_STRING)) === true)
                && (strlen(filter_input(INPUT_POST, $mdp, FILTER_SANITIZE_STRING)) >= 8)) {
        
            $this->mdp = $mdp;
            }
        }
    }
    
    public function setStatut($statut)
    {
        /**
        * Filtre des inputs de formulaire.
        * On teste si l'input est non vide et si c'est un string bien formatté
        * 
        */
        $statutArray = array (0, 1, 2);
        
        if(filter_has_var(INPUT_POST, $statut)) {
            if ((filter_input(INPUT_POST, $pseudo, FILTER_SANITIZE_NUMBER_INT) === true) 
            && ( in_array($statut, $statutArray))) {
                $this->pseudo = $pseudo;
            }
        }
    }
            
    public function isConnected($user)
{
	if($_SESSION['connected'] == true)
	{
		return true;
	}
}
}
?>