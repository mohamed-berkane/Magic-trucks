<?php
get_header();
?>
        
<!-- Header -->
<header id="head" >
	<div class="container">
		<div class="row">
			<h1>L'évasion en camion aménagé sur-mesure</h1>
		</div>
	</div>
</header>

	<!-- Atelier -->
	<div id="wrapper-fluid">
		<div id="left-side">	
			<h2 class="thin">Les ateliers</h2><br><br>
				<section class="workshop-home">
					<p>Venez découvrir les ateliers ambulant de Magic-Trucks.

					</br>
					   En groupe, nous apprendrons à fabriquer toutes sortes d'équipements ou de décorations utile pour la vie en camion.
					</br>
					</br>
					   Vérifiez les dates et lieux des prochains rendez-vous, peut être que Magic-Trucks se présente à côté de chez toi !
					</p>
					<button type="button" class="btn btn-outline-success">En savoir plus</button>

					

					
				</section>
		</div>

		<div id="right-side">
			
			<img class="img-workshop" src="<?= get_theme_file_uri()?>/assets/images/2camion.png">
		</div>

	</div>
	<!-- /Atelier-->

	<!-- Devis -->
	<div id="wrapper-fluid">
		<div id="left-side-2">
		<img class="img-quote" src="<?= get_theme_file_uri()?>/assets/images/effet-bloom.jpg">
		</div>
		<div id="right-side-2">	
			<h2 class="thin">Les devis</h2><br><br>
				<section class="quote-home">
					<p>Vous rêvez vous aussi de vous lancer dans l'aventure ? Je construit votre camion personnalisé selon vos envies et à votre image. 

					</br>
					   En groupe, nous apprendrons à fabriquer toutes sortes d'équipements ou de décorations utile pour la vie en camion.
					</br>
					</br>
					   Vérifiez les dates et lieux des prochains rendez-vous, peut être que Magic-Trucks se présente à côté de chez toi !
					</p>
					<button type="button" class="btn btn-outline-success">Success</button>

					

					
				</section>
		</div>


	</div>
	<!-- /Devis-->


	<div id="carousel-magictrucks" class="carousel slide" data-ride="carousel" data-interval="3000"> <!-- data = traitement JS -->
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-magictrucks" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-magictrucks" data-slide-to="1"></li>
    <li data-target="#carousel-magictrucks" data-slide-to="2"></li>
    <li data-target="#carousel-magictrucks" data-slide-to="3"></li>
    <li data-target="#carousel-magictrucks" data-slide-to="4"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="assets/images/magictrucks10.png" alt="Installation de cuisine">
      <div class="carousel-caption">
        Installation de cuisine
      </div>
    </div>
    <div class="item">
      <img src="/themes/magic-trucks/assets/images/cuisine2.jpg" alt="lit table">
      <div class="carousel-caption">
        Lit table
      </div>
    </div>
    <div class="item">
      <img src="assets/images/cuisine2.jpg" alt="Installation de poeles à granulés">
      <div class="carousel-caption">
        Installation de poeles à granulés
      </div>
    </div>
    <div class="item">
      <img src="/assets/images/cuisine2.jpg" alt="Extérieur en bardage bois">
      <div class="carousel-caption">
	   Extérieur en bardage bois
      </div>
    </div>
    <div class="item">
      <img src="assets/images/cuisine2.jpg" alt="Installation de panneaux solaire">
      <div class="carousel-caption">
	  Installation de panneaux solaire
      </div>
	</div>
  </div>
</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-magictrucks" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Précédent</span>
		</a>
		<a class="right carousel-control" href="#carousel-magictrucks" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Suivant</span>
		</a>
		</div>
	
	<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
    <!-- /social links -->
    
<?php
get_footer();
?>



	