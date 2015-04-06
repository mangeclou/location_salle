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
    protected  $idMembre;

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
    public function setPseudo($pseudo)
    {
        /**
        * Filtre des inputs de formulaire.
        * On teste si l'input est non vide et si c'est un string bien formatté
        * 
        */
         if(is_string($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }
    
    public function setMdp($mdp)
    {
         if(is_string($mdp)) {
            $this->mdp = $mdp;
        }
    }
    
    public function setStatut($statut)
    {
         if(is_int($statut)) {
            $this->statut = $statut;
        }
    }
            
    public function isConnected($user)
    {
        if($_SESSION['connected'] == true)
        {
            return true;
        }  else {
            return false;
        }
    }
}