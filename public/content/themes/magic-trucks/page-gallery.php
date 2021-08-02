<?php

/**
 * Template Name: gallery
 * 
 */
?>

<?php
get_header();
?>
<div class='header-workshop'>
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
                    <h1 class="workshop-title">Galerie photo</h1>
                    <aside class="description">Un aperçu du monde des camions aménagé et de mes créations.
                    </aside>
                </header>
                <!-- Gallery -->
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img src="<?= get_theme_file_uri() ?>/assets/images/camion7.jpg" alt="" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                        <img src="<?= get_theme_file_uri() ?>/assets/images/lit.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>

                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img src="<?= get_theme_file_uri() ?>/assets/images/bois-beau.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                        <img src="<?= get_theme_file_uri() ?>/assets/images/toit_2.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>

                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img src="<?= get_theme_file_uri() ?>/assets/images/douche.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                        <img src="<?= get_theme_file_uri() ?>/assets/images/toit_2.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img src="<?= get_theme_file_uri() ?>/assets/images/camion7.jpg" alt="" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                        <img src="<?= get_theme_file_uri() ?>/assets/images/lit.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img src="<?= get_theme_file_uri() ?>/assets/images/douche.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                        <img src="<?= get_theme_file_uri() ?>/assets/images/toit_2.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                    </div>

                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                            <img src="<?= get_theme_file_uri() ?>/assets/images/bois-beau.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                            <img src="<?= get_theme_file_uri() ?>/assets/images/toit_2.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                        </div>



                        

                </div>
            </article>
        </div>
    </div>

    <!-- Gallery -->





    <?php
    get_footer();
    ?>