<?php

/**
 * Template Name: les-devlo
 * 
 */
?>

<?php
get_header();
?>
<br>
    <br>
    <br>
    <div class='header-workshop'>
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="<?= get_home_url() ?>">Accueil</a></li>
            </ol>
        </div>
		<!-- container -->
		<div class="container">



			<div class="row-contact">

				<!-- Article main content -->
				<article class="col-sm-8 maincontent">
					<header class="page-header">
						<h1 class="page-title">les créateurs du site</h1>
					</header>
					<div class="contenu-contact">
						<div class="details-contact">
							<div class="camion-dev">
								<img src="<?= get_theme_file_uri('assets/images/flo.jpg') ?>" alt="">
							</div>

							<h3> Florent Verney</h3>
							<p> Lead dev back </br>et Scrum Master </p>
						</div>
						<div class="details-contact">
							<div class="camion-dev">
								<img src="<?= get_theme_file_uri('assets/images/atouss.jpg') ?>" alt="">
							</div>
							<h3>Florent Zoro</h3>
							<p>Product Owner</p>
						</div>
						<div class="details-contact">
							<div class="camion-dev">
								<img src="<?= get_theme_file_uri('assets/images/mohamed.jpg') ?>" alt="">
							</div>

							<h3>Berkane Mohamed</h3>
							<p>Lead dev front</p>
						</div>
						<div class="details-contact">
							<div class="camion-dev">
								<img src="<?= get_theme_file_uri('assets/images/robert.jpg') ?>" alt="">
							</div>
							<h3>Robert Dambry</h3>
							<p>Lead dev back</p>
						</div>
						<div class="details-contact">
							<div class="camion-dev">
								<img src="<?= get_theme_file_uri('assets/images/micka.jpg') ?>" alt="">
							</div>
							<h3>Georget Mickael</h3>
							<p>Lead dev front <br> Scrum Master</p>
						</div>

					</div>
				</article>
				<!-- /Article -->



			</div>
		</div> <!-- /container -->









		<?php
		get_footer();
		?>