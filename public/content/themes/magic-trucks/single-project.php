<?php
get_header(); 
?>

<body class="home">


<div class='header-workshop'>
</div>
<!-- container -->
<div class="container">



    <div class="row">
        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="workshop-title"><?= get_the_title(); ?></h1>

                <p class="go-back">
                    <a class="btn btn-success" href="/apotheose/magic-trucks/public/project/">
                        <i class="fas fa-long-arrow-alt-left"> </i>
                        Retour
                    </a>
                </p>
            </header>
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="workshop-caps panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center"><?php the_title(); ?> </h3>
                        <img src="<?= get_the_post_thumbnail_url(); ?>"/>
                        <p class="text-center text-muted"><?php the_content() ?></p>
                        <div class="workshop-wrapp ">

                    </div>
                </div>
            </div>
        </article>
    </div>


    <div class="row">
            
        <aside class="col-xs-12 maincontent">



            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="workshop-caps panel panel-default">
                    <div class="panel-body">
                    <?php
                            // Si le commentaires sont ouverts ou s'il y a au moins 1 commentaire afficher les.
                        if ( comments_open() || get_comments_number() ) :
                            //var_dump(comments_open());
                            comments_template();
                        endif;
                    ?>
                </div>
            </div>

        </aside>

    </div>

    <!-- /Article -->
</div> <!-- /container -->

<?php get_footer(); ?>