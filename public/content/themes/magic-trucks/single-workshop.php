<?php
<<<<<<< HEAD
		get_header();
		?>

<body class="home">
	<!-- Fixed navbar
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				Button for smallest screens -->
				<!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
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
				</ul> -->
			<!-- </div> -->
            <!--/.nav-collapse
		</div>
	</div>
	 /.navbar -->
=======
get_header();
?>
>>>>>>> develop

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
            <?php while (have_posts()) : the_post(); ?>
                <article class="workshop-caps">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center"> <?php the_title() ?> </h3>
                                <p class="text-center text-muted">Lorem ipsum dolor sit amet, adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p>
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
                                // récupération de la url du site
                                $url = substr(get_site_url(), 0, -2);

                                // récupération de ID du post
                                $atelier_id = get_the_ID();
                                ?>

                                <button>En savoir plus</button> <button>S'insrire</button>
                                <a href="<?= $url . 'user/register/' . $atelier_id; ?>">S'insrire</a>
                            </div>
                        </div>

                </article>
            <?php endwhile ?>

    </div>

    </article>
    <!-- /Article -->

</div>
</div> <!-- /container -->

<?php
get_footer();
?>