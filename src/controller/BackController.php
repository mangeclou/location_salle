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

class BackController extends MainController
{
    //default layout of the pages
    protected $layout = 'layout.php';
    
    //liste des templates et des paramètres pour chaque page
    protected $envoiNewsletterTemplate = 'envoi_newsletter.php';
    protected $envoiNewsletterParameters = array();
    
    protected $gestionAvisTemplate = 'gestion_avis.php';
    protected $gestionAvisParameters = array();
    
    protected $gestionCommandeTemplate = 'gestion_commande.php';
    protected $gestionCommandeParameters = array();
    
    protected $gestionMembreTemplate = 'gestion_membre.php';
    protected $gestionMembreParameters = array();
    
    protected $gestionProduitTemplate = 'gestion_produit.php';
    protected $gestionProduitParameters = array();

    protected $gestionPromoTemplate = 'gestion_promo.php';
    protected $gestionPromoParameters = array();
    
    protected $gestionSalleTemplate = 'gestion_salle.php';
    protected $gestionSalleParameters = array();
    
    protected $indexBackTemplate = 'index_back.php';
    protected $indexBackParameters = array();
    
    protected $statistiqueTemplate = 'statistique.php';
    protected $statistiqueParameters = array();
    
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
    public function displayEnvoiNewsletter() 
    {
        //on utilise la méthode render du parent Controller
      return $this->render($this->layout, $this->envoiNewsletterTemplate, $this->envoiNewsletterParameters);  
    }
    
    public function displayGestionAvis() 
    {
        //
       return $this->render($this->layout, $this->gestionAvisTemplate, $this->gestionAvisParameters);  
    }
    
    public function displayGestionCommande() 
    {
        
        return $this->render($this->layout, $this->gestionCommandeTemplate, $this->gestionCommandeParameters);  
    }
    
    public function displayGestionMembre() 
    {
        //
       return $this->render($this->layout, $this->gestionMembreTemplate, $this->gestionMembreParameters);  
    }
    
    public function displayGestionProduit() 
    {
        //
       return $this->render($this->layout, $this->gestionProduitTemplate, $this->gestionProduitParameters);  
    }
    
    public function displayGestionPromo() 
    {
        //
       return $this->render($this->layout, $this->gestionPromoTemplate, $this->gestionPromoParameters);  
    } 
    
    public function displayGestionSalle() 
    {
        //
       return $this->render($this->layout, $this->gestionSalleTemplate, $this->gestionSalleParameters);  
    }
    
    public function displayIndexBack() 
    {
        //
       return $this->render($this->layout, $this->indexBackTemplate, $this->indexBackParameters);  
    }
    
    public function displayStatistique() 
    {
        //
      return $this->render($this->layout, $this->statistiqueTemplate, $this->statistiqueParameters);  
    }
                
}