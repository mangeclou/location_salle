<?php

$msg = '';
/*
            preg_match() :
            # => declare le début et la fin de l'expression reguliere
            ^ => indique le début de la chaine
            $ => indique la fin de la chaine 
            + => autorise la répétition des caractères
       */
   /*if($_POST)
    {
       
       $verif_caracteres = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']); // return 0 si mauvais caractères dans le pseudo sinon return 1
       
       
       
       if(!$verif_caracteres && !empty($_POST['pseudo']))
       {
            $msg .= "<div class='alert alert-danger' height='30' style='padding: 10px'><p>Caractères acceptés : A à Z et de 0 à 9 !</p> </div>";
       }
       if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 14)
       {
            $msg .= "<div class='alert alert-danger' height='30' style='padding: 10px'><p>Le pseudo doit avoir entre 4 et 14 caractères inclus !</p> </div>";
       }
       if(strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 14)
       {
            $msg .= "<div class='alert alert-danger' height='30' style='padding: 10px'><p>Le Mot de passe doit avoir entre 4 et 14 caractères inclus !</p> </div>";
       }
       
       if(empty($msg)) // si je n'ai pas de message d'erreur donc les controles sont ok !
       {
            $membre = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
            
            if($membre->num_rows > 0)
            {
                $msg .= "<div class='alert alert-danger' height='30' style='padding: 10px'><p>Pseudo indisponible !</p> </div>";
            }
            else
            {           
               foreach($_POST AS $indice => $valeur)
               {
                    $_POST[$indice] = htmlentities($valeur, ENT_QUOTES);
               }
               extract($_POST); // crée une variable pour chaque indice du tableau array. chaque variable contient la valeur correspondante
               executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, sexe, ville, cp, adresse) VALUES ('$pseudo', '$mdp', '$nom', '$prenom', '$email', '$sexe', '$ville', '$cp', '$adresse')");
               
               $msg .= "<div class='alert alert-success' height='30' style='padding: 10px'><p>Inscription Ok !</p></div>";
            }   
       }
    } 

*/
?>

    <div class="big_title">
        <h1>Inscription</h1>
    </div>
      
 
    <div class="container-box">
	<div class="col_50">
            <div class="form-inscription">
		<h2>Inscription</h2>
                <form method="post" action="">
                    <fieldset class="form-inscription">
                        <div class="inscription_champ"> 
                            <label for="pseudo">Pseudo</label>
                            <input type="text" id="pseudo" name="pseudo" maxlength="14" 
                                   placeholder="Pseudo..." class="form-control" 
                                   value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="mdp">Mot de passe</label>
                            <input type="text" id="mdp" name="mdp" maxlength="14"
                               placeholder="Mot de passe..." class="form-control"
                               value="<?php if(isset($_POST['mdp'])) echo $_POST['mdp'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom"
                               placeholder="Nom..." class="form-control"
                               value="<?php if(isset($_POST['nom'])) echo $_POST['nom'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom"
                               placeholder="Prénom..." class="form-control"
                               value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"
                               placeholder="Email..." class="form-control"
                               value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="sexe">Sexe</label>
                            <input type="radio" name="sexe" value="m" 
                               class="radio-inline" <?php if((isset($_POST['sexe']) && $_POST['sexe'] == 'm') || !isset($_POST['sexe'])) echo 'checked'; elseif (!isset($_POST['sexe'])) echo 'checked'?> /> Homme
                            <input type="radio" name="sexe" value="f" 
                               class="radio-inline" <?php if(isset($_POST['sexe']) && $_POST['sexe'] == 'f') echo 'checked'; ?> /> Femme
                        </div>

                        <div class="inscription_champ"> 
                            <label for="ville">Ville</label>
                            <input type="text" id="ville" name="ville"
                               placeholder="ville..." class="form-control" 
                               value="<?php if(isset($_POST['ville'])) echo $_POST['ville'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="cp">Code postal</label>
                            <input type="text" id="cp" name="cp" 
                               placeholder="Code postal..." class="form-control" 
                               value="<?php if(isset($_POST['cp'])) echo $_POST['cp'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="adresse">Adresse</label>
                            <textarea id="adresse" name="adresse" class="form-control" placeholder="adresse..." ><?php if(isset($_POST['adresse'])) echo $_POST['adresse'] ?></textarea>
                        </div> 
                        <button type="submit" name="inscription">Inscription</button>
                    </fieldset>
                </form>
            </div><!--END .form-inscription -->
			
	</div><!--END .col -->
    </div><!--END .container-box -->