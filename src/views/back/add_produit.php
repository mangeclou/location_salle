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
                        <?php   foreach ($this->addProduitParameters["meta"] as $key => $value) {
                                    echo "<option value='" .$value['id_Produit'] ."'>" .$value['id_Produit'] ." | " .$value['titre'] ." | " .$value['adresse'] ." " .$value['cp'] ." " .$value['ville']  ."</option>";
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
                            <label for="adresse">Adresse</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorAdresse'])
                              && $this->addProduitParameters["meta"]["errors"]['errorAdresse'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorAdresse'])
                                    ."</span>"; ?>
                            <input type="text" id="adresse" name="adresse"
                               placeholder="Adresse..." class="form-control"
                               value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="cp">Code postal</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorCp'])
                              && $this->addProduitParameters["meta"]["errors"]['errorCp'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorCp'])
                                    ."</span>"; ?>
                            <input type="text" id="cp" name="cp"
                               placeholder="Code postal..." class="form-control"
                               value="<?php if(isset($_POST['cp'])) echo $_POST['cp'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="titre">Titre</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorTitre'])
                              && $this->addProduitParameters["meta"]["errors"]['errorTitre'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorTitre'])
                                    ."</span>"; ?>
                            <input type="text" id="titre" name="titre"
                               placeholder="Titre..." class="form-control"
                               value="<?php if(isset($_POST['titre'])) echo $_POST['titre'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="description">Description</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorDescription'])
                              && $this->addProduitParameters["meta"]["errors"]['errorDescription'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorDescription'])
                                    ."</span>"; ?>
                            <textarea id="description" name="description"
                               placeholder="Description..." class="form-control"
                                      value="<?php if(isset($_POST['titre'])) echo $_POST['titre'] ?>"></textarea>
                        </div>

                        <div class="inscription_champ"> 
                            <label for="photo">Photo</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorPhoto'])
                              && $this->addProduitParameters["meta"]["errors"]['errorPhoto'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorPhoto'])
                                    ."</span>"; ?>
                            <input type="file" id="Photo" name="photo"
                               placeholder="Photo" class="form-control" 
                               value="<?php if(isset($_POST['photo'])) echo $_POST['photo'] ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="capacite">Capacite</label>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorCategorie'])
                              && $this->addProduitParameters["meta"]["errors"]['errorCategorie'] !== true)
                                    echo "<span class='error'>" 
                                .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorCategorie'])
                                ."</span>"; ?>
                            <?php if(isset($this->addProduitParameters["meta"]["errors"]['errorCapacite'])
                              && $this->addProduitParameters["meta"]["errors"]['errorCapacite'] !== true)
                                    echo "<span class='error'>" 
                            .htmlspecialchars($this->addProduitParameters["meta"]["errors"]['errorCapacite'], ENT_QUOTES)
                            ."</span>"; ?>
                            <input type="text" id="capacite" name="capacite" 
                               placeholder="Capacite..." class="form-control" 
                               value="<?php if(isset($_POST['capacite'])) echo $_POST['capacite'] ?>" />
                        </div>

                       
                        <button type="submit" <!--name="inscription" -->>Inscription</button>
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