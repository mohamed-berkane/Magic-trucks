<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Sergey Pozhilov (GetTemplate.com)">
    <link rel="shortcut icon" href="content/themes/magic-trucks/assets/images/gt_favicon.png" />
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" />
    <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/font-awesome.min.css">-->
    <script src="https://kit.fontawesome.com/9b1a6d9179.js" crossorigin="anonymous"></script>
    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body class="home">



    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top headroom">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-header">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= substr(get_site_url(), 0, -2) ?>">
                    <img class="logo-accueil"src="<?= get_theme_file_uri('assets/images/magictrucks10.png') ?>" alt="">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="menu-header">
                    
                <?php
                
                    $defaults = array(
                    'theme_location'  => '',
                    'menu'            => 'menu-header',
                    'container'       => 'div',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'nav navbar-nav pull-right',
                    'menu_id'         => '',
                    'echo'            => false,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                );

                
                $menu = wp_nav_menu($defaults); 
                echo $menu;
                
                
                ?>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /. container -->
    </div>
    <!-- /.navbar -->
