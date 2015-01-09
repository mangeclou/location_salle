<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controlleur qui détermine la logique et les conditions pour les pages affichées par un visiteur
 *
 * @author stagiaire
 */
namespace controller; // toujours le même nom que le dossier, pour que l'autoload puisse trouver le fichier
include 'Controller.php';
USE controller\Controller AS MainController;

class MembreController extends MainController
{
    //default layout of the pages
    protected $layout = 'layout.php';
    
    //liste des templates et des paramètres pour chaque page
    
    protected $contactTemplate = 'contact.php';
    protected $contactParameters = array();
    
    protected $indexMembreTemplate = 'index_membre.php';
    protected $indexMembreParameters = array();

    protected $newsletterInscriptionTemplate = 'newsletter.php';
    protected $newsletterInscriptionParameters = array();

    protected $panierTemplate = 'panier.php';
    protected $panierParameters = array();
    
    protected $profilTemplate = 'profil.php';
    protected $profilParameters = array();
    
    

    /*
    public function __construct() 
    {
        echo "instantiation réussie.";
        
    }*/
    
    
    /**
    * Controlleur qui détermine la logique et les conditions pour les pages affichées par un visiteur
    *
    * @param $layout : the default layout of a page
    * @param $template : the html template of this page
    * @param $parameters : an array of some parameters
    */
    public function displayContact() 
    {
        //on utilise la méthode render du parent Controller pour afficher la page
       return $this->render($this->layout, $this->contactTemplate, $this->contactParameters);  
    }
    
    public function displayIndexMembre() 
    {
        //
       return $this->render($this->layout, $this->indexMembreTemplate, $this->indexMembreParameters);  
    }
    
    public function displayNewsletterInscription() 
    {
        
        return $this->render($this->layout, $this->newsletterInscriptionTemplate, $this->newsletterInscriptionParameters);  
    }
    
    public function displayPanier() 
    {
        //
       return $this->render($this->layout, $this->panierTemplate, $this->panierParameters);  
    }
    
    public function displayProfil() 
    {
        //
       return $this->render($this->layout, $this->profilTemplate, $this->profilParameters);  
    }
            
}