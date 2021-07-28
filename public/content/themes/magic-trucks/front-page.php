<?php
get_header();
?>
<!-- Header -->
<header id="head">
	<div class="container">
		<div class="row">
			<h1>L'évasion en camion aménagé sur-mesure</h1>
		</div>
	</div>
</header>

<!-- Atelier -->
<div id="wraapper-fluid">
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
			<span class="button-front"><a href="<?= get_post_type_archive_link('workshop') ?>"></a></span>




		</section>
	</div>


	<div id="right-side">




		<img class="img-workshop" src="<?= get_theme_file_uri() ?>/assets/images/2camion.png">
	</div>

</div>
<!-- /Atelier-->

<!-- Devis -->
<div id="wraapper-fluid">
	<div id="left-side-2">
		<img class="img-quote" src="<?= get_theme_file_uri() ?>/assets/images/effet-bloom.jpg">
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
			<span class="button-front"><a href="<?= get_post_type_archive_link('quotation') ?>"></a></span>




		</section>
	</div>


</div>
<!-- /Devis-->

<!-- Social links. @TODO: replace by link/instructions in template -->
<section id="social">
	<div class="container">
		<div class="wrapper clearfix">
			<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style">
				<section id="gallery">
					<h2 class="titre-section"><span class="icone"><i class="fas fa-laptop-code"></i></span> Gallerie</h2>
					<div class="gallery__card">
						<div class="gallery__card-illu" data-text="gallery">
							<img src="http://localhost/apotheose/magic-trucks/public/content/themes/magic-trucks/assets/images/camion7.jpg" alt="">
						</div>
						<div class="gallery__card-content">
							<div>
								<h3>Effet atypique garanti!</h3>
								<p>Je vous propose la pose de bardage bois extérieur, donnez une touche chaleureuse à votre camion!</p>
								<a href="#">Demandez moi un devis</a>
							</div>
						</div>
					</div>
					<div class="gallery__card">
						<div class="gallery__card-illu" data-text="gallery">
							<img src="http://localhost/apotheose/magic-trucks/public/content/themes/magic-trucks/assets/images/lit.jpg" alt="">
						</div>
						<div class="gallery__card-content">
							<div>
								<h3>Coin détente avec lit superposé</h3>
								<p>Chez Magic-Trucks, tout est possible, nous réalisons vos souhaits!</p>
								<a href="#">Demandez moi un devis</a>
							</div>
						</div>
					</div>
					<div class="gallery__card">
						<div class="gallery__card-illu" data-text="gallery">
							<img src="http://localhost/apotheose/magic-trucks/public/content/themes/magic-trucks/assets/images/bois-beau.jpg" alt="">
						</div>
						<div class="gallery__card-content">
							<div>
								<h3>Effet chaleureux garanti</h3>
								<p>Rien de tels que le bois pour apporté un coté naturel à votre intérieur</p>
								<a href="#">Demandez moi un devis</a>
							</div>
						</div>
					</div>
					<div class="gallery__card">
						<div class="gallery__card-illu" data-text="gallery">
							<img src="http://localhost/apotheose/magic-trucks/public/content/themes/magic-trucks/assets/images/toit_2.jpg" alt="">
						</div>
						<div class="gallery__card-content">
							<div>
								<h3>Besoin de tranquillité?</h3>
								<p>En option, je peux vous installer une échelle pour accèder au toit, rien de tels pour profiter d'un moment au calme</p>
								<a href="#">Demandez moi un devis</a>
							</div>
						</div>
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