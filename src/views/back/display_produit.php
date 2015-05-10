	<div class="big-title-back">
            <h1>Gestion des produits</h1>
    </div>
	<div class="container-box">
              
        <div class="salle-back">
            <a class="button" href="index.php?controller=BackController&method=addNewProduit">Ajouter un produit</a>
            <div class="table-responsive">
                <table class="back-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date d'arrivée</th>
                            <th>Date de départ</th>
                            <th>Id de la salle</th>
                            <th>Id promo</th>
                            <th>Prix</th>
                            <th>Etat</th>                          
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php foreach($this->displayProduitParameters["meta"] as $row): ?>
                    <tr>

                        <td><?php echo($row["id_produit"]); ?></td>
                        <td><?php echo($row["date_arrivee"]); ?></td>
                        <td><?php echo($row["date_depart"]); ?></td>
                        <td><?php echo($row["id_salle"]); ?></td>
                        <td><?php echo($row["id_promo"]); ?></td>
                        <td><?php echo($row["prix"]); ?></td>
                        <td><?php echo($row["etat"]); ?></td>                      

                        <td><a href="<?php echo "index.php?controller=BackController&method=editProduit&id=".$row['id_produit'] ?>" title="Modifier"><i class="fa fa-pencil"></i></a></td>
                        <td><a href="<?php echo "index.php?controller=BackController&method=deleteProduit&id=".$row['id_produit'] ?>" onclick="confirm('Etes vous sûr ?')" title="Supprimer"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php  /*endif;*/ ?>
                    </tbody>
                </table><!-- end .table .table-hover -->
        </div><!-- end .table-responsive -->

            </div><!--END .avis-table -->
        
        </div><!--END .container-box -->
  	
</div><!--END .container -->

