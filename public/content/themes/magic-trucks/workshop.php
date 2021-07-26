<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<link rel="shortcut icon" href="../assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="../assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.html"><img src="assets/images/magic_trucks7.png" alt=""></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="#">Accueil</a></li>
					<li><a href="content/themes/magic-trucks/partials/workshop.php">Atelier</a></li>
					<li><a href="about.html">Devis</a></li>
					<li><a href="about.html">Galerie</a></li>
					<li><a href="content/themes/magic-trucks/partials/about.php">Qui suis-je</a></li>
					<li><a href="content/themes/magic-trucks/partials/contact.php">Contactez moi</a></li>
					<li><a class="btn" href="content/themes/magic-trucks/partials/login.php">Se connecter</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

<div class='header-workshop'>

</div>
        <!-- container -->
<div class="container">

<ol class="breadcrumb">
    <li><a href="index.html">Home</a></li>
    <li class="active">User access</li>
</ol>

<div class="row">
    
    <!-- Article main content -->
    <article class="col-xs-12 maincontent">
        <header class="page-header">
            <h1 class="page-title">Liste des atelier</h1>
        </header>




		<?php $loop = new WP_Query( array( 'post_type' => 'workshop', 'posts_per_page' => '10' ) ); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			

			<article class="workshop-caps">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center"><?php the_title() ?></h3>
							<p class="text-center text-muted"><?php the_content() ?></p>
							<hr>
								<div class="workshop-img "> 
								<ul>
										<li>Lieu : Avignon</li>
										<li>Durée : 4h00</li>
										<li>Prix : 160 euros</li>
									</ul> 

									<p>image</p> 
								</div>

								<?php
									// récupération du router
									$router = $args['router'];

									//

									// génération du lien d'inscription à l'atelier
									$registerWorkshop = $router->$router->generate('user-insert', ['id' => the_ID()]);								
								?>

								<button>En savoir plus</button> <button onclick="<?php header($registerWorkshop); ?>">S'insrire</button>
						</div>
					</div>
			</article>
		<?php endwhile; wp_reset_query(); ?>







        <article>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center">Atelier Toilette Seche</h3>
                        <p class="text-center text-muted">Lorem ipsum dolor sit amet, adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p>
                        <hr>
                        <div class="workshop-img "> 
                                <ul>
                                    <li>Lieu : Marseille</li>
                                    <li>Durée : 2h00</li>
                                    <li>Prix : 80 euros</li>
                                </ul> 

                                <p>image</p>
                            </div>
                        <button>En savoir plus</button> <button>S'insrire</button>
                    </div>
                </div>
                </article>
        <article>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center">Atelier Mousticaire</h3>
                        <p class="text-center text-muted">Lorem ipsum dolor sit amet, adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p>
                        <hr>
                        <div class="workshop-img "> 
                        <ul>
                                    <li>Lieu : Lyon</li>
                                    <li>Durée : 2h00</li>
                                    <li>Prix : 50 euros</li>
                                </ul> 

                                <p>image</p> 
                            </div>
                        <button>En savoir plus</button> <button>S'insrire</button>
                    </div>
                </div>
        </article>

        </div>
        
    </article>
    <!-- /Article -->

</div>
</div>	<!-- /container -->
<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>06 74 28 54 17<br>
								<a href="mailto:#">contact@magictrucks.com</a><br>
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Mes réseaux sociaux</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Avis clients</h3>
						<div class="widget-body">
							<p><strong>Robert, le 15/01/21</strong> ***** Guillaume a donné vie à mon camion! Le meilleur en conceptions et agencements! Camion fonctionnel et spacieux car réalisé par un <strong>VRAI</strong> professionnel! Bonne continuation à Guillaume aux mains d'or ;-)</p>
							<p><strong>Mohamed, le 16/04/21</strong> ***** Super travail, professionnel à l'écoute du client, l'aménagement est très bien fait dans les normes, le patron a été de très bon conseils</p>
							<p><strong>Florent, le 26/06/21</strong> ***** J'ai aujourd'hui récupéré mon camion aménagé et j'en suis ravi. Guillaume à travaillé brillamment sur un projet original et a su s'adapter à toutes mes exigences. A savoir optimiser un espace petit en une cuisine fonctionnelle</p>
							<p><strong>Mickael, le 23/07/21</strong> ***** C'était l'interlocuteur idéal pour adapter la conception de notre camion à notre budget.<strong> Nous recommandons sans hésiter</strong></p>

						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="#">accueil</a> | 
								<a href="about.html">atelier</a> |
								<a href="sidebar-right.html">devis</a> |
								<a href="contact.html">contact</a> |
								<b><a href="signup.html">se connecter</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								&copy;2021 Magic-trucks | Designed by O'clock 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="content/themes/magic-trucks/assets/js/headroom.min.js"></script>
	<script src="content/themes/magic-trucks/assets//js/jQuery.headroom.min.js"></script>
	<script src="content/themes/magic-trucks/assets//js/template.js"></script>
</body>
</html>