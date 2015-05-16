	<div class="container-box back-office">
        <div class="big-title">
            <h1>Mot de passe perdu</h1>
        </div>
            <div class="col_50">
                <div class="form-contact">
                    <form method="post" action="">
                        <fieldset class="form-contact">
                            <legend>Afin de pouvoir réinitialiser votre mot de passe, vous devez nous fournir votre adresse email.</legend>
                            <div class="champ-contact"> 
                                <label for="email">Sujet</label>
                                <input type="email" id="email" name="email" maxlength="50" 
                                   placeholder="Mail..." class="form-control" 
                                   value="<?php if(isset($_POST['sujet'])) echo $_POST['sujet'] ?>" >
                            </div>

                            <button type="submit" name="envoiAdresseMdpperdu">Envoyer</button>

                    </fieldset>
                </form>
            </div>

            </div><!--END .col -->


            </div>
  	
</div><!--END .container -->