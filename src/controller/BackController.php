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
use controller\Controller AS MainController;

class BackController extends MainController
{
    //default layout of the pages
    protected $layout = 'layout.php';
    
    //liste des templates et des paramètres pour chaque page
    protected $cgvBackTemplate = 'cgv_back.php';
    protected $cgvBackParameters;
    
    protected $contactBackTemplate = 'contact_back.php';
    protected $contactBackParameters;
    
    protected $createNewAdminTemplate = 'create_new_admin.php';
    protected $createNewAdminParameters;
        
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
    
    protected $mdpperduBackTemplate = 'index_back.php';
    protected $mdpperduBackParameters;
    
    protected $mentionBackTemplate = 'mention_back.php';
    protected $mentionBackParameters;
    
    protected $newsletterInscriptionBackTemplate = 'newsletter_inscription_back.php';
    protected $newsletterInscriptionBackParameters;
    
    protected $panierBackTemplate = 'panier_back.php';
    protected $panierBackParameters;
    
    protected $planBackTemplate = 'plan_back.php';
    protected $planBackParameters;
    
    protected $profilBackTemplate = 'profil_back.php';
    protected $profilBackParameters;
    
    protected $rechercheBackTemplate = 'recherche_back.php';
    protected $rechercheBackParameters;
    
    protected $reservationBackTemplate = 'reservation_back.php';
    protected $reservationBackParameters;
    
    protected $reservationDetailBackTemplate = 'reservation_detail_back.php';
    protected $reservationDetailBackParameters;
    
    protected $statistiqueTemplate = 'statistique.php';
    protected $statistiqueParameters;
    
     /**
     * Connexion function for admin of the site
     */
    public function connexionAdmin()
    {
        //si la session est définie, donc si l'utilisateur est déjà connecté
      if(isset($_SESSION)){
        //on redirige vers la page d'accueil pour les membres
        header("location:index.php?controller=MembreController&method=displayIndexMembre");
      } else {
            //On teste si le $_POST contient quelque chose,
            //Si le formulaire n'a pas été soumis
        if ((!filter_has_var(INPUT_POST, 'pseudo')) &&
            (!filter_has_var(INPUT_POST, 'mdp'))){
                //  si oui, on teste dans la bdd si
                //le couple pseudo / mdp existe, si oui on affiche la page indexMembre
                require __DIR__ . '/../views/viewParameters.php';
                $this->connexionParameters = $viewPageParameters['visiteur']['connexion']; 
                $this->render($this->layout, $this->connexionTemplate, $this->connexionParameters);  
        } else {
          //mdp du post
          $mdpForm     = FilterController::filterPostString('mdp');
          $pseudo  = \controller\FilterController::filterPostString('pseudo');
          //Comparaison entre le mdp fourni et le mdp en base
          $testMembre = new \repository\MembreRepository();
          //on appelle la méthode findMembreMdp
          
          $newMembre = $testMembre->findMembrePseudoAndMdp($pseudo);
        
          if ($newMembre) { // si on obtient un résultat 
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
        }
      }//===========================

    }//END function connexion  
    
  
    /**
     * A l'instantiation de la classe on vérifie si la session existe, si elle
     * n'existe pas on redirige vers l'accueil pour les visiteurs
     */
    public function __construct() {
      //Checker si c'est nécessaire de faire un session_start à l'instanciation
        session_start();
        if (!isset($_SESSION["email"])) {
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
    public function displayCgvBack() 
    {
       //on require le fichier de config de la view
       require __DIR__ . '/../views/viewParameters.php';
       //on va chercher les paramètres dans l'array viewpageParameters
       $this->cgvParameters = $viewPageParameters['back']['cgv_back'];
       //on utilise la méthode render du parent Controller pour afficher la page
       return $this->render($this->layout, $this->cgvBackTemplate, $this->cgvBackParameters); 
    }
    /**
     * [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function displayContact() 
    {
       //on require le fichier de config de la view
       require __DIR__ . '/../views/viewParameters.php';
       //on va chercher les paramètres dans l'array viewpageParameters
       $this->contactBackParameters = $viewPageParameters['back']['contact_back'];
       //on utilise la méthode render du parent Controller pour afficher la page
       return $this->render($this->layout, $this->contactBackTemplateBack, $this->contactBackParameters); 
    }
    
    public function displayCreateNewAdmin() 
    {
       //on require le fichier de config de la view
       require __DIR__ . '/../views/viewParameters.php';
       //on va chercher les paramètres dans l'array viewpageParameters
       $this->createNewAdminParameters = $viewPageParameters['back']['create_new_admin'];
       //on utilise la méthode render du parent Controller pour afficher la page
       return $this->render($this->layout, $this->createNewAdminTemplate, $this->createNewAdminParameters); 
    }
    
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
            
    public function displayMdpperduBack() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->mdpperduBackParameters = $viewPageParameters['membre']['mdpperdu_back'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->mdpperduBackTemplate, $this->mdpperduBackParameters);  
    }
    
    public function displayMentionBack() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->mentionBackParameters = $viewPageParameters['back']['mention_back'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->mentionBackTemplate, $this->mentionBackParameters);  
    }
    
    public function displayNewsletterInscriptionBack() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->newsletterInscriptionBackParameters = $viewPageParameters['membre']['newsletter_inscription_back'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->newsletterInscriptionBackTemplate, $this->newsletterInscriptionBackParameters);  
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
    
    public function displayPlanBack() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->planBackParameters = $viewPageParameters['back']['plan_back'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->planBackTemplate, $this->planBackParameters);  
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
    
    public function displayReservationDetailBack() 
    {
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->reservationDetailBackParameters = $viewPageParameters['back']['reservation_detail_back'];
        //on utilise la méthode render du parent Controller pour afficher la page
        return $this->render($this->layout, $this->reservationDetailBackTemplate, $this->reservationDetailBackParameters);  
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