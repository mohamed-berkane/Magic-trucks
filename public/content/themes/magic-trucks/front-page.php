<?php
get_header();
?>
<!-- Header -->
<header id="head">
	<div class="container">
		<div class="row">
			<h1 class="main-title">Bienvenue sur Magic-Trucks</h1>
		</div>
	</div>
</header>

<!-- Resume -->

<div id="container-resume">
	<h2 class="title-resume">Magic-Trucks, qu'est-ce que c'est ?</h2>
	<div class="capsule-resume">
		<div class="resume">
			<h3>Accompagné de mon fidèle camion, j'arpente les routes de France en partant à la rencontre de personnes qui ont fait le choix d'une vie alternative. Les Magic-Trucks sont des camions aménagés. Ils sont imaginés, créés 
				
</h3>
		</div>
		<div class="resume-wrapper">
			<div class="small-resume">Sur ma route, je met en place des <strong>Ateliers</strong> ici et là, pour vous permettre de decouvrir la vie en camion aménagé, mais aussi pour travailler sur vos camion, leur installer des panneaux solaires, fabriquer des objets de décoration, mettre en place un systeme d'eau sous pression, et bien d'autres !</div>

			<div class="small-resume">Si l'envie de posséder votre propre camion aux couleurs des Magic-Trucks vous prennait, il vous est aussi possible de remplir un formulaire de <strong>Devis</strong>. Si vous possédez déjà votre van, camping-car ou camion aménagé, et que vous voulez y faire des travaux, rajouter des fenêtres, installer un poil à bois, ou toutes autres possibiltés, c'est possible, avec le même formulaire.</div>

			<div class="small-resume">Vous pouvez également faire un petit tour du coté de <strong>Mes créations</strong> et ainsi voir les différents camion que j'ai fabriqué. J'essaye d'en faire un ou deux par an, malgré une demande très forte. Chaque camion, est différent, unique, à l'image du client. A chaque nouveau camion, je prends du temps pour connaitre son futur propriétaire</div>
		</div>

	</div>


</div>

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
			<p>Vous rêvez vous aussi de vous lancer dans l'aventure ? Je construit votre camion personnalisé selon vos envies, vos gouts et à vos possibiltés.
				</br>
				</br>
				Si vous avez déjà un camion, et que vous souhaitez faire des travaux dessus (hors-mécanique), par exemple installer des fenetres, des panneaux solaires, réamenager l'interieur, réparer l'étanchéité...etc, vous pouvez aussi faire une demande via le formulaire de devis.
				</br>


			</p>
			<span class="button-front"><a href="<?= get_post_type_archive_link('quotation') ?>"></a></span>

		</section>
	</div>


</div>
<!-- /Devis-->

<!-- container -->
<div class="container ">
	<!-- Atelier 1-->
	<h2 class="text-center top-space workshop-title">Prochains ateliers</h2>
	<br>
	<div class="panel panel-default workshop-caps" style="padding: 35px 10px;">
		<div class="narrow-content text-center ">

			<p><strong>Venez découvrir les ateliers ambulant de Magic-Trucks.En groupe, nous apprendrons à fabriquer toutes sortes d'équipements ou de décorations utiles pour la vie en camion.</strong></p><br>
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

				<p class="text-center">
					<span class="button-front">
						<a href="/apotheose/magic-trucks/public/workshop/"></a>
					</span>
				</p>

			</div>
		</div>
		<!-- /row -->
	</div>

</div>




<?php
get_footer();
?>