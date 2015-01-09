<!-- HEAD -->
<?php
    include_once '/inc/head.inc.php';
?>

<!-- HEADER -->  
<?php
    include_once '/inc/header.inc.php';
?>
        

	<div class="big_title">
		<h1>Salle Chambord</h1>
	</div>
	<div class="col_60">
		<div class="carousel_wrapper">
			<div class="small_carousel">
				<div class="slide">
					<img src="/web/img/home_presentation.jpg" alt="" class="big_img"> 
				</div><!--END .slide -->
			</div><!--END .carousel -->
		</div><!--END .carousel_wrapper -->
	</div>
	
	<div class="col_40">
		<ul class="description>">
			<li>Date d'arrivée : <time datetime="2015-01-12">12 jan 2015</time></li>
			<li>Date de départ : <time datetime="2015-01-17">17 jan 2015</time></li>
			<li>Prix : <span>600 €</span></li>
			<li>Capacité : <span>200</span> personnes</li>
			<li>Catégorie : <span>réunion</span></li>
		</ul>
		<p>vos mille et un souhaits... Caméléon créatif et festif, le domaine
		de Dangu se prête à vos envies de réceptions, d’événements
		professionnels ou de performances artistiques. Concert, cocktail,
		garden party, dîner spectacle, séjour d’enregistrement au
		château… : à vous d'allonger la liste !</p>
	</div><!--END .col box_50 -->
	
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
		<img src="" class="icon"><!-- Icone type vous etes ici-->
		<h2>Accès</h2>
		<address>
			6 Rue de la Roquette<br>
			75011 Paris
		</address>
	</div><!--END .col box_40 -->
	
	<div class="col_60">
		<h2>Avis</h2>
		<div class="box">
			<img src="/web/img/male.jpg"> <!-- A dynamiser, src différente en fonction du sexe-->
			<h3 class="short_title">David</h3>
			<div  class="icon"><!-- Ajouter en url()  une icone type bulle de bd ?-->
			<span class="big_font">8</span>
			</div>
			<time class="block" datetime="2015-01-12">2 jan 2015</time>
			<p>Superbe lieu, idéal pour une conférence au projecteur</p>
		</div>
		
		<div class="box">
			<img src="/web/img/female.jpg"> <!-- A dynamiser, src différente en fonction du sexe-->
			<h3 class="short_title">Emilie</h3>
			<div  class="icon"><!-- Ajouter en url()  une icone type bulle de bd ?-->
			<span class="big_font">7</span>
			</div>
			<time class="block" datetime="2015-01-12">2 jan 2015</time>
			<p>Sympa mais un peu petit pour une conférence.</p>
		</div>
	
	</div><!--END .col_60 -->
	
	</div><!--END .container -->
<!-- FOOTER -->
<?php
    include_once '/inc/footer.inc.php';
?>

   

