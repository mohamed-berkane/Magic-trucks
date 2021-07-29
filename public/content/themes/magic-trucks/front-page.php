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


<?php
get_footer();
?>