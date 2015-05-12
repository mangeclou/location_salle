<?php
    echo 'meta';
    echo "<pre>";
    print_r($this->addProduitParameters["meta"]);
echo "</pre>";
echo 'post';
print_r($_POST);



?>


    <div class="big_title">
        <h1>Ajout produit</h1>
    </div>
    <div class="container-box">
	<div class="col_50">
            <div class="form-inscription">
		<h2>Ajouter un produit</h2>
                <form method="post" action="" enctype="multipart/form-data">
                    <fieldset class="form-inscription">
                         <div class="inscription_champ"> 
                            <label for="categorie">Choix de la salle</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorVille'])
                              && $this->addProduitParameters["meta"]["errors"]['errorVille'] !== true)
                                    echo "<span class='error'>" 
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorVille'])
                                    ."</span>"; ?>
                            <select name="categorie" id="categorie">
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
                            <input type="date" id="date_first" name="date_arrivee" maxlength="14"
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
                            <input type="date" id="date_second" name="date_depart" maxlength="14"
                               placeholder="Date..." class="form-control"
                               value="<?php if(isset($_POST['date_arrivee'])) echo $_POST['date_arrivee'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="adresse">Prix</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorPrix'])
                              && $this->addProduitParameters["meta"]["errors"]['errorPrix'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorPrix'])
                                    ."</span>"; ?>
                            <input type="text" id="adresse" name="adresse"
                               placeholder="Prix..." class="form-control"
                               value="<?php if(isset($_POST['prix'])) echo $_POST['prix'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="cp">Code promo</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorPromo'])
                              && $this->addProduitParameters["meta"]["errors"]['errorPromo'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorPromo'])
                                    ."</span>"; ?>
                             <select name="categorie" id="categorie">
                        <?php   foreach ($this->addProduitParameters["meta"]["promos"] as $key => $value) {
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