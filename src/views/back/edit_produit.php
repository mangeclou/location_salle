    <div class="big_title">
        <h1>Modifier produit</h1>
    </div>
    <div class="container-box">
	<div class="col_50">
            <div class="form-inscription">
		<h2>Modifier un produit</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <fieldset class="form-inscription">
                         <div class="inscription_champ"> 
                            <label for="salle">Choix de la salle</label>
                            <?php if(isset($this->editProduitParameters["meta"]["errors"]['errorSalle'])
                              && $this->editProduitParameters["meta"]["errors"]['errorSalle'] !== true)
                                    echo "<span class='error'>" 
                                    .htmlspecialchars($this->editProduitParameters["meta"]["errors"]['errorSalle'])
                                    ."</span>"; ?>
                            <select name="id_salle" id="salle">
                            <?php   foreach ($this->editProduitParameters["meta"]["external"]["salles"] as $key => $value) {
                                    echo "<option value='" .$value['id_salle'] ."'>" .$value['id_salle'] ." | " .$value['titre'] ." | " .$value['adresse'] ." " .$value['cp'] ." " .$value['ville']  ."</option>";
                                }
                            ?>
                            </select>
                        </div> 

                        <div class="inscription_champ"> 
                            <label for="date_first">Date d'arrivée</label>
                            <?php if(isset($this->editProduitParameters["meta"]["errors"]['errorDateArrivee'])
                              && $this->editProduitParameters["meta"]["errors"]['errorDateArrivee'] !== true)
                                    echo "<span class='error'>" 
                                    .htmlspecialchars($this->editProduitParameters["meta"]["errors"]['errorDateArrivee'])
                                    ."</span>"; ?>
                            <input id="datetimepicker" type="text" name="date_arrivee" maxlength="14"
                               placeholder="Date..." class="form-control"
                                   value="<?php if (isset($_POST["date_arrivee"])) { echo htmlspecialchars($_POST["date_arrivee"], ENT_QUOTES);}elseif(isset($this->editProduitParameters["meta"]["date_arrivee"]))
                                    echo htmlspecialchars($this->editProduitParameters["meta"]["date_arrivee"], ENT_QUOTES); 
                                   ?>" />
                        </div>
                        
                        <div class="inscription_champ"> 
                            <label for="date_second">Date de départ</label>
                            <?php if(isset($this->editProduitParameters["meta"]["errors"]['errorDateDepart'])
                              && $this->editProduitParameters["meta"]["errors"]['errorDateArrivee'] !== true)
                                    echo "<span class='error'>" 
                                    .htmlspecialchars($this->editProduitParameters["meta"]["errors"]['errorDateDepart'])
                                    ."</span>"; ?>
                            <input id="datetimepicker_2" type="text" name="date_depart" maxlength="14"
                               placeholder="Date..." class="form-control"
                               value="<?php if (isset($_POST["date_depart"])) { echo htmlspecialchars($_POST["date_depart"], ENT_QUOTES);}elseif(isset($this->editProduitParameters["meta"]["date_depart"]))
                                    echo htmlspecialchars($this->editProduitParameters["meta"]["date_depart"], ENT_QUOTES); 
                                   ?>" />
                            
                            <!--DATE Interval errors-->
                            <?php
                            if(isset($this->editProduitParameters["meta"]["errors"]['errorDateInterval'])
                              && $this->editProduitParameters["meta"]["errors"]['errorDateInterval'] !== true)
                                    echo "<span class='error'>" 
                                    .htmlspecialchars($this->editProduitParameters["meta"]["errors"]['errorDateInterval'])
                                    ."</span>"; ?>
                        </div>

                        <div class="inscription_champ"> 
                            <label for="prix">Prix</label>
                            <?php if(isset($this->editProduitParameters["meta"]["errors"]['errorPrix'])
                              && $this->editProduitParameters["meta"]["errors"]['errorPrix'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->editProduitParameters["meta"]["errors"]['errorPrix'])
                                    ."</span>"; ?>
                            <input type="number" id="prix" name="prix"
                               placeholder="Prix..." class="form-control"
                               value="<?php if (isset($_POST["prix"])) { echo htmlspecialchars($_POST["prix"], ENT_QUOTES);}elseif(isset($this->editProduitParameters["meta"]["prix"]))
                                    echo htmlspecialchars($this->editProduitParameters["meta"]["prix"], ENT_QUOTES); 
                                   ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="promotion">Code promo</label>
                            <?php if(isset($this->editProduitParameters["meta"]["errors"]['errorPromo'])
                              && $this->editProduitParameters["meta"]["errors"]['errorPromo'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->editProduitParameters["meta"]["errors"]['errorPromo'])
                                    ."</span>"; ?>
                             <select name="id_promo" id="promotion">
                            <?php foreach ($this->editProduitParameters["meta"]["external"]["promos"] as $key => $value) {
                                    echo "<option value='" .$value['id_promo'] ."'>" .$value['id_promo'] ." | " .$value['code_promo'] ." | " .$value['reduction'] ." "  ."</option>";
                                }
                            ?>
                            
                            </select>
                        </div>
                      
                        <button type="submit" name="envoyer">Envoyer</button>
                    </fieldset>
                   
                </form>
            </div><!--END .form-inscription -->
			
	</div><!--END .col -->
    </div><!--END .container-box -->