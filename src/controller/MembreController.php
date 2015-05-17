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

require '/../service/Admin/SalleService.php';
require 'Controller.php';
require '/../model/repository/ProduitRepository.php';
require_once '/../model/repository/SalleRepository.php';

use \repository\ProduitRepository AS ProduitRepository;
use \repository\SalleRepository AS SalleRepository;
use \service\UserService AS UserService;
use controller\Controller AS MainController;

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
    
    protected $displayReservationDetailMembreTemplate = 'reservation_detail_membre.php';
    protected $displayReservationDetailMembreParameters;
    
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
      //redirige toujours
        session_start();
        if (!isset($_SESSION["email"])) {
            header('location:index.php?controller=VisiteurController&method=displayIndex');
        }
        //echo $_SESSION["email"];
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
   
    /**
     * [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function displayIndexMembre()
    {
     
        $pr         = new ProduitRepository();
        $allProduits = $pr->getAllAvailableProduit();
        $sr          = new SalleRepository();  
        foreach ($allProduits as $key => $produit) {
            $salles[$key]["salles"]  = $sr->findSalleById($produit['id_salle']); 
        }
        //$salle       = $sr->findSalleById();
            
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
         
        $viewPageParameters['membre']['index_membre']['meta'] = $allProduits;
        $viewPageParameters['membre']['index_membre']["salles"] = $salles;
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->indexMembreParameters = $viewPageParameters['membre']['index_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout,
                             $this->indexMembreTemplate,
                             $this->indexMembreParameters);      
    }
    
    public function displayMdpperduMembre()
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->mdpperduMembreParameters = $viewPageParameters['membre']['mdpperdu_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout,
                             $this->mdpperduMembreTemplate,
                             $this->mdpperduMembreParameters);  
    }
    
    public function displayMentionMembre() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->mentionMembreParameters = $viewPageParameters['membre']['mention_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, 
                             $this->mentionMembreTemplate,
                             $this->mentionMembreParameters);  
    }
    
    public function displayNewsletterInscription() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->newsletterInscriptionParameters = $viewPageParameters['membre']['newsletter'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout,
                             $this->newsletterInscriptionTemplate,
                             $this->newsletterInscriptionParameters);  
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
        return $this->render($this->layout,
                             $this->planMembreTemplate,
                             $this->planMembreParameters);    
    }
    
    public function displayProfilMembre() 
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->profilMembreParameters = $viewPageParameters['membre']['profil_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout,
                             $this->profilMembreTemplate,
                             $this->profilMembreParameters);  
    }
    
    public function displayRechercheMembre()
    {
       //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->rechercheMembreParameters = $viewPageParameters['membre']['recherche_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout,
                             $this->rechercheMembreTemplate,
                             $this->rechercheMembreParameters);  
    }
    
    public function displayReservationMembre()
    {
        $pr          = new ProduitRepository();
        $allProduits = $pr->getAllAvailableProduit();
        $sr          = new SalleRepository();  
        foreach ($allProduits as $key => $produit) {
            $salles[$key]["salles"]  = $sr->findSalleById($produit['id_salle']); 
        }
        //$salle       = $sr->findSalleById();
            
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
         
        $viewPageParameters['membre']['reservation_membre']['meta'] = $allProduits;
        $viewPageParameters['membre']['reservation_membre']["salles"] = $salles;
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->reservationMembreParameters = $viewPageParameters['membre']['reservation_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout,
                             $this->reservationMembreTemplate,
                             $this->reservationMembreParameters);  
    }
    
    public function displayReservationDetailMembre() 
    {
        $pr          = new ProduitRepository();
        //$produit = $pr->getAllAvailableProduit();
        $sr          = new SalleRepository();  
        $produit = $pr->findProduitById($_GET["id"]);
        $salle = $sr->findSalleById($produit['id_salle']); 
       
        //$salle       = $sr->findSalleById();
            
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
         
        $viewPageParameters['membre']['reservation_detail_membre']['meta'] = $produit;
        $viewPageParameters['membre']['reservation_detail_membre']["salle"] = $salle;
        //on va chercher les paramètres dans l'array viewpageParameters
         $this->displayReservationDetailMembreParameters = $viewPageParameters['membre']['reservation_detail_membre'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout,
                             $this->displayReservationDetailMembreTemplate,
                             $this->displayReservationDetailMembreParameters);
      
    }
    
    public function deconnectMembre() 
    {
        $us = new UserService;
        $us->deconnect();
        header('location:index.php?controller=VisiteurController&method=displayIndex');
    }
            
}