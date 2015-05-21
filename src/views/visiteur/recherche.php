        <div class="big_title">
            <h1>Rechercher la salle</h1>
	</div>
	<div class="recherche_form">
            <h2>Nombre de résultats : <span>3</span></h2>
            <fieldset> 
               
                <div class="recherche_champ"> 
                    <label for="date">Date
                        <input id="date" name="date" type="date" required autofocus> 
                    </label>
                </div>
                <div class="recherche_champ"> 
                    <label for="lieu">Lieu
                        <input id="lieu" name="lieu" type="text" placeholder="Lieu" required autofocus class="lieu"> 
                    </label>
                </div>
                <div class="recherche_champ"> 
                    <label for="mot_cle" class="mot_cle">Recherche par mot-clé
                        <input id="mot_cle" name="mot_cle" type="text">
                    </label>
                </div> 
                <div class="recherche_champ"> 
                    <button id="recherche" name="recherche" type="button">
                          <i class="fa fa-search"></i>
                    </button>
                </div> 
            </fieldset>
	</div><!--END .recherche-form -->
	<div class="container-box">
            <div class="col box">
		<img src="/web/img/home_box.jpg" alt="" class="small_img"> 
		<div class="date">
                    <p>Du 13 déc 2015 au 17 déc 2015</p>
		</div>
		<div class="lieu">
                    <p>Paris</p>
		</div>
		<div class="prix">
                    <p>600 €</p>
		</div>
		<div class="btn">
                    <form  action="reservation_details.php">
			<button type="submit">Voir ce lieu</button>
                    </form>
		</div>
		<a href="connexion.php">Connectez vous</a>
					
            </div><!--END .col -->
            <div class="col box">
		<img src="/web/img/home_box.jpg" alt="" class="small_img"> 
		<div class="date">
			<p>Du 15 déc 2015 au 19 déc 2015</p>
		</div>
		<div class="lieu">
			<p>Nantes</p>
		</div>
		<div class="prix">
			<p>400 €</p>
		</div>
		<div class="btn">
                    <form  action="reservation_details.php">
			<button type="submit">Voir ce lieu</button>
                    </form>
		</div>
		<a href="connexion.php">Connectez vous</a>
     
            </div><!--END .col -->
	 
            <div class="col box">
		<img src="/web/img/home_box.jpg" alt="" class="small_img"> 
		<div class="date">
			<p>Du 12 jan 2015 au 18 jan 2015</p>
		</div>
		<div class="lieu">
			<p>Lyon</p>
		</div>
		<div class="prix">
			<p>400 €</p>
		</div>
		<div class="btn">
                    <form  action="reservation_details.php">
			<button type="submit">Voir ce lieu</button>
                    </form>
		</div>
		<a href="connexion.php">Connectez vous</a>
     
            </div><!--END .col -->
	</div><!--END .container-box -->
    </div><!--END .container -->