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

require 'Controller.php';
require "/../model/repository/MembreRepository.php";
    //permet d'utiliser les méthodes du trait ValidatorController
require 'ValidatorController.php';


use controller\Controller;

//VisiteurController hérite de Controller pour pouvoir utiliser la méthode render()
class VisiteurController extends Controller
{

    
    //default layout of the pages
    protected $layout = 'layout.php';
     
    //liste des templates et des paramètres pour chaque page
    protected $cgvTemplate = 'cgv.php';
    protected $cgvParameters;
       
    protected $connexionTemplate = 'connexion.php';
    protected $connexionParameters;
    
    protected $contactTemplate = 'contact.php';
    protected $contactParameters;
    
    protected $indexTemplate = 'index_visiteur.php';
    protected $indexParameters;    
    
    protected $inscriptionTemplate = 'inscription.php';
    protected $inscriptionParameters;
    
    protected $mdpperduTemplate = 'mdpperdu.php';
    protected $mdpperduParameters;

    protected $mentionTemplate = 'mention.php';
    protected $mentionParameters;
    
    protected $newsletterInscriptionVisiteurTemplate = 'newsletter_inscription_visiteur.php';
    protected $newsletterInscriptionVisiteurParameters;
    
    protected $panierTemplate = 'panier.php';
    protected $panierParameters;
    
    protected $planTemplate = 'plan.php';
    protected $planParameters;
    
    protected $rechercheTemplate = 'recherche.php';
    protected $rechercheParameters;
    
    protected $reservationTemplate = 'reservation.php';
    protected $reservationParameters;
    
    protected $reservationDetailTemplate = 'reservation_detail.php';
    protected $reservationDetailParameters;

    //GETTERS
       
       
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
    
    public function displayContact()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->contactParameters = $viewPageParameters['visiteur']['contact']; 
        return $this->render($this->layout, $this->contactTemplate, $this->contactParameters);  
    }
    
    public function displayIndex()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->indexParameters = $viewPageParameters['visiteur']['index_visiteur']; 
        return $this->render($this->layout, $this->indexTemplate, $this->indexParameters);  
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
    
    public function displayNewsletterInscriptionVisiteur()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->newsletterInscriptionVisiteurParameters = $viewPageParameters['visiteur']['newsletter_inscription_visiteur'];
        return $this->render($this->layout, $this->newsletterInscriptionVisiteurTemplate, $this->newsletterInscriptionVisiteurParameters);  
    } 
    
    public function displayPanier()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->panierParameters = $viewPageParameters['visiteur']['panier'];
        return $this->render($this->layout, $this->panierTemplate, $this->panierParameters);  
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
        $this->reservationDetailParameters = $viewPageParameters['visiteur']['reservation_detail'];
        return $this->render($this->layout, $this->reservationDetailTemplate, $this->reservationDetailParameters);  
    }
    
    public function creerMembre()
    {
        //TODO : tester que le visiteur n'est pas un membre connecté, si c'est le cas faire
        //un header("location:#") vers l'accueil membre
        if(isset($_SESSION)){
            //on redirige vers la page d'accueil pour les membres
            header("location:index.php?controller=MembreController&method=displayIndexMembre");
        }  else {
            
        //Si le formulaire n'a pas été soumis
        if ((!filter_has_var(INPUT_POST, 'pseudo')) &&
            (!filter_has_var(INPUT_POST, 'mdp')) &&
            (!filter_has_var(INPUT_POST, 'nom')) &&
            (!filter_has_var(INPUT_POST, 'prenom')) &&
            (!filter_has_var(INPUT_POST, 'email')) &&
            (!filter_has_var(INPUT_POST, 'ville')) &&
            (!filter_has_var(INPUT_POST, 'cp')) &&
            (!filter_has_var(INPUT_POST, 'adresse'))
                
               ){
            echo 'premier if';
            //On affiche le formulaire d'inscription
            //Si le visiteur n'est pas connecté, j'affiche le formulaire d'inscription
            require __DIR__ . '/../views/viewParameters.php';
            $this->inscriptionParameters = $viewPageParameters['visiteur']['inscription'];
            $this->render($this->layout, $this->inscriptionTemplate, $this->inscriptionParameters);
            //return $this->render($this->layout, $this->inscriptionTemplate, $this->inscriptionParameters);
        } else {
            
		//filtrer les données	
            //$pseudo = trim(htmlentities($_POST['pseudo'], ENT_QUOTES));
            //array_filter($_POST, 'trim_value');  
           
            //ensuite tester si le pseudo existe déjà dans la base avec findMembreByPseudo()
            $obj = new \repository\MembreRepository();
            $obj ->findMembreByPseudo($_POST['pseudo']);
            //Si la méthode findMembreByPseudo a retourné true (le pseudo existe déja)
            if ($obj === true){
                $arrayErrors[] = 'Veuillez choisir un autre pseudo.';
            }else{
            //TODO : faire un filterValidator qui filtre le $_Post et qui
            //retourne un array de données qui seront ensuite validées par isFormValid
            if (!ValidatorController::isFormValid($_POST)){
                
            
            
                   
            
            //on récupère $arrayErrors qui est retourné par les méthodes de la classe
            //ValidatorController et on affiche le formulaire avec les données de message
            //d'erreur
           
                require __DIR__ . '/../views/viewParameters.php';
                $this->inscriptionParameters = $viewPageParameters['visiteur']['inscription'];
                $this->render($this->layout, $this->inscriptionTemplate, array(
                'arrayErrors' => $arrayErrors
                )); 
            } else {

                      echo 'else';  
                //On appelle la méthdoe getRepository avec comme argument le nom de la table (Membre)
                $futurMembre = new \repository\EntityRepository();
                $futurMembre = parent::getRepository('Membre'); // on envoi le nom de la table : employe, et bref on récupère un objet "EmployeRepository" mais on ne le met pas dans une propriété de la classe.
			//on appelle la méthode registerMembre de MembreRepository
                        //cette méthode appelle la méthode register de EntityRepository
                        //Résultat : insertion du nouveau membre dans la BDD
                        $idMembre = $futurMembre->registerMembre();
                        
                                                
			//$lemploye = $employe->getFindEmploye($idEmploye); // on récupère tous les employes via une req sql et il s'agit d'un tableau ARRAY composé d'objet.
			// var_dump($lemploye);
			
			
                        session_start();
                        $_SESSION['pseudo'] = $_POST['pseudo'];                     
                        $_SESSION['email'] = $_POST['email'];
                        
                        header("location:index.php?controller=MembreController&method=displayIndexMembre");
                        
			
            }
            //
            //récupérer avec un $_POST les données du formulaire d'inscription
        }//END if $arrayErrors est vide (donc aucune erreur)
		// render : permet de rendre un affichage
        //connexion à la bdd
       
        
        /*$connexion = connexionBDD();
    $sql = "INSERT INTO utilisateur (id_utilisateur,pseudo,mdp) VALUES (NULL,:pseudo, :mdp)";
    $insertion_utilisateur = $connexion->prepare($sql);
    $insertion_utilisateur->execute(array(':pseudo'=>$pseudo,
                      ':mdp'=>$mdp));
    return $insertion_utilisateur;
         * 
         */
            }//END if $_POST n'est pas vide
        
       
        }//END if !isset $_SESSION
    }//END creerMembre()
    
    public function connexion()
    {
        if(isset($_SESSION)){
            //on redirige vers la page d'accueil pour les membres
            header("location:index.php?controller=MembreController&method=displayIndexMembre");
        }  else {
            //On teste si le $_POST contient quelque chose, si oui, on teste dans la bdd si
            //le couple pseudo / mdp existe, si oui on affiche la page indexMembre
        }
    }
    
    
}//END VisiteurController
