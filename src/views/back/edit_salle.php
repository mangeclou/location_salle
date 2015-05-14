    <div class="big_title">
        <h1>Ajout Salle</h1>
    </div>
 
    <div class="container-box">
	<div class="col_50">
            <div class="form-inscription">
		<h2>Modifier une salle</h2>
                
                <form method="post" action="" enctype="multipart/form-data">
                    <fieldset class="form-inscription">
                        <div class="inscription_champ"> 
                            <label for="pays">Pays</label>
                            <?php if(isset($this->editSalleParameters["meta"]["errors"]['errorPays'])
                              && $this->editSalleParameters["meta"]["errors"]['errorPays'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->editSalleParameters["meta"]["errors"]['errorPays'])
                                    ."</span>"; ?>
                            <input type="text" id="pays" name="pays" maxlength="50" 
                                   placeholder="Pays..." class="form-control" 
                                   value="<?php if(isset($this->editSalleParameters["meta"]["pays"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["pays"]);
                                          /*if (isset($_POST["pays"])) echo htmlspecialchars($_POST["pays"], ENT_QUOTES);*/
                                          ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="ville">Ville</label>
                            <?php if(isset($this->editSalleParameters["meta"]["errors"]['errorVille'])
                              && $this->editSalleParameters["meta"]["errors"]['errorVille'] !== true)
                                    echo "<span class='error'>" 
                                    .htmlspecialchars($this->editSalleParameters["meta"]["errors"]['errorVille'])
                                    ."</span>"; ?>
                            <input type="text" id="ville" name="ville" maxlength="14"
                               placeholder="Ville..." class="form-control"
                               value="<?php if(isset($this->editSalleParameters["meta"]["ville"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["ville"]); 
                                   if (isset($_POST["ville"])) echo htmlspecialchars($_POST["ville"], ENT_QUOTES)?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="adresse">Adresse</label>
                            <?php if(isset($this->editSalleParameters["meta"]["errors"]['errorAdresse'])
                              && $this->editSalleParameters["meta"]["errors"]['errorAdresse'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->editSalleParameters["meta"]["errors"]['errorAdresse'])
                                    ."</span>"; ?>
                            <input type="text" id="adresse" name="adresse"
                               placeholder="Adresse..." class="form-control"
                               value="<?php if(isset($this->editSalleParameters["meta"]["adresse"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["adresse"]); 
                                   if (isset($_POST["pays"])) echo htmlspecialchars($_POST["pays"], ENT_QUOTES);?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="cp">Code postal</label>
                            <?php if(isset($this->editSalleParameters["meta"]["errors"]['errorCp'])
                              && $this->editSalleParameters["meta"]["errors"]['errorCp'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->editSalleParameters["meta"]["errors"]['errorCp'])
                                    ."</span>"; ?>
                            <input type="text" id="cp" name="cp"
                               placeholder="Code postal..." class="form-control"
                               value="<?php if(isset($this->editSalleParameters["meta"]["cp"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["cp"]); 
                                   if (isset($_POST["cp"])) echo htmlspecialchars($_POST["cp"], ENT_QUOTES);?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="titre">Titre</label>
                            <?php if(isset($this->editSalleParameters["meta"]["errors"]['errorTitre'])
                              && $this->editSalleParameters["meta"]["errors"]['errorTitre'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->editSalleParameters["meta"]["errors"]['errorTitre'])
                                    ."</span>"; ?>
                            <input type="text" id="titre" name="titre"
                               placeholder="Titre..." class="form-control"
                               value="<?php if(isset($this->editSalleParameters["meta"]["titre"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["titre"]); 
                                   if (isset($_POST["titre"])) echo htmlspecialchars($_POST["titre"], ENT_QUOTES);?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="description">Description</label>
                            <?php if(isset($this->editSalleParameters["meta"]["errors"]['errorDescription'])
                              && $this->editSalleParameters["meta"]["errors"]['errorDescription'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->editSalleParameters["meta"]["errors"]['errorDescription'])
                                    ."</span>"; ?>
                            <textarea id="description" name="description"
                               placeholder="Description..." class="form-control">
                                    <?php if(isset($this->editSalleParameters["meta"]["description"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["description"]);
                                    if (isset($_POST["description"])) echo htmlspecialchars($_POST["description"], ENT_QUOTES)?>
                               </textarea>
                        </div>

                        <div class="inscription_champ"> 
                            <label for="photo">Photo</label>
                            <?php if(isset($this->editSalleParameters["meta"]["errors"]['errorPhoto'])
                              && $this->editSalleParameters["meta"]["errors"]['errorPhoto'] !== true)
                                    echo "<span class='error'>"
                                    .htmlspecialchars($this->editSalleParameters["meta"]["errors"]['errorPhoto'])
                                    ."</span>"; ?>
                            <input type="file" id="Photo" name="photo"
                               placeholder="Photo" class="form-control" 
                               value="<?php if(isset($this->editSalleParameters["meta"]["photo"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["photo"]);
                                   if (isset($_POST["photo"])) echo htmlspecialchars($_POST["photo"], ENT_QUOTES)?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="capacite">Capacite</label>
                            <?php if(isset($this->editSalleParameters["meta"]["errors"]['errorCapacite'])
                              && $this->editSalleParameters["meta"]["errors"]['errorCapacite'] !== true)
                                    echo "<span class='error'>" 
                            .htmlspecialchars($this->editSalleParameters["meta"]["errors"]['errorCapacite'], ENT_QUOTES)
                            ."</span>"; ?>
                            <input type="text" id="capacite" name="capacite" 
                               placeholder="Capacite..." class="form-control" 
                               value="<?php if(isset($this->editSalleParameters["meta"]["capacite"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["capacite"]);
                                   if (isset($_POST["capacite"])) echo htmlspecialchars($_POST["capacite"], ENT_QUOTES)?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="categorie">Categorie</label>
                            <?php if(isset($this->editSalleParameters["meta"]["errors"]['errorCategorie'])
                              && $this->editSalleParameters["meta"]["errors"]['errorCategorie'] !== true)
                                    echo "<span class='error'>" 
                                .htmlspecialchars($this->editSalleParameters["meta"]["errors"]['errorCategorie'])
                                ."</span>"; ?>
                            
                            <select name="categorie" id="categorie">
                                <option value="<?php if(isset($this->editSalleParameters["meta"]["categorie"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["categorie"]);
                                    if (isset($_POST["categorie"])) echo htmlspecialchars($_POST["categorie"], ENT_QUOTES)?>">Reunion</option>                                
                            </select>
                        </div> 
                        <button type="submit" name="ajouter" -->Ajouter</button>
                    </fieldset>
                   
                </form>
            </div><!--END .form-inscription -->
			
	</div><!--END .col -->
    </div><!--END .container-box -->