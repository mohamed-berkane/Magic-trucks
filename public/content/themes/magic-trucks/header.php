<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<link rel="shortcut icon" href="content/themes/magic-trucks/assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="<?= get_theme_file_uri()?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= get_theme_file_uri()?>/assets/css/font-awesome.min.css">

	

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="<?= get_theme_file_uri()?>/assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="<?= get_theme_file_uri()?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= get_theme_file_uri()?>/assets/css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

	

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <?php wp_head();?>
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
					<li><a href="<?= get_theme_file_uri()?>/workshop">Atelier</a></li>
					<li><a href="<?= get_theme_file_uri()?>">Devis</a></li>
					<li><a href="<?= get_theme_file_uri()?>">Galerie</a></li>
					<li><a href="<?= get_theme_file_uri()?>">Qui suis-je</a></li>
					<li><a href="<?= get_theme_file_uri()?>">Contactez moi</a></li>
					<li><a class="btn" href="<?= get_theme_file_uri()?>">Se connecter</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	