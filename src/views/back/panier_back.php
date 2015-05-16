
	<div class="container-box back-office">
        <div class="big-title">
            <h1>Panier</h1>
        </div>      
                <div class="table">
                    <table>
                        
                    </table>
                        
                </div><!--END .avis-table -->
                <div class="col_50">
                     <fieldset class="form-contact">
                            <div class="champ-contact"> 
                                <label for="cgv">J'accepte les conditions générales de ventes :<a href="index.php?controller=BackController&method=displayCgv">C.G.V.</a></label>
                                <input type="checkbox" id="cgv" name="cgv" 
                                       class="form-control">
                            </div>

                            <div class="champ-contact"> 
                                <label for="promo">Sujet</label>
                                <input type="text" id="promo" name="promo" maxlength="50"
                                       class="form-control"
                                       value="<?php if(isset($_POST['promo'])) echo $_POST['promo'] ?>" >
                            </div>
                            
                            <button type="submit" name="validatePanier">Payer</button>
                            <button type="reset" name="resetPanier">Vider le panier</button>

                    </fieldset>
                    <p>Tous nos articles sont calculés avec le taux de TVA à 19,6%.</p>
                    <p>Réglement : par chèque uniquement à l'adresse suivante :</p>
                    <p>Lokisalle 10 avenue des chatons mignons 75000 Parici La Sortie, France</p>
                </div>
        
        </div><!--END .container-box -->
  
	
</div><!--END .container -->
