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


<!-- blog -->

<div class="container blog">

	<h2 class="text-center top-space">L'actualité de Magic-Trucks</h2>
	<br><br>

	<div class="row">
		<?php
		// Récupération des articles "posts"
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				echo get_template_part('partials/thumbnails/article-thumbnails', 'article-thumbnail');
			}
		}
		?>
	</div> <!-- /row -->
	<div class="row text-center">
		<span class="button-front">
			<a href="#"></a>
		</span>
	</div>
</div>
<br><br>

<!-- // Blog -->


<!-- container -->
<div class="container">
	<!-- Atelier 1-->
	<h2 class="text-center top-space">Prochains ateliers</h2>
	<br>
	<div class="panel panel-default" style="padding: 35px 10px;">
		<div class="narrow-content text-center">

			<p>Venez découvrir les ateliers ambulant de Magic-Trucks.En groupe, nous apprendrons à fabriquer toutes sortes d'équipements ou de décorations utiles pour la vie en camion.</p><br>
			<p>Vérifiez les dates et lieux des prochains rendez-vous, peut être que Magic-Trucks se présentera à côté de chez vous !</p>

		</div>
		<div class="panel-body">
			<div class="row workshop">

				<?php

				$args = array(
					'post_type' => 'workshop',
					'post_status' => 'publish',
					'posts_per_page' => 4,
					'orderby' => 'title',
					'order' => 'ASC',
				);

				$query = new WP_Query($args);

				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						get_template_part('partials/thumbnails/workshop-thumbnails');
					}
				} else {
					echo "Il n'y a pas d'atelier à venir pour l'instant";
				}

				wp_reset_postdata();

				?>

			</div>
		</div>
		<!-- /row -->
	</div>
	<p class="text-center">
		<span class="button-front">
			<a href="/apotheose/magic-trucks/public/workshop/"></a>
		</span>
	</p>
</div>




<?php
get_footer();
?>