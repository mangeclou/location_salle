<?php
print_r($_POST);

?>


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
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorVille'])
                              && $this->addProduitParameters["meta"]["errors"]['errorVille'] !== true)
                                    echo "<span class='error'>" 
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorVille'])
                                    ."</span>"; ?>
                            <select name="id_salle" id="salle">
                            <?php   foreach ($this->addProduitParameters["meta"]["salles"] as $key => $value) {
                                    echo "<option value='" .$value['id_salle'] ."'>" .$value['id_salle'] ." | " .$value['titre'] ." | " .$value['adresse'] ." " .$value['cp'] ." " .$value['ville']  ."</option>";
                                }
                            ?>
                            </select>
                        </div> 

                        <div class="inscription_champ"> 
                            <label for="date_first">Date d'arrivée</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorDateArrivee'])
                              && $this->addProduitParameters["meta"]["errors"]['errorDateArrivee'] !== true)
                                    echo "<span class='error'>" 
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorDateArrivee'])
                                    ."</span>"; ?>
                            <input id="datetimepicker" type="text" name="date_arrivee" maxlength="14"
                               placeholder="Date..." class="form-control"
                               value="<?php if(isset($_POST['date_arrivee'])) echo $_POST['date_arrivee'] ?>" />
                        </div>
                        
                        <div class="inscription_champ"> 
                            <label for="date_second">Date de départ</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorDateDepart'])
                              && $this->addProduitParameters["meta"]["errors"]['errorDateArrivee'] !== true)
                                    echo "<span class='error'>" 
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorDateDepart'])
                                    ."</span>"; ?>
                            <input id="datetimepicker_2" type="text" name="date_depart" maxlength="14"
                               placeholder="Date..." class="form-control"
                               value="<?php if(isset($_POST['date_depart'])) echo $_POST['date_depart'] ?>" />
                            
                            <?php
                            if(isset($this->addProduitParameters["meta"]["errors"]['errorDateInterval'])
                              && $this->addProduitParameters["meta"]["errors"]['errorDateInterval'] !== true)
                                    echo "<span class='error'>" 
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorDateInterval'])
                                    ."</span>"; ?>
                        </div>

                        <div class="inscription_champ"> 
                            <label for="prix">Prix</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorPrix'])
                              && $this->addProduitParameters["meta"]["errors"]['errorPrix'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorPrix'])
                                    ."</span>"; ?>
                            <input type="number" id="prix" name="prix"
                               placeholder="Prix..." class="form-control"
                               value="<?php if(isset($_POST['prix'])) echo $_POST['prix'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="promotion">Code promo</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorPromo'])
                              && $this->addProduitParameters["meta"]["errors"]['errorPromo'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorPromo'])
                                    ."</span>"; ?>
                             <select name="id_promo" id="promotion">
                            <?php foreach ($this->addProduitParameters["meta"]["promos"] as $key => $value) {
                                    echo "<option value='" .$value['id_promo'] ."'>" .$value['id_promo'] ." | " .$value['code_promo'] ." | " .$value['reduction'] ." "  ."</option>";
                                }
                            ?>
                            
                            </select>
                        </div>
                      
                        <button type="submit" name="inscription">Inscription</button>
                    </fieldset>
                    <?php
                        //on récupère les erreurs depuis les paramètres de la méthode render
                        if(!empty($arrayErrors)){
                            foreach($arrayErrors as $key => $error){
                               foreach($error as $key2 => $error2){
                                echo '<p class="erreur">' .$error2.'</p>';
                               }
                            }
                        }
                    ?>
                </form>
            </div><!--END .form-inscription -->
			
	</div><!--END .col -->
    </div><!--END .container-box -->