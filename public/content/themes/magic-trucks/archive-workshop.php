<?php

get_header();
//$currentImage = ;
?>



<div class='header-workshop'>

</div>
<!-- container -->
<div class="container">

    <div class="row">
        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="workshop-title">Liste des atelier</h1>
                <aside class="description">Ici, nous vous proposons des ateliers partout en France à des dates données !
                    </br>
                    Avec ces ateliers, nous vous aidons à fabriquer des éléments pour votre camion, et même à l'amenager de façon nouvelle et original.
                </aside>
            </header>
            <?php while (have_posts()) : the_post(); ?>
                <article class="">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="workshop-caps workshop-wrapp panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center"><?php the_title(); ?> </h3>
                                <p class="text-center text-muted">Lieu : <?= the_field('lieux'); ?> - du <?= the_field('date_begin'); ?> au <?= the_field('date_end'); ?></p>
                                <hr>
                                <div class="workshop-wrapp ">
                                    <div class="workshop-right"><img  src="<?=get_the_post_thumbnail_url(); ?>" /></div>
                                    <!-- <div class="workshop-left"> -->
                                    <div class="workshop-left">
                                        <ul>
                                            <li>
                                                <strong>Place disponible :</strong> <?php the_field('max_participants'); ?>
                                            </li>
                                            <li>
                                                <strong>Lieu :</strong> <?php the_field('lieux'); ?>
                                            </li>
                                            <li>
                                                <strong>Date :</strong> du <?= the_field('date_begin'); ?> au <?= the_field('date_end'); ?>
                                            </li>
                                            <li>
                                                <strong>Horaires :</strong> de <?php the_field('hour_begin'); ?> à <?php the_field('hour_end'); ?>
                                            </li>
                                            <li>
                                                <strong>Prix :</strong> <?php the_field('prix'); ?> euros par camion.
                                            </li>
                                        </ul>
                                        <?php
                                        // récupération de ID du post
                                        $atelier_id = get_the_ID();
        
        
                                        ?>
                                        <span class="button-front"><a href="<?= get_permalink($atelier_id); ?>"></a></span>
                                    </div>
                                    <!-- </div> -->
                                    <!-- <div class="workshop-right">
                                        </div> -->
                            </div>
                        </div>
                </article>
            <?php endwhile ?>
            <?php wp_reset_postdata(); ?>
    </div>
    </article>
    <!-- /Article -->
</div>
</div>
<!-- /container -->
<?php
get_footer();
?>