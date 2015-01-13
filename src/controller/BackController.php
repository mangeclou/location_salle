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

class BackController extends MainController
{
    //default layout of the pages
    protected $layout = 'layout.php';
    
    //liste des templates et des paramètres pour chaque page
    protected $envoiNewsletterTemplate = 'envoi_newsletter.php';
    protected $envoiNewsletterParameters;
    
    protected $gestionAvisTemplate = 'gestion_avis.php';
    protected $gestionAvisParameters;
    
    protected $gestionCommandeTemplate = 'gestion_commande.php';
    protected $gestionCommandeParameters;
    
    protected $gestionMembreTemplate = 'gestion_membre.php';
    protected $gestionMembreParameters;
    
    protected $gestionProduitTemplate = 'gestion_produit.php';
    protected $gestionProduitParameters;

    protected $gestionPromoTemplate = 'gestion_promo.php';
    protected $gestionPromoParameters;
         
    protected $gestionSalleTemplate = 'gestion_salle.php';
    protected $gestionSalleParameters;
    
    protected $indexBackTemplate = 'index_back.php';
    protected $indexBackParameters;
    
    protected $panierBackTemplate = 'panier_back.php';
    protected $panierBackParameters;
    
    protected $profilBackTemplate = 'profil_back.php';
    protected $profilBackParameters;
    
    protected $rechercheBackTemplate = 'recherche_back.php';
    protected $rechercheBackParameters;
    
    protected $reservationBackTemplate = 'reservation_back.php';
    protected $reservationBackParameters;
    
    protected $statistiqueTemplate = 'statistique.php';
    protected $statistiqueParameters;
    
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
       //on require le fichier de config de la view
       require __DIR__ . '/../views/viewParameters.php';
       //on va chercher les paramètres dans l'array viewpageParameters
       $this->envoiNewsletterParameters = $viewPageParameters['back']['envoi_newsletter'];
       //on utilise la méthode render du parent Controller pour afficher la page
       return $this->render($this->layout, $this->envoiNewsletterTemplate, $this->envoiNewsletterParameters); 
    }
    
    public function displayGestionAvis() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->gestionAvisParameters = $viewPageParameters['back']['gestion_avis'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->gestionAvisTemplate, $this->gestionAvisParameters);  
    }
    
    public function displayGestionCommande() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->gestionCommandeParameters = $viewPageParameters['back']['gestion_commande'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->gestionCommandeTemplate, $this->gestionCommandeParameters);  
    }
    
    public function displayGestionMembre() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->gestionMembreParameters = $viewPageParameters['back']['gestion_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->gestionMembreTemplate, $this->gestionMembreParameters);  
    }
    
    public function displayGestionProduit() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->gestionProduitParameters = $viewPageParameters['back']['gestion_produit'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->gestionProduitTemplate, $this->gestionProduitParameters);  
    }
    
    public function displayGestionPromo() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->gestionPromoParameters = $viewPageParameters['back']['gestion_promo'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->gestionPromoTemplate, $this->gestionPromoParameters);  
    } 
    
    public function displayGestionSalle() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->gestionSalleParameters = $viewPageParameters['back']['gestion_salle'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->gestionSalleTemplate, $this->gestionSalleParameters);  
    }
    
    public function displayIndexBack() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->indexBackParameters = $viewPageParameters['back']['index_back'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->indexBackTemplate, $this->indexBackParameters);  
    }
    
    public function displayPanierBack() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->panierBackParameters = $viewPageParameters['back']['panier_back'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->panierBackTemplate, $this->panierBackParameters);  
    }
    
    public function displayProfilBack() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->profilBackParameters = $viewPageParameters['back']['profil_back'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->profilBackTemplate, $this->profilBackParameters);  
    }
    
    public function displayRechercheBack() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->rechercheBackParameters = $viewPageParameters['back']['recherche_back'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->rechercheBackTemplate, $this->rechercheBackParameters);  
    }
    
    public function displayReservationBack() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->reservationBackParameters = $viewPageParameters['back']['reservation_back'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->reservationBackTemplate, $this->reservationBackParameters);  
    }
    
    public function displayStatistique() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->statistiqueParameters = $viewPageParameters['back']['statistique'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->statistiqueTemplate, $this->statistiqueParameters);  
    }
                
}