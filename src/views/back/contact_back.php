	<div class="container-box back-office">
        <div class="big-title">
            <h1>Contact</h1>
        </div>
            <div class="col_50">
                <div class="form-contact">
                    <form method="post" action="">
                        <fieldset class="form-contact">
                            <div class="champ-contact"> 
                                <label for="sujet">Sujet</label>
                                <input type="text" id="sujet" name="sujet" maxlength="50" 
                                   placeholder="Sujet..." class="form-control" 
                                   value="<?php if(isset($_POST['sujet'])) echo $_POST['sujet'] ?>" >
                            </div>

                            <div class="champ-contact"> 
                                <label for="message">Sujet</label>
                                <input type="text" id="message" name="message" maxlength="50"
                                   placeholder="Message..." class="form-control"
                                   value="<?php if(isset($_POST['message'])) echo $_POST['message'] ?>" >
                            </div>
                            
                            <button type="submit" name="envoiContactMessage">Nous contacter</button>

                    </fieldset>
                </form>
            </div>

            </div><!--END .col -->


            </div>
  	
</div><!--END .container -->