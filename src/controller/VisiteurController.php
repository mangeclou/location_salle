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

//VisiteurController hérite de Controller pour pouvoir utiliser la méthode render()
class VisiteurController extends MainController
{
    //default layout of the pages
    protected $layout = 'layout.php';
     
    //liste des templates et des paramètres pour chaque page
    protected $cgvTemplate = 'cgv.php';
    protected $cgvParameters;
       
    protected $connexionTemplate = 'connexion.php';
    protected $connexionParameters;
    
    protected $indexTemplate = 'index_visiteur.php';
    protected $indexParameters;    
    
    protected $inscriptionTemplate = 'inscription.php';
    protected $inscriptionParameters;
    
    protected $mdpperduTemplate = 'mdpperdu.php';
    protected $mdpperduParameters;

    protected $mentionTemplate = 'mention.php';
    protected $mentionParameters;
    
    protected $planTemplate = 'plan.php';
    protected $planParameters;
    
    protected $rechercheTemplate = 'recherche.php';
    protected $rechercheParameters;
    
    protected $reservationTemplate = 'reservation.php';
    protected $reservationParameters;
    
    protected $reservationDetailTemplate = 'reservation_detail.php';
    protected $reservationdetailParameters;

    //GETTERS
       
    /*
   public function __construct()

    {
        echo "instantiation réussie.";
        
    }
    
     * 
     */
    
    /**
    * Controlleur qui détermine la logique et les conditions pour les pages affichées par un visiteur
    *
    * @param $layout : the default layout of a page
    * @param $template : the html template of this page
    * @param $parameters : an array of some parameters
    */
         
    /**
     * Va chercher les paramètres de cgv depuis l'array de viewParameters.php
     */
    
    public function displayCgv() 
    {
        //on utilise la méthode render du parent Controller
        require __DIR__ . '/../views/viewParameters.php';
        $this->cgvParameters = $viewPageParameters['visiteur']['cgv'];
        return $this->render($this->layout, $this->cgvTemplate, $this->cgvParameters);  
    }
          
    public function displayConnexion()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->connexionParameters = $viewPageParameters['visiteur']['connexion']; 
        return $this->render($this->layout, $this->connexionTemplate, $this->connexionParameters);  
    }
    
    public function displayIndex()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->indexParameters = $viewPageParameters['visiteur']['index_visiteur']; 
        return $this->render($this->layout, $this->indexTemplate, $this->indexParameters);  
    }
        
    public function displayInscription()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->inscriptionParameters = $viewPageParameters['visiteur']['inscription'];
        return $this->render($this->layout, $this->inscriptionTemplate, $this->inscriptionParameters);  
    }
    //continuer
    public function displayMdpperdu()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->mdpperduParameters = $viewPageParameters['visiteur']['mdpperdu'];
        return $this->render($this->layout, $this->mdpperduTemplate, $this->mdpperduParameters);  
    }
    
    public function displayMention()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->mentionParameters = $viewPageParameters['visiteur']['mention'];
        return $this->render($this->layout, $this->mentionTemplate, $this->mentionParameters);  
    } 
    
    public function displayPlan()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->planParameters = $viewPageParameters['visiteur']['plan'];
        return $this->render($this->layout, $this->planTemplate, $this->planParameters);  
    }
    
    public function displayRecherche()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->rechercheParameters = $viewPageParameters['visiteur']['recherche'];
        return $this->render($this->layout, $this->rechercheTemplate, $this->rechercheParameters);  
    }
    
    public function displayReservation()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->reservationParameters = $viewPageParameters['visiteur']['reservation'];
        return $this->render($this->layout, $this->reservationTemplate, $this->reservationParameters);  
    }
        
    public function displayReservationdetail()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->reservationDetailParameters = $viewPageParameters['visiteur']['inscription'];
        return $this->render($this->layout, $this->reservationDetailTemplate, $this->reservationdetailParameters);  
    }
        
}