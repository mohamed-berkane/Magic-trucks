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

	<!-- Intro -->
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">Changez de vie!</h2><br><br>
		<p class="text-muted">
			<ul>Être en complète autonomie pourquoi tout quitter et vivre en camion aménagé?<br><br>
				<li>Casser la routine</li><br>
				<li>Se rapprocher de la nature</li><br>
				<li>Vivre plus simplement</li><br>
				<li>Profiter des moments présents</li><br>
		        <li>S’ouvrir aux autres et au monde</li><br>
			    <li>S’enrichir personnellement</li><br>
				<li>Et plein d’autres encore à découvrir…</li><br>
			</ul>
		</p>

	</div>
	<!-- /Intro-->
		
	<!-- Highlights - jumbotron -->
	<div class="jumbotron top-space">
		<div class="containerintro">
			
			<h3 class="text-center thin"></h3>
			
			<div class="row">
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-cogs fa-5"></i>Conception</h4></div>
					<div class="h-body text-center">
						<p>Je modifie votre camion dans mon local situé à Rouen</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-truck fa-5"></i>Aménagements de A à Z</h4></div>
					<div class="h-body text-center">
						<p>Je vous aide à concevoir votre futur camion de A à Z</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-heart fa-5"></i>Aménagements partiels</h4></div>
					<div class="h-body text-center">
						<p>Je me déplace pour vous aider ou vous former</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-smile-o fa-5"></i>Ateliers thématiques</h4></div>
					<div class="h-body text-center">
						<p>Je vous aide à aménager ou à assurer la maintenance de votre camion</p>
					</div>
				</div>
			</div> <!-- /row  -->
			<i class="fas fa-truck-moving"></i>
		</div>
	</div>
	<!-- /Highlights -->
	

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



	