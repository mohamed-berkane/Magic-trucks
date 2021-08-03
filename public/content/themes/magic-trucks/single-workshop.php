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
        <li><a href="<?= get_home_url() ?>">Home</a></li>
        <li class="active">User access</li>
    </ol>
    <span>
        <a class="btn btn-success" href="<?= get_post_type_archive_link('workshop') ?>">
            <i class="fas fa-long-arrow-alt-left"> </i>
            Retour
        </a>
    </span>

</br>
</br>
</br>
</br>

    <div class="row workshop-caps panel">
        <div class="header-single">
            <h3><?= get_the_title(); ?></h3>
            <span><?= the_field('lieux'); ?></span>
            <span>Du <?= the_field('date_begin'); ?> au <?= the_field('date_end'); ?></span>
            <hr class="hr-single">
        </div>
        <!-- Article main content -->
        <div class="wrapper-single">
            <div class="single-left">
                <h2>Information sur l'atelier :</h2>
                <ul>
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
        <div class="header-single">
            <hr class="hr-single">
            <span><?php the_content() ?></span>
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



</div>


<!-- /Article -->


</div> <!-- /container -->

<?php
get_footer();
?>