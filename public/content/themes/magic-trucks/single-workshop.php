<?php
    get_header();   
    $imageURL = get_the_post_thumbnail_url();
?>

<div class='header-workshop'>

</div>
<!-- container -->
<div class="container">

    <ol class="breadcrumb">
        <li><a href="<?= get_home_url() ?>">Home</a></li>
        <li class="active">User access</li>
    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title"><?= get_the_title(); ?></h1>
                <p class="go-back">
                    <a class="btn btn-success" href="/apotheose/magic-trucks/public/workshop/">
                        <i class="fas fa-long-arrow-alt-left"> </i>
                        Retour
                    </a>
                </p>
            </header>
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="workshop-caps panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center"><?php the_title(); ?> </h3>
                        <h4 class="thin text-center"><?= the_field('lieux'); ?> - du <?= the_field('date_begin'); ?> au <?= the_field('date_end'); ?></h4>
                        <img src="<?= the_post_thumbnail_url(); ?>"/>
                        <hr>

                        <p class="text-center text-muted"><?php the_content() ?></p>
                        <div class="workshop-wrapp ">
                            <ul>
                                <li>
                                    <strong>Place disponible :</strong> <?php the_field('max_participants'); ?>
                                </li>
                                <li>
                                    <strong>Lieu :</strong> <?php the_field('lieux'); ?>
                                </li>
                                <li>
                                    <strong>horaires :</strong> de <?php the_field('hour_begin'); ?> à <?php the_field('hour_end'); ?>
                                </li>
                                <li>
                                    <strong>Prix :</strong> <?php the_field('prix'); ?>
                                </li>
                            </ul>
                        </div>

                            <?php
                                // récupération de la url du site
                                $url = substr(get_site_url(), 0, -2);

                                // récupération de ID du post
                                $atelier_id = get_the_ID();
                            ?>
                            <span class="button-workshop"><a href="<?= $url . 'user/register/' . $atelier_id; ?>"></a></span>
                        </div>
                        
                    </div>
                </div>
            </div>

        </article>


    </div>


    <!-- /Article -->


</div> <!-- /container -->

<?php
get_footer();
?>