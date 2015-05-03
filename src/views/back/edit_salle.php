<?php

?>

    <div class="big_title">
        <h1>Ajout Salle</h1>
    </div>
 
    <div class="container-box">
	<div class="col_50">
            <div class="form-inscription">
		<h2>Modifier une salle</h2>
                <form method="post" action="">
                    <fieldset class="form-inscription">
                        <div class="inscription_champ"> 
                            <label for="pays">Pays</label>
                            <input type="text" id="pays" name="pays" maxlength="50" 
                                   placeholder="Pays..." class="form-control" 
                                   value="<?php if(isset($this->editSalleParameters["meta"]["pays"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["pays"]); ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="ville">Ville</label>
                            <input type="text" id="ville" name="ville" maxlength="14"
                               placeholder="Ville..." class="form-control"
                               value="<?php if(isset($this->editSalleParameters["meta"]["ville"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["ville"]); ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="adresse">Adresse</label>
                            <input type="text" id="adresse" name="adresse"
                               placeholder="Adresse..." class="form-control"
                               value="<?php if(isset($this->editSalleParameters["meta"]["adresse"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["adresse"]); ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="cp">Code postal</label>
                            <input type="text" id="cp" name="cp"
                               placeholder="Code postal..." class="form-control"
                               value="<?php if(isset($this->editSalleParameters["meta"]["cp"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["cp"]); ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="titre">Titre</label>
                            <input type="text" id="titre" name="titre"
                               placeholder="Titre..." class="form-control"
                               value="<?php if(isset($this->editSalleParameters["meta"]["titre"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["titre"]); ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="description">Description</label>
                            <textarea id="description" name="description"
                               placeholder="Description..." class="form-control">
                                    <?php if(isset($this->editSalleParameters["meta"]["description"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["description"]); ?>
                               </textarea>
                        </div>

                        <div class="inscription_champ"> 
                            <label for="photo">Photo</label>
                            <input type="file" id="Photo" name="photo"
                               placeholder="Photo" class="form-control" 
                               value="<?php if(isset($this->editSalleParameters["meta"]["photo"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["photo"]); ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="capacite">Capacite</label>
                            <input type="text" id="capacite" name="capacite" 
                               placeholder="Capacite..." class="form-control" 
                               value="<?php if(isset($this->editSalleParameters["meta"]["capacite"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["capacite"]); ?>" />
                        </div>

                        <div class="inscription_champ"> 
                            <label for="categorie">Categorie</label>
                            <select name="categorie" id="categorie">
                                <option value="<?php if(isset($this->editSalleParameters["meta"]["categorie"]))
                                    echo htmlspecialchars($this->editSalleParameters["meta"]["categorie"]); ?>">Reunion</option>                                
                            </select>
                        </div> 
                        <button type="submit" name="ajouter" -->Ajouter</button>
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