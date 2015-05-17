    <div class="container-box back-office">
        <div class="carousel_wrapper">
            <div class="carousel">
                <div class="slide">
                    <h2>Présentation 1</h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vehicula faucibus sodales.
                        Nulla posuere, est sed volutpat ullamcorper, est nunc dignissim eros, ut imperdiet augue risus et est.</p>
                    <img src="img/home_presentation.jpg" alt="" class="big_img"> 
                </div><!--END .slide -->
            </div><!--END .carousel -->
        </div><!--END .carousel_wrapper -->
        <div class="big_title">
            <h1>Lokisalle vous aide à trouver la salle de réunion qui vous convient.</h1>
        </div>
        <?php if(!empty($this->indexBackParameters["meta"])): ?>
        <?php foreach($this->indexBackParameters["meta"] as $key => $value): ?>
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
                    <?php foreach ($this->indexBackParameters["salles"][$key] as $key2 => $value2) echo ($value2["ville"]); ?>
                    </i>

                </p>
            </div>
            <div class="prix">
		        <p><?php echo($value["prix"]); ?> €</p>
            </div>
            <div class="btn">
                <a href="<?php echo "index.php?controller=BackController&method=displayReservationDetailBack&id=".$value['id_produit'] ?>">
                    <button type="button">Voir ce lieu</button>
                </a>
            </div>
            <a href="index.php?controller=BackController&method=displayPanierBack">Ajouter au panier <i class="fa fa-cart-plus"></i></a>
        </div><!--END .col -->
        
                    
         </div>
        <?php endforeach; ?>
        <?php endif ?>
    </div>
  
	
</div><!--END .container -->

   

