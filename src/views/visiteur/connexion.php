	<div class="big-title">
            <h1>Connexion</h1>
        </div>
	<div class="container-box">
            <div class="col_50">
                <div class="form-contact">
                    <form method="post" action="">
                        <fieldset class="form-contact">
                            <legend>Se connecter</legend>
                            <div class="champ-contact"> 
                                <label for="pseudo">Pseudo</label>
                                <input type="text" id="pseudo" name="pseudo" maxlength="50" 
                                   placeholder="Pseudo" class="form-control" 
                                   value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo'] ?>" >
                            </div>
                            <div class="champ-contact"> 
                                <label for="mdp">Mot de passe</label>
                                <input type="password" id="mdp" name="mdp" maxlength="50" 
                                   placeholder="Pseudo" class="form-control" >
                                
                            </div>
                            <div class="champ-contact">
                                <label for="rememberPseudo">Se souvenir de moi</label>
                                <input type="checkbox" id="rememberPseudo" name="rememberPseudo">
                            </div>
                            
                            <button type="submit" name="connexion">Connexion</button>
                        </fieldset>
                    </form>
                </div><!--END .form-contact -->
            </div><!--END .col -->
            <div class="col_50">
                <h2>Inscription</h2>
                <p>Pas encore membre ?</p>
                <a href="index.php?controller=VisiteurController&method=displayInscription">Inscrivez-vous.</a>
            </div><!--END .col -->
        </div><!--END .container-box -->
  	
</div><!--END .container -->