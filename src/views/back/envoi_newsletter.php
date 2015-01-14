	<div class="big-title-back">
            <h1>Envoyer la newsletter</h1>
        </div>
	<div class="container-box">
    
            <div class="col_50">
                <div class="form-newsletter">
                    <h2>Nombre d'abonnés à la newsletter : <?php //ajouter code;?></h2>
                    <form method="post" action="">
                        <fieldset class="form-newsletter">
                            <div class="champ-newsletter"> 
                                <label for="expediteur">Expéditeur</label>
                                <input type="text" id="expediteur" name="pseudo" maxlength="20" 
                                   placeholder="Expéditeur..." class="form-control" 
                                   value="<?php if(isset($_POST['expediteur'])) echo $_POST['expediteur'] ?>" >
                            </div>

                            <div class="champ-newsletter"> 
                                <label for="sujet">Sujet</label>
                                <input type="text" id="sujet" name="sujet" maxlength="50"
                                   placeholder="Mot de passe..." class="form-control"
                                   value="<?php if(isset($_POST['sujet'])) echo $_POST['sujet'] ?>" >
                            </div>

                            <div class="champ-newsletter"> 
                                <label for="message">Message</label>
                                <textarea id="message" name="message" class="form-control" placeholder="Texte de la newsletter..." ><?php if(isset($_POST['message'])) echo $_POST['message'] ?></textarea>
                            </div> 
                            <button type="submit" name="envoiNewsletter">Inscription</button>

                    </fieldset>
                </form>
            </div>

            </div><!--END .col -->


            </div>
  	
</div><!--END .container -->