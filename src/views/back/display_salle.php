	<div class="big-title-back">
            <h1>Gestion des salles</h1>
    </div>
	<div class="container-box">
              
            <div class="salle-back">
                    
                <form  action="gestion_produit.php">
                    <a href="index.php?controller=BackController&method=addNewSalle">Ajouter une salle</a>
                    <a href="index.php?controller=BackController&method=displaySalle">Affichage des salles</a>
                </form>
                <?php /*if($query->num_rows() > 0):*/ ?>
        <div class="table-responsive">
            <table class="back-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pays</th>
                        <th>Ville</th>
                        <th>Adresse</th>
                        <th>Cp</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Capacite</th>
                        <th>Categorie</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php foreach($this->displaySalleParameters["meta"] as $row): ?>
                <tr>
                    
                    <td><?php echo($row["id_salle"]); ?></td>
                    <td><?php echo($row["pays"]); ?></td>
                    <td><?php echo($row["ville"]); ?></td>
                    <td><?php echo($row["adresse"]); ?></td>
                    <td><?php echo($row["cp"]); ?></td>
                    <td><?php echo($row["titre"]); ?></td>
                    <td><?php echo($row["description"]); ?></td>
                    <td><?php echo($row["photo"]); ?></td>
                    <td><?php echo($row["capacite"]); ?></td>
                    <td><?php echo($row["categorie"]); ?></td>
                                      
                    <td><a href="<?php /*echo base_url('admin/dashboard/edit/' . $row->c_id);*/ ?>" title="Modifier"><i class="fa fa-pencil"></i></a></td>
                    <td><a href="<?php /*echo base_url('admin/dashboard/delete/' . $row->c_id);*/ ?>" onclick="return deleteConfirm()" title="Supprimer"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php endforeach; ?>
                <?php  /*endif;*/ ?>
                </tbody>
            </table><!-- end .table .table-hover -->
        </div><!-- end .table-responsive -->

            </div><!--END .avis-table -->
        
        </div><!--END .container-box -->
  	
</div><!--END .container -->

