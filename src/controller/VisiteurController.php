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
    protected $cgvParameters = array();
    
    protected $connexionTemplate = 'connexion.php';
    protected $connexionParameters = array();
    
    protected $indexTemplate = 'index_visiteur.php';
    protected $indexParameters = array();
    
    protected $inscriptionTemplate = 'inscription.php';
    protected $inscriptionParameters = array();
    
    protected $mdpperduTemplate = 'mdpperdu.php';
    protected $mdpperduParameters = array();

    protected $mentionTemplate = 'mention.php';
    protected $mentionParameters = array();
    
    protected $planTemplate = 'plan.php';
    protected $planParameters = array();
    
    protected $rechercheTemplate = 'recherche.php';
    protected $rechercheParameters = array();
    
    protected $reservationTemplate = 'reservation.php';
    protected $reservationParameters = array();
    
    protected $reservationDetailTemplate = 'reservation_detail.php';
    protected $reservationdetailParameters = array();


    
    
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
    public function displayCgv() 
    {
        //on utilise la méthode render du parent Controller
        return $this->render($this->layout, $this->cgvTemplate, $this->cgvParameters);  
    }
    
    public function displayConnexion() 
    {
        //
       return $this->render($this->layout, $this->connexionTemplate, $this->connexionParameters);  
    }
    
    public function displayIndex() 
    {
        
        return $this->render($this->layout, $this->indexTemplate, $this->indexParameters);  
    }
    
    public function displayInscription() 
    {
        //
       return $this->render($this->layout, $this->inscriptionTemplate, $this->inscriptionParameters);  
    }
    
    public function displayMdpperdu() 
    {
        //
       return $this->render($this->layout, $this->mdpperduTemplate, $this->mdpperduParameters);  
    }
    
    public function displayMention() 
    {
        //
       return $this->render($this->layout, $this->mentionTemplate, $this->mentionParameters);  
    } 
    
    public function displayPlan() 
    {
        //
       return $this->render($this->layout, $this->planTemplate, $this->planParameters);  
    }
    
    public function displayRecherche() 
    {
        //
       return $this->render($this->layout, $this->rechercheTemplate, $this->rechercheParameters);  
    }
    
    public function displayReservation() 
    {
        //
       return $this->render($this->layout, $this->reservationTemplate, $this->reservationParameters);  
    }
        
    public function displayReservationdetail() 
    {
        //
       return $this->render($this->layout, $this->reservationDetailTemplate, $this->reservationdetailParameters);  
    }
        
}