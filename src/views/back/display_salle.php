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
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Pays</th>
                    <th>Ville</th>
                    <th>Rubrique</th>
                    <th>Adresse</th>
                    <th>Cp</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Capacite</th>
                    <th>Categorie</th>
                </tr>
                <!--<?php /*foreach($query->result() as $row):*/ ?>-->
                <tr>
                    <td>test<?php /*echo $row->c_id;*/ ?></td>
                    <td>test<?php /*echo $row->c_title;*/ ?></td>
                    <td>test<?php /*echo character_limiter($row->c_content, 64);*/ ?></td>
                    <td>test<?php /*echo $row->r_title;*/ ?></td>
                    <td>teste<?php /*echo date("d/m/Y à H:i:s", strtotime($row->c_cdate));*/ ?></td>
                    <td>test<?php /*echo date("d/m/Y à H:i:s", strtotime($row->c_udate));*/ ?></td>
                    <td>test<?php /*echo date("d/m/Y à H:i:s", strtotime($row->c_udate));*/ ?></td>
                    <td>tset<?php /*echo date("d/m/Y à H:i:s", strtotime($row->c_udate));*/ ?></td>
                    <td>test<?php /*echo date("d/m/Y à H:i:s", strtotime($row->c_udate));*/ ?></td>
                    <td>teset<?php /*echo date("d/m/Y à H:i:s", strtotime($row->c_udate));*/ ?></td>
                    <td>test<?php /*echo date("d/m/Y à H:i:s", strtotime($row->c_udate));*/ ?></td>
                    <td><a href="<?php /*echo base_url('admin/dashboard/edit/' . $row->c_id);*/ ?>" title="Modifier"><i class="fa fa-pencil"></i></a></td>
                    <td><a href="<?php /*echo base_url('admin/dashboard/delete/' . $row->c_id);*/ ?>" onclick="return deleteConfirm()" title="Supprimer"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php /*endforeach;*/ ?>
                <?php  /*endif;*/ ?>
                
            </table><!-- end .table .table-hover -->
        </div><!-- end .table-responsive -->

            </div><!--END .avis-table -->
        
        </div><!--END .container-box -->
  	
</div><!--END .container -->

