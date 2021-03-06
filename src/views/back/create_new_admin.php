
	<div class="container-box back-office">
        <div class="big-title-back">
            <h1>Créer un nouveau compte administrateur</h1>
        </div>
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
            <button type="submit" name="createNewAdmin">Inscription</button>
		
		</fieldset>
            </form>
	</div>
			
	</div><!--END .col -->
</div><!--END .container-box -->
  	
</div><!--END .container -->