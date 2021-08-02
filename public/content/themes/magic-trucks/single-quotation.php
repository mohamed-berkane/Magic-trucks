<?php
get_header();   
?>

<div class='header-workshop'>

</div>
<!-- container -->
<div class="container">

    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title"><?= get_the_title(); ?></h1>
            </header>
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="workshop-caps panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center"><?php the_title(); ?> </h3>
                        <h4 class="thin text-center">Demande : <?= the_field('je_veux'); ?></h4>
                        <hr>
                        <div class="workshop-wrapp ">
                            <ul>
                                <li>
                                    <strong>Budget :</strong> <?php the_field('max_participants'); ?>
                                </li>
                                <li>
                                    <strong>Budget perso :</strong> <?php the_field('budget_perso'); ?>
                                </li>
                                <li>
                                    <strong>J'ai de la place :</strong> <?php the_field('jai_de_la_place'); ?> (<?php the_field('precisez'); ?>) 
                                    <br> 
                                    <strong>Précisions :</strong> <?php the_field('precisez2'); ?>
                                </li>
                                <li>
                                    <strong>Informations communiquées</strong> :
                                    <br>
                                    <?php the_field('autres_indications'); ?>
                                </li>
                            </ul>
                        </div>

                            <?php
                                // récupération de la url du site
                                $url = substr(get_site_url(), 0, -2);

                                // récupération de ID du post
                                $atelier_id = get_the_ID();

                            ?>

                            
                                <a class="btn btn-success" href="/apotheose/magic-trucks/public/user/home">
                                    <i class="fas fa-long-arrow-alt-left"> </i>
                                    Retour
                                </a>
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