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
    protected $cgvMembreTemplate = 'cgv_membre.php';
    protected $cgvMembreParameters;
    
    protected $contactTemplate = 'contact_membre.php';
    protected $contactParameters;
    
    protected $indexMembreTemplate = 'index_membre.php';
    protected $indexMembreParameters;
    
    protected $mdpperduMembreTemplate = 'mdpperdu_membre.php';
    protected $mdpperduMembreParameters;
    
    protected $mentionMembreTemplate = 'mention_membre.php';
    protected $mentionMembreParameters;

    protected $newsletterInscriptionTemplate = 'newsletter.php';
    protected $newsletterInscriptionParameters;

    protected $panierMembreTemplate = 'panier_membre.php';
    protected $panierMembreParameters;
    
    protected $planMembreTemplate = 'plan_membre.php';
    protected $planMembreParameters;
       
    protected $profilMembreTemplate = 'profil_membre.php';
    protected $profilMembreParameters;
    
    protected $rechercheMembreTemplate = 'recherche_membre.php';
    protected $rechercheMembreParameters;
    
    protected $reservationDetailMembreTemplate = 'reservation_detail_membre.php';
    protected $reservationDetailMembreParameters;
    
    protected $reservationMembreTemplate = 'reservation_membre.php';
    protected $reservationMembreParameters;
            
        /*
    public function __construct() 
    {
        echo "instantiation réussie.";
        
    }*/
    
    /**
     * A l'instantiation de la classe on vérifie si la session existe, si elle
     * n'existe pas on redirige vers l'accueil pour les visiteurs
     */
    public function __construct() {
       if(!isset($_SESSION)){
           header('location:index.php?controller=VisiteurController&method=displayIndex');
       }
    }
    
    
    
    /**
    * Controlleur qui détermine la logique et les conditions pour les pages affichées par un visiteur
    *
    * @param $layout : the default layout of a page
    * @param $template : the html template of this page
    * @param $parameters : an array of some parameters
    */
    public function displayCgvMembre() 
    {
              
       //on require le fichier de config de la view
       require __DIR__ . '/../views/viewParameters.php';
       //on va chercher les paramètres dans l'array viewpageParameters
       $this->cgvParameters = $viewPageParameters['back']['cgv_membre'];
       //on utilise la méthode render du parent Controller pour afficher la page
       return $this->render($this->layout, $this->cgvMembreTemplate, $this->cgvMembreParameters); 
    }
    
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
    
    public function displayMdpperduMembre() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->mdpperduMembreParameters = $viewPageParameters['membre']['mdpperdu_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->mdpperduMembreTemplate, $this->mdpperduMembreParameters);  
    }
    
    public function displayMentionMembre() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->mentionMembreParameters = $viewPageParameters['membre']['mention_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->mentionMembreTemplate, $this->mentionMembreParameters);  
    }
    
    public function displayNewsletterInscription() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->newsletterInscriptionParameters = $viewPageParameters['membre']['newsletter'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->newsletterInscriptionTemplate, $this->newsletterInscriptionParameters);  
    }
    
    public function displayPanierMembre() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->panierMembreParameters = $viewPageParameters['membre']['panier_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->panierMembreTemplate, $this->panierMembreParameters);    
    }
    
    public function displayPlanMembre() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->planMembreParameters = $viewPageParameters['membre']['plan_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->planMembreTemplate, $this->planMembreParameters);    
    }
    
    public function displayProfilMembre() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->profilMembreParameters = $viewPageParameters['membre']['profil_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->profilMembreTemplate, $this->profilMembreParameters);  
    }
    
    public function displayRechercheMembre() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->rechercheMembreParameters = $viewPageParameters['membre']['recherche_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->rechercheMembreTemplate, $this->rechercheMembreParameters);  
    }
    
    public function displayReservationMembre() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->reservationMembreParameters = $viewPageParameters['membre']['reservation_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->reservationMembreTemplate, $this->reservationMembreParameters);  
    }
    
    public function displayReservationDetailMembre() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->reservationDetailMembreParameters = $viewPageParameters['membre']['reservation_detail_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->reservationDetailMembreTemplate, $this->reservationDetailMembreParameters);  
    }
    
    public function deconnexion() 
    {
        session_destroy();
        header('location:index.php?controller=VisiteurController&method=displayIndex');
    }
            
}