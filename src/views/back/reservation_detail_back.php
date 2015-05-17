<div class="container-box back-office">
    <div class="big_title">
		<h1><?php echo $this->displayReservationDetailBackParameters["salle"]["titre"]; ?></h1>
	</div>
	<div class="col_70">
		<div class="carousel_wrapper">
			<div class="small_carousel">
				<div class="slide">
					<img src="/web/img/home_presentation.jpg" alt="" class="big_img"> 
				</div><!--END .slide -->
			</div><!--END .carousel -->
		</div><!--END .carousel_wrapper -->
	</div>
	
	<div class="col_30">
		
            
            <?php if(!empty($this->displayReservationDetailBackParameters["meta"])): ?>

          
                <div class="medium-box">
               
            <div class="detail">
                <p><i class="fa fa-calendar"></i>
Du <?php echo $this->displayReservationDetailBackParameters["meta"]["date_arrivee"]; ?></p>
                <p><i class="fa fa-calendar"></i>
Au <?php echo $this->displayReservationDetailBackParameters["meta"]["date_depart"];  ?></p>
            </div>
            <div class="detail">
		        <p><i class="fa fa-map-marker"></i>
                    <?php echo $this->displayReservationDetailBackParameters["salle"]["ville"]; ?>
                    

                </p>
            </div>
            <div class="detail">
		        <p><i class="fa fa-user"></i>
                    <?php echo $this->displayReservationDetailBackParameters["salle"]["capacite"]; ?>
                    
                </p>
            </div>
            <div class="detail">
		        <p><i class="fa fa-user"></i>
                    <?php echo $this->displayReservationDetailBackParameters["salle"]["categorie"]; ?>
                   
                </p>
            </div>
                    
            <div class="prix">
		        <p><?php echo $this->displayReservationDetailBackParameters["meta"]["prix"]; ?> €</p>
            </div>            
		    <a href="index.php?controller=MembreController&method=displayPanierMembre">Ajouter au panier <i class="fa fa-cart-plus"></i></a>
        </div><!--END .col -->
       
        <?php endif ?>
   
	</div><!--END .col_30 -->
	<div class="wide">
         <p><?php echo $this->displayReservationDetailBackParameters["salle"]["description"]; ?></p>
    </div>
	<div class="col_60"> <!-- TODO : pouvoir gérer des variables à partir de l'url pour rendre dynamique le lien, peut etre juste avec google maps-->
		<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
		src="http://www.openstreetmap.org/export/embed.html?bbox=2.3360109329223633%2C48.85000404312576%2C2.357490062713623%2C48.860493990176394&amp;layer=mapnik" 
		style="border: 1px solid black">
		</iframe><br/>
		<small>
		<a href="http://www.openstreetmap.org/#map=16/48.8552/2.3468">Afficher une carte plus grande</a>
		</small>	
		
	</div><!--END .col box_60 -->
	
	<div class="col_40">
		<h2>Accès</h2>
		<address>
            <i class="fa fa-map-marker"></i><br/>
            <?php echo $this->displayReservationDetailBackParameters["salle"]["adresse"]; ?><br/>
			<?php echo $this->displayReservationDetailBackParameters["salle"]["cp"]; ?> <?php echo $this->displayReservationDetailBackParameters["salle"]["ville"]; ?>
		</address>
	</div><!--END .col box_40 -->
	
	<div class="col_60">
		<h2>Avis</h2>
		<div class="box">
			<img src="/img/male.jpg"> <!-- A dynamiser, src différente en fonction du sexe-->
			<h3 class="short_title">David</h3>
			<div  class="icon"><!-- Ajouter en url()  une icone type bulle de bd ?-->
			<span class="big_font">8</span>
			</div>
			<time class="block" datetime="2015-01-12">2 jan 2015</time>
			<p>Superbe lieu, idéal pour une conférence au projecteur</p>
		</div>
		
		<div class="box">
                    <img src="/img/female.jpg" alt="icon"> <!-- A dynamiser, src différente en fonction du sexe-->
			<h3 class="short_title">Emilie</h3>
			<div  class="icon"><!-- Ajouter en url()  une icone type bulle de bd ?-->
			<span class="big_font">7</span>
			</div>
			<time class="block" datetime="2015-01-12">2 jan 2015</time>
			<p>Sympa mais un peu petit pour une conférence.</p>
		</div>
	
	</div><!--END .col_60 -->
    </div>
	
	</div><!--END .container -->