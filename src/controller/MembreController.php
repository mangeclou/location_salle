<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controlleur qui détermine la logique et les conditions pour les pages affichées par un visiteur
 *
 * @author yoann
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
    protected $contactParameters;
    
    protected $indexMembreTemplate = 'index_membre.php';
    protected $indexMembreParameters;

    protected $newsletterInscriptionTemplate = 'newsletter.php';
    protected $newsletterInscriptionParameters;

    protected $panierTemplate = 'panier.php';
    protected $panierParameters;
    
    protected $profilTemplate = 'profil.php';
    protected $profilParameters;
    
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
       //on require le fichier de config de la view
       require __DIR__ . '/../views/viewParameters.php';
       //on va chercher les paramètres dans l'array viewpageParameters
       $this->contactParameters = $viewPageParameters['membre']['contact'];
       //on utilise la méthode render du parent Controller pour afficher la page
       return $this->render($this->layout, $this->contactTemplate, $this->contactParameters);  
    }
    
    public function displayIndexMembre() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->indexMembreParameters = $viewPageParameters['membre']['index_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->indexMembreTemplate, $this->indexMembreParameters);  
    }
    
    public function displayNewsletterInscription() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->newsletterInscriptionParameters = $viewPageParameters['membre']['newsletter'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->newsletterInscriptionTemplate, $this->indexMembreParameters);  
    }
    
    public function displayPanier() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->panierParameters = $viewPageParameters['membre']['panier'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->panierTemplate, $this->panierParameters);    
    }
    
    public function displayProfil() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->profilParameters = $viewPageParameters['membre']['profil'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->profilTemplate, $this->profilParameters);  
    }
            
}