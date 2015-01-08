<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inscription
 *
 * @author Yoann
 */
namespace controller; // toujours le même nom que le dossier, pour que l'autoload puisse trouver le fichier

class Home { // cette classe extends controller
    //put your code here
    
   /* public function login()
    {
        echo 'login';
        // render (methode du controller principal)
        render();
    }*/
    
    public function DisplayForMember()
	{
		$user = $this->getRepository('User'); // correspond à un $employe = new Repository\EmployesRepository
		$employes = $employes->getAllEmploye(); // méthode de Repository\EmployesRepository
		
		return $this->render('layout.php', 'employes.php', array(
			'title' => 'Application',
			'employes' => $employes
		));
	}
	public function oneDisplay($id)
	{
		$employe = $this->getRepository('Employes');
		$employe = $employe->getFindEmploye($id);
		
		return $this->render('layout.php', 'employe.php', array(
			'title' => 'Application',
			'employe' => $employe
		));
	}
    
    public function register()
    {
            echo 'coucou';

        
        if (!empty($_POST))
       
       $verif_caracteres = trim(preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo'])); // return 0 si mauvais caractères dans le pseudo sinon return 1
       
       /*
            preg_match() :
            # => declare le début et la fin de l'expression reguliere
            ^ => indique le début de la chaine
            $ => indique la fin de la chaine 
            + => autorise la répétition des caractères
       */
       
       if(!$verif_caracteres && !empty($_POST['pseudo']))
       {
            $msg .= "<div class='bg-danger' height='30' style='padding: 10px'><p>Caractères acceptés : A à Z et de 0 à 9 !</p> </div>";
       }
       if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 14)
       {
            $msg .= "<div class='bg-danger' height='30' style='padding: 10px'><p>Le pseudo doit avoir entre 4 et 14 caractères inclus !</p> </div>";
       }
       if(strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 14)
       {
            $msg .= "<div class='bg-danger' height='30' style='padding: 10px'><p>Le Mot de passe doit avoir entre 4 et 14 caractères inclus !</p> </div>";
       }
       
       if(empty($msg)) // si je n'ai pas de message d'erreur donc les controles sont ok !
       {
            $membre = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
            
            if($membre->num_rows > 0)
            {
                $msg .= "<div class='bg-danger' height='30' style='padding: 10px'><p>Pseudo indisponible !</p> </div>";
            }
            else
            {           
               foreach($_POST AS $indice => $valeur)
               {
                    $_POST[$indice] = htmlentities($valeur, ENT_QUOTES);
               }
               extract($_POST); // crée une variable pour chaque indice du tableau array. chaque variable contient la valeur correspondante
               executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, sexe, ville, cp, adresse) VALUES ('$pseudo', '$mdp', '$nom', '$prenom', '$email', '$sexe', '$ville', '$cp', '$adresse')");
               
               $msg .= "<div class='bg-success' height='30' style='padding: 10px'><p>Inscription Ok !</p></div>";
            }   
       }
    } 
}
