<?php
get_header();   
?>

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
                <?php
                    
                ?>
            </header>
            <?php while (have_posts()) : the_post(); ?>

                <div class="col-md-10 col-md-offset-0 col-sm-8 col-sm-offset-2">
                    <div class="workshop-caps panel panel-default ">
                        <div class="panel-body">
                            <h3 class="thin text-center"><?php the_title(); ?> </h3>
                            <p class="text-center text-muted"><?php the_content() ?></p>
                            <hr>
                            <div class="workshop-wrapp ">
                                <div class="workshop-left">
                                    <ul>
                                        <li>Lieu : Avignon</li>
                                        <li>Durée : 4h00</li>
                                        <li>Prix : 160 euros</li>
                                    </ul>
                                </div>
                                <div class="workshop-right">
                                </div>
                            </div>

                                <?php
                                    // récupération de la url du site
                                    $url = substr(get_site_url(), 0, -2);

                                    // récupération de ID du post
                                    $atelier_id = get_the_ID();

                                ?>

                                
                                <a class="btn btn-primary" href="<?= $url . 'user/register/' . $atelier_id; ?>">S'insrire</a>
                            </div>
                            
                        </div>
                    </div>

        </article>
    <?php endwhile ?>

    </div>


    <!-- /Article -->

</div>
</div> <!-- /container -->

<?php
get_footer();
?>