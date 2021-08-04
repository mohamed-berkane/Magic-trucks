<?php
get_header();
$imageURL = get_the_post_thumbnail_url();
?>

<div class='header-workshop'>

</div>
<!-- container -->
<div class="container">

    </br>
    </br>
    <ol class="breadcrumb">
        <li><a href="<?= get_home_url() ?>">Accueil</a></li>
        <li class="active">User access</li>
    </ol>

    </br>
    </br>
    </br>
    </br>

    <div class="row workshop-caps panel">
        <div class="header-single">
            <span class="back">
                <a class="btn btn-success" href="<?= get_post_type_archive_link('workshop') ?>">
                    <i class="fas fa-long-arrow-alt-left"> </i>
                    Retour
                </a>
            </span>
            <h3 class ="workshop-title"><?= get_the_title(); ?></h3>
            <span><?= the_field('lieux'); ?></span>
            <span>Du <?= the_field('date_begin'); ?> au <?= the_field('date_end'); ?></span>
            <hr class="hr-single">
        </div>


    <div class="row">


        <!-- Article main content -->
        <article class="col-xs-12 maincontent">

            <div class="workshop-wrapp ">

                <div class="wrapper-single">
                    <div class="single-left">
                        <h2 class="single-title">Information sur l'atelier :</h2>
                        <ul class="single-ul">
                            <li>Lieu : <?= the_field('lieux'); ?></li>
                            <li> Du <?= the_field('date_begin'); ?> au <?= the_field('date_end'); ?></li>
                            <li>Nombre maximum de camions : <?php the_field('max_participants'); ?></li>
                            <li>Prix par camion : <?php the_field('prix'); ?> euros.</li>
                        </ul>
                    </div>


                    <div class="single-right">
                        <img src="<?= the_post_thumbnail_url(); ?>" alt="">
                    </div>
                </div>
                </div>
                <div class="footer-single">
                    <hr class="hr-single">
                    <span class="single-content"><?php the_content() ?></span>
                    <hr class="hr-single">
                    <?php
                    // récupération de la url du site
                    $url = substr(get_site_url(), 0, -2);

                    // récupération de ID du post
                    $atelier_id = get_the_ID();
                    ?>
                    <span class="button-workshop"><a href="<?= $url . 'user/register/' . $atelier_id; ?>"></a></span>
                </div>

            </div>
        </article>


    </div>


    <!-- /Article -->


</div> <!-- /container -->

<?php
get_footer();
?>