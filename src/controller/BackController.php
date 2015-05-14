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

require 'Controller.php';
require '/../model/repository/BackRepository.php';
require '/../model/repository/SalleRepository.php';
require '/../model/repository/PromotionRepository.php';
require '/../model/repository/ProduitRepository.php';
require '/../service/Admin/UserAdminService.php';
require '/../service/Admin/SalleService.php';
require '/../service/Admin/ProduitService.php';
//require '/../service/UserService.php';

use \service\UserService AS UserService;
use \service\Admin\UserAdminService AS UAService;
use \service\Admin\SalleService AS SalleService;
use \service\Admin\ProduitService AS ProduitService;
use \model\repository\BackRepository AS BackRepository;
use \repository\SalleRepository AS SalleRepository;
use \repository\ProduitRepository AS ProduitRepository;
use \repository\PromotionRepository AS PromotionRepository;
use \controller\Controller AS MainController;

class BackController extends MainController
{
    //default layout of the pages
    protected $layout = 'layout.php';
    
    //liste des templates et des paramètres pour chaque page
    protected $addProduitTemplate = 'add_produit.php';
    protected $addProduitParameters;
    
    protected $editProduitTemplate = 'edit_produit.php';
    protected $editProduitParameters;
    
    protected $addSalleTemplate = 'add_salle.php';
    protected $addSalleParameters;
    
    protected $cgvBackTemplate = 'cgv_back.php';
    protected $cgvBackParameters;
    
    protected $contactBackTemplate = 'contact_back.php';
    protected $contactBackParameters;
    
    protected $createNewAdminTemplate = 'create_new_admin.php';
    protected $createNewAdminParameters;
        
    protected $editSalleTemplate = 'edit_salle.php';
    protected $editSalleParameters;
    
    protected $envoiNewsletterTemplate = 'envoi_newsletter.php';
    protected $envoiNewsletterParameters;
    
    protected $gestionAvisTemplate = 'gestion_avis.php';
    protected $gestionAvisParameters;
    
    protected $gestionCommandeTemplate = 'gestion_commande.php';
    protected $gestionCommandeParameters;
    
    protected $gestionMembreTemplate = 'gestion_membre.php';
    protected $gestionMembreParameters;
    
    protected $displayProduitTemplate = 'display_produit.php';
    protected $displayProduitParameters;

    protected $gestionPromoTemplate = 'gestion_promo.php';
    protected $gestionPromoParameters;
         
    protected $gestionSalleTemplate = 'gestion_salle.php';
    protected $gestionSalleParameters;
    
    protected $indexBackTemplate = 'index_back.php';
    protected $indexBackParameters;
    
    protected $displaySalleTemplate = 'display_salle.php';
    protected $displaySalleParameters;
    
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
     * A l'instantiation de la classe on vérifie si la session existe, si elle
     * n'existe pas on redirige vers l'accueil pour les visiteurs
     * 
     * /!\ PB car la méthode connexion ne peut pas fonctionner
     */
    public function __construct() {
        session_start();
        if (!(isset($_SESSION["email"]) && isset($_SESSION["admin"]))) {
            header('location:index.php?controller=VisiteurController&method=displayIndex');
        }
       //print_r($_SESSION);
    }
    
    /** Checks if the form has been posted
     * @param  $array with the name of all the elements of the form
     * @return true if the post has been posted
     * @return false if the post has not been posted
     */
    public static function verifyPost($array)
    {
        //array_walk($array, self::checkPost($array));
        foreach ($array as $value) {
            if (!filter_has_var(INPUT_POST, $value))
            {
                return false;
            }
        }
        return true;
    }
        
    /**
     * Check if all the fields of the form contain something
     * TODO : add to the Services
     * @return boolean true if full, false if at least one empty field
     */
    public static function verifyPostSalle()
    {
        if (filter_has_var(INPUT_POST, 'pays')        &&
            filter_has_var(INPUT_POST, 'ville')       &&
            filter_has_var(INPUT_POST, 'adresse')     &&
            filter_has_var(INPUT_POST, 'cp')          &&
            filter_has_var(INPUT_POST, 'titre')       &&
            filter_has_var(INPUT_POST, 'description') &&
            //filter_has_var(INPUT_POST, 'photo')       &&
            filter_has_var(INPUT_POST, 'capacite')    &&
            filter_has_var(INPUT_POST, 'categorie')
           ) {
            return true;
        } else {
            return false;
        }
       
    }
    
    /**
     * Check if there is at least one error in the salle form
     * TODO : add to the Services
     * @param  [[Type]] $salle [[Description]]
     * @return boolean  true if there is at least one error, false if no error
     */
    public static function verifyErrorSalle($salle)
    {
        if ($salle["errorPays"] !== true        ||
            $salle["errorVille"] !== true       ||  
            $salle["errorAdresse"] !== true     ||
            $salle["errorCp"] !== true          ||
            $salle["errorTitre"] !== true       ||
            $salle["errorDescription"] !== true ||
            //$salle["errorPhoto"] !== true       ||
            $salle["errorCapacite"] !== true 
           ) {
            return true;
        } else {
            return false;
        }
    }
    
    /*==============================================================================*/
    /*     ----------------                              -----------------          */
    /*     ----------------          PRODUIT             -----------------          */
    /*     ----------------                              -----------------          */
    /*==============================================================================*/
    
    
    /**
     * Check if there is at least one error in the salle form
     * TODO : add to the Services
     * @param  [[Type]] $salle [[Description]]
     * @return boolean  true if there is at least one error, false if no error
     */
    public static function verifyErrorProduit($produit)
    {
        if ($produit["errorSalle"] !== true        ||
            $produit["errorDateArrivee"] !== true       ||  
            $produit["errorDateDepart"] !== true     ||
            $produit["errorPrix"] !== true          ||
            $produit["errorPromotion"] !== true           
           ) {
            return true;
        } else {
            return false;
        }
    }
    
    public function displayProduit()
    {
        $sr = new ProduitRepository();
        $allProduits = $sr->getAllProduit();
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        
        $viewPageParameters['back']['display_produit']['meta'] = $allProduits;
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->displayProduitParameters = $viewPageParameters['back']['display_produit'];
        //on utilise la méthode render du parent Controller pour afficher la page
        
        return $this->render($this->layout, $this->displayProduitTemplate, $this->displayProduitParameters); 
    }
    
    public function addNewProduit()
    {
        //If there is something in the POST
        $produit = array("date_arrivee",
                         "date_depart",
                         "id_salle",
                         "id_promo",
                         "prix",
                         );
        if (self::verifyPost($produit)) {
            echo 'coucou';
            $ps      = new ProduitService();
            $produit = $ps->addProduitService();
            //If there is at least one error in the form
            if (self::verifyErrorProduit($produit)) {
            //on récupère $arrayErrors qui est retourné par les méthodes de la classe
            //ValidatorController et on affiche le formulaire avec les données de message
            //d'erreur
                require __DIR__ . '/../views/viewParameters.php';
                $viewPageParameters['back']['add_new_produit']['meta']['errors'] = $produit;
                $this->addProduitParameters = $viewPageParameters['back']['add_new_produit'];
                $this->render($this->layout,
                              $this->addProduitTemplate,
                              $this->addProduitParameters
                        );  
            } 
        //If there is nothing in the POST, the form is displayed
        } else {
            $sr        = new SalleRepository();
            $allSalles = $sr->getAllSalle();
            $pr        = new PromotionRepository();
            $allPromos = $pr->getAllPromotion();
            
            require __DIR__ . '/../views/viewParameters.php';
               
            $viewPageParameters['back']['add_new_produit']['meta']['salles'] = $allSalles;          
            $viewPageParameters['back']['add_new_produit']['meta']['promos'] = $allPromos;          
            
            //on va chercher les paramètres dans l'array viewpageParameters
            $this->addProduitParameters = $viewPageParameters['back']['add_new_produit'];
            //on utilise la méthode render du parent Controller pour afficher la page
            
            $this->addProduitParameters = $viewPageParameters['back']['add_new_produit'];
            $this->render($this->layout,
                          $this->addProduitTemplate,
                          $this->addProduitParameters);
        }
    }
    
     /**
     * Edit an existing Produit
     */
    public function editProduit() 
    {
         //If there is something in the POST
        $produit = array("date_arrivee",
                         "date_depart",
                         "id_salle",
                         "id_promo",
                         "prix",
                         "etat");
        if (self::verifyPost($produit)) {

            $ps = new ProduitService();
            $produit = $ps->editProduitService();
            
            //If there is at least one error in the form
            if (self::verifyErrorProduit($produit)) {
                //on récupère $arrayErrors qui est retourné par les méthodes de la classe
                //ValidatorController et on affiche le formulaire avec les données de message
                //d'erreur
                echo 'erreurs';
                require __DIR__ . '/../views/viewParameters.php';
                
                $viewPageParameters['back']['edit_produit']['meta']['errors'] = $produit;
                $this->editProduitParameters = $viewPageParameters['back']['edit_produit'];
                $this->render($this->layout,
                              $this->editProduitTemplate,
                              $this->editProduitParameters
                        );  
            } 
            
        } else {
            $pr = new ProduitRepository();
            $editProduit = $pr->findProduitById($_GET["id"]);
            
            require __DIR__ . '/../views/viewParameters.php';
            
            $viewPageParameters['back']['edit_produit']['meta'] = $editProduit;
           
            $this->editProduitParameters = $viewPageParameters['back']['edit_produit'];
            $this->render($this->layout,
                          $this->editProduitTemplate,
                          $this->editProduitParameters);
        }
        
        /*require __DIR__ . '/../views/viewParameters.php';
            $this->inscriptionParameters = $viewPageParameters['visiteur']['inscription'];
            $this->render($this->layout, $this->inscriptionTemplate, $this->inscriptionParameters);*/
    }
    
    /**
     * Delete an existing salle
     */
    public function deleteProduit() 
    {
        $ps = new ProduitService();
        
        $idProduit = (int)filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        $ps->deleteProduitService($idProduit);
        //The id of the salle to be edited is taken from the $_GET
    }
    
    /*==============================================================================*/
    /*     ----------------                              -----------------          */
    /*     ----------------            SALLE             -----------------          */
    /*     ----------------                              -----------------          */
    /*==============================================================================*/
    
    
    /**
     * Adds a new salle
     */
    public function addNewSalle() 
    {
        //If there is something in the POST
        if (self::verifyPostSalle()) {
            $ss = new SalleService();
            $salle = $ss->addSalleService();
            //If there is at least one error in the form
            if (self::verifyErrorSalle($salle)) {
            
            //on récupère $arrayErrors qui est retourné par les méthodes de la classe
            //ValidatorController et on affiche le formulaire avec les données de message
            //d'erreur
                require __DIR__ . '/../views/viewParameters.php';
                $viewPageParameters['back']['add_new_salle']['meta']['errors'] = $salle;
                $this->addSalleParameters = $viewPageParameters['back']['add_new_salle'];
                $this->render($this->layout,
                              $this->addSalleTemplate,
                              $this->addSalleParameters
                        );  
            } 
        //If there is nothing in the POST, the form is displayed
        } else {
            require __DIR__ . '/../views/viewParameters.php';
            $this->addSalleParameters = $viewPageParameters['back']['add_new_salle'];
            $this->render($this->layout,
                          $this->addSalleTemplate,
                          $this->addSalleParameters);
        }
    }
    
    /**
     * Edit an existing salle
     */
    public function editSalle() 
    {
        if (self::verifyPostSalle() === true) {

            $ss = new SalleService();
            $salle = $ss->editSalleService();
            
            //If there is at least one error in the form
            if (self::verifyErrorSalle($salle)) {
                //on récupère $arrayErrors qui est retourné par les méthodes de la classe
                //ValidatorController et on affiche le formulaire avec les données de message
                //d'erreur
                echo 'erreurs';
                require __DIR__ . '/../views/viewParameters.php';
                
                $viewPageParameters['back']['edit_salle']['meta']['errors'] = $salle;
                $this->editSalleParameters = $viewPageParameters['back']['edit_salle'];
                $this->render($this->layout,
                              $this->editSalleTemplate,
                              $this->editSalleParameters/*array(
                                'arrayErrors' => $arrayErrors,
                              )*/
                        );  
            } 
            
        } else {
            $sr = new SalleRepository();
            $editSalle = $sr->findSalleById($_GET["id"]);
            
            require __DIR__ . '/../views/viewParameters.php';
            
            $viewPageParameters['back']['edit_salle']['meta'] = $editSalle;
           
            $this->editSalleParameters = $viewPageParameters['back']['edit_salle'];
            $this->render($this->layout,
                          $this->editSalleTemplate,
                          $this->editSalleParameters);
        }
        
        /*require __DIR__ . '/../views/viewParameters.php';
            $this->inscriptionParameters = $viewPageParameters['visiteur']['inscription'];
            $this->render($this->layout, $this->inscriptionTemplate, $this->inscriptionParameters);*/
    }
    
    /**
     * Delete an existing salle
     */
    public function deleteSalle() 
    {
        $ss = new SalleService();
        
        $idSalle = (int)filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        $ss->deleteSalleService($idSalle);
        //The id of the salle to be edited is taken from the $_GET
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
    
    /**
     * Display the existing salles
     * @return [[Type]] [[Description]]
     */
    public function displaySalle() 
    {
        $sr = new SalleRepository();
        $allSalles = $sr->getAllSalle();
        //on require le fichier de config de la view
        require __DIR__ . '/../views/viewParameters.php';
        
        $viewPageParameters['back']['display_salle']['meta'] = $allSalles;
        //on va chercher les paramètres dans l'array viewpageParameters
        $this->displaySalleParameters = $viewPageParameters['back']['display_salle'];
        //on utilise la méthode render du parent Controller pour afficher la page
        
        return $this->render($this->layout, $this->displaySalleTemplate, $this->displaySalleParameters); 
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
    
    public function deconnectAdmin() 
    {
        $us = new UserService;
        $us->deconnect();
        header('location:index.php?controller=VisiteurController&method=displayIndex');
    }
                
}