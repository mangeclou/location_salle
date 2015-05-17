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
namespace controller;

require 'Controller.php';
require '/../model/repository/BackRepository.php';
require '/../service/Admin/UserAdminService.php';
require '/../service/MembreService.php';
require '/../model/repository/ProduitRepository.php';
require '/../model/repository/SalleRepository.php';

use \repository\ProduitRepository AS ProduitRepository;
use \repository\SalleRepository AS SalleRepository;
use \service\MembreService AS MembreService;
use \service\Admin\UserAdminService AS UAService;
use \model\repository\BackRepository AS BackRepository;

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
    
    protected $connexionBackTemplate = 'connexion_back.php';
    protected $connexionBackParameters;
    
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
    
    protected $displayReservationDetailTemplate = 'reservation_detail.php';
    protected $displayReservationDetailParameters;

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
          
/*    public function displayConnexion()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->connexionParameters = $viewPageParameters['visiteur']['connexion']; 
        return $this->render($this->layout, $this->connexionTemplate, $this->connexionParameters);  
    }*/
    
    public function displayContact()
    {
        require __DIR__ . '/../views/viewParameters.php';
        $this->contactParameters = $viewPageParameters['visiteur']['contact']; 
        return $this->render($this->layout, $this->contactTemplate, $this->contactParameters);  
    }
    
    public function displayIndex()
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
         
        $viewPageParameters['visiteur']['index_visiteur']['meta'] = $allProduits;
        $viewPageParameters['visiteur']['index_visiteur']["salles"] = $salles;
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->indexParameters = $viewPageParameters['visiteur']['index_visiteur'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->indexTemplate, $this->indexParameters);
    }
        
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
        $pr          = new ProduitRepository();
        $allProduits = $pr->getAllAvailableProduit();
        $sr          = new SalleRepository();  
        foreach ($allProduits as $key => $produit) {
            $salles[$key]["salles"]  = $sr->findSalleById($produit['id_salle']); 
        }
        //$salle       = $sr->findSalleById();
            
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
         
        $viewPageParameters['visiteur']['reservation']['meta'] = $allProduits;
        $viewPageParameters['visiteur']['reservation']["salles"] = $salles;
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->reservationParameters = $viewPageParameters['visiteur']['reservation'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->reservationTemplate, $this->reservationParameters); 
    }
        
    public function displayReservationdetail()
    {
        $pr          = new ProduitRepository();
        //$produit = $pr->getAllAvailableProduit();
        $sr          = new SalleRepository();  
        $produit = $pr->findProduitById($_GET["id"]);
        $salle = $sr->findSalleById($produit['id_salle']); 
       
        //$salle       = $sr->findSalleById();
            
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
         
        $viewPageParameters['visiteur']['reservation_detail']['meta'] = $produit;
        $viewPageParameters['visiteur']['reservation_detail']["salle"] = $salle;
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->displayReservationDetailParameters = $viewPageParameters['visiteur']['reservation_detail'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout,
                             $this->displayReservationDetailTemplate,
                             $this->displayReservationDetailParameters);
    }
    
    /**
     * Fonction qui crée un membre dans la base
     */
    public function creerMembre()
    {
        if (filter_has_var(INPUT_POST, 'pseudo') &&
            filter_has_var(INPUT_POST, 'mdp')    &&
            filter_has_var(INPUT_POST, 'nom')    &&
            filter_has_var(INPUT_POST, 'prenom') &&
            filter_has_var(INPUT_POST, 'email')  &&
            filter_has_var(INPUT_POST, 'ville')  &&
            filter_has_var(INPUT_POST, 'cp')     &&
            filter_has_var(INPUT_POST, 'adresse')) {
            
            $ms = new MembreService();
            $ms->createMembre();
            if (isset($arrayErrors)) {
            
            //on récupère $arrayErrors qui est retourné par les méthodes de la classe
            //ValidatorController et on affiche le formulaire avec les données de message
            //d'erreur
                require __DIR__ . '/../views/viewParameters.php';
                $this->inscriptionParameters = $viewPageParameters['visiteur']['inscription'];
                $this->render($this->layout,
                              $this->inscriptionTemplate, array(
                                'arrayErrors' => $arrayErrors,
                              )
                        );  
            } 
            
        } else {
            require __DIR__ . '/../views/viewParameters.php';
            $this->inscriptionParameters = $viewPageParameters['visiteur']['inscription'];
            $this->render($this->layout, $this->inscriptionTemplate, $this->inscriptionParameters);
        }
        
        /*require __DIR__ . '/../views/viewParameters.php';
            $this->inscriptionParameters = $viewPageParameters['visiteur']['inscription'];
            $this->render($this->layout, $this->inscriptionTemplate, $this->inscriptionParameters);*/
        
        
              
    }
        //TODO : tester que le visiteur n'est pas un membre connecté, si c'est le cas faire
        //un header("location:#") vers l'accueil membre
        /*if(isset($_SESSION)){
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
            
            $pseudo  = \controller\FilterController::filterPostString('pseudo');
            $mdp     = \repository\MembreRepository::hashMdp(FilterController::filterPostString('mdp'));
            $nom     = \controller\FilterController::filterPostString('nom');
            $prenom  = \controller\FilterController::filterPostString('prenom');
            $email   = \controller\FilterController::filterPostEmail('email');
            $sexe    = \controller\FilterController::filterPostString('sexe');
            $ville   = \controller\FilterController::filterPostString('ville');
            $cp      = \controller\FilterController::filterPostString('cp');
            $adresse = \controller\FilterController::filterPostString('adresse');
             
            $filteredMember = [
                "pseudo"  => $pseudo,
                "mdp"     => $mdp,
                "nom"     => $nom,
                "prenom"  => $prenom,
                "email"   => $email,
                "sexe"    => $sexe,
                "ville"   => $ville,
                "cp"      => $cp,
                "adresse" => $adresse,
                "statut"  => 0,
            ];
            
            //ensuite tester si le pseudo existe déjà dans la base avec findMembreByPseudo()
            $obj = new \repository\MembreRepository();
            $obj ->findMembreByPseudo($pseudo);
            //Si la méthode findMembreByPseudo a retourné true (le pseudo existe déja)
            if ($obj === true){
                $arrayErrors[] = 'Veuillez choisir un autre pseudo.';
            } else {
            //If the pseudo doesn't exist
                if (!ValidatorController::isFormValid($filteredMember)){
            //on récupère $arrayErrors qui est retourné par les méthodes de la classe
            //ValidatorController et on affiche le formulaire avec les données de message
            //d'erreur
                require __DIR__ . '/../views/viewParameters.php';
                $this->inscriptionParameters = $viewPageParameters['visiteur']['inscription'];
                $this->render($this->layout,
                              $this->inscriptionTemplate, array(
                                'arrayErrors' => $arrayErrors,
                              )
                        ); 
            } else {
              //Si le formulaire passe la validation
              //echo 'else';  
              //On appelle la méthdoe getRepository avec comme argument le nom de la table (Membre)
              $futurMembre = new \repository\EntityRepository();
              $futurMembre = parent::getRepository('Membre');
              $idMembre = $futurMembre->registerMembre($filteredMember);
                
			//$lemploye = $employe->getFindEmploye($idEmploye); // on récupère tous les employes via une req sql et il s'agit d'un tableau ARRAY composé d'objet.
			// var_dump($lemploye);
			  session_start();
              $_SESSION['pseudo'] = $pseudo;                     
              $_SESSION['email'] = $email;
              
            //  header("location:index.php?controller=MembreController&method=displayIndexMembre");*/
           // }
        //récupérer avec un $_POST les données du formulaire d'inscription
        //}//END if $arrayErrors est vide (donc aucune erreur)
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
            //}//END if $_POST n'est pas vide
        
       
        //}//END if !isset $_SESSION
    //}//END creerMembre()
    
    /**
     * Connexion function for members of the site
     */
    public function connexion()
    {
        //si la session est définie, donc si l'utilisateur est déjà connecté
        //TODO : ajouter une autre condition ?
        if (filter_has_var(INPUT_POST, 'pseudo') &&
            filter_has_var(INPUT_POST, 'mdp') ) {
            //Instantiates the service class to use connexion method 
            $ms = new MembreService();
            $ms->connexionMembre("MembreController",
                                        "displayIndexMembre"                   
                                       );
        } else {
        //If nothing has been posted, the connexion form is displayed
            require __DIR__ . '/../views/viewParameters.php';
            $this->connexionParameters = $viewPageParameters['visiteur']['connexion']; 
            $this->render($this->layout, $this->connexionTemplate, $this->connexionParameters);  
        }
/*        if(isset($_SESSION)){
            //on redirige vers la page d'accueil pour les membres
            UrlService::redirect("MembreController", "displayIndexMembre");
        //If the user is not already connected as a member
        } else {
            //On teste si le $_POST contient quelque chose,
            //Si le formulaire n'a pas été soumis
            if ((filter_has_var(INPUT_POST, 'pseudo')) &&
                (filter_has_var(INPUT_POST, 'mdp'))){
                //  si oui, on teste dans la bdd si
                //le couple pseudo / mdp existe, si oui on affiche la page indexMembre
               //methode du service
      
          //mdp du post
          $mdpForm    = FilterService::filterPostString('mdp');
          $pseudo     = \controller\FilterController::filterPostString('pseudo');
          //Comparaison entre le mdp fourni et le mdp en base
          $testMembre = new \repository\MembreRepository();
          //$testMembre = parent::getRepository('Membre');
          
          
          //print_r(get_class($testMembre));
          //$pseudo = trim(filter_has_var(INPUT_POST, 'pseudo'));
          //$hashedMdp = trim(filter_has_var(password_hash(INPUT_POST, 'pseudo'), PASSWORD_DEFAULT));
          //on récupère le pseudo correspondant au pseudo entré en post
          //$testMembre->findMembreByPseudo($pseudo); 
          
          //on appelle la méthode findMembreMdp
          
          $newMembre = $testMembre->findMembrePseudoAndMdp($pseudo);
          //echo 'newMembre';
          //var_dump($newMembre);
          if ($newMembre) { // si on obtient un résultat 
            //$membre = $newMembre->fetch(PDO::FETCH_ASSOC);
            //cf PHP Cookbook p552
            //echo $newMembre['mdp'];
            //echo $mdpForm;
            //$hash = '$2y$10$fmkazv66zFEvpyARwlbRuugRI';
            //le password_verify retourne faux :/
            if (password_verify($mdpForm, $newMembre['mdp'])) {
              // $msg .= "<div class='bg-success' height='30' style='padding: 10px'><p>Mdp Ok !</p></div>";
              //foreach ($membre as $indice=>$valeur) {
              session_start();
              $_SESSION["logged"] = true;
              $_SESSION["mail"]   = $newMembre['email'];
              $_SESSION["pseudo"] = $newMembre['pseudo'];
              header("location:index.php?controller=MembreController&method=displayIndexMembre");
              //echo 'bravo';
            } else {
              echo ("Mauvais mot de passe ou pseudo 1");
            }
         
          //END if !$_POST
            //Si non, on
          } else {
            echo ("Mauvais mot de passe ou pseudo 2");      
          }
        
      }*///===========================
        
    
    }//END function connexion
    
     /**
     * Connexion function for admins of the site
     */
    public function connexionAdmin()
    {
        //si la session est définie, donc si l'utilisateur est déjà connecté
        //TODO : ajouter une autre condition ?
        if (filter_has_var(INPUT_POST, 'pseudo') &&
                filter_has_var(INPUT_POST, 'mdp')) {
            
            $uas = new UAService();
            $uas->connexionAdmin("BackController",
                                        "displayIndexBack"                   
                                       );
        } else {
        //If nothing has been posted, the connexion form is displayed
            echo "no post";
            require __DIR__ . '/../views/viewParameters.php';
            $this->connexionBackParameters = $viewPageParameters['visiteur']['connexion_back']; 
            $this->render($this->layout, $this->connexionBackTemplate, $this->connexionBackParameters);  
        }
    }//END function connexionAdmin
}//END Class VisiteurController