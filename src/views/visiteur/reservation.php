	<div class="container-box">
	    <div class="big_title">
            <h1>Réserver une salle de réunion à la date qui vous convient</h1>
	    </div>
                   <?php if(!empty($this->reservationParameters["meta"])): ?>
        <?php foreach($this->reservationParameters["meta"] as $key => $value): ?>
            <div class="col_30">
                <div class="small-box">
                <img src="/web/img/home_box.jpg" alt="" class="small_img"> 
            <div class="date">
                <p><i class="fa fa-calendar"></i>
Du <?php echo($value["date_arrivee"]); ?></p>
                <p><i class="fa fa-calendar"></i>
Au <?php echo($value["date_depart"]); ?></p>
            </div>
            <div class="lieu">
		        <p><i class="fa fa-map-marker">
                    <?php foreach ($this->reservationParameters["salles"][$key] as $key2 => $value2) echo ($value2["ville"]); ?>
                    </i>

                </p>
            </div>
            <div class="prix">
		        <p><?php echo($value["prix"]); ?> €</p>
            </div>
            <div class="btn">
                <a href="<?php echo "index.php?controller=VisiteurController&method=displayReservationDetail&id=".$value['id_produit'] ?>">
                    <button type="button">Voir ce lieu</button>
                </a>
            </div>
		    <a href="index.php?controller=VisiteurController&method=connexion">Connectez vous</a>
        </div><!--END .col -->
        
                    
         </div>
        <?php endforeach; ?>
        <?php endif ?>
	</div><!--END .container-box -->
  
    </div><!--END .container -->