<?php
get_header(); 
?>

<body class="home">

<!-- <div class='header-workshop'>
</div> -->
    <!-- container -->
    <!-- <div class="container">
                <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                    <div class="post">
                        <h1 class="post__title"><?php the_title(); ?></h1>
                        <div class="post__content">
                            <?php the_content(); ?>

                            <h2>Étapes du projet</h2>
                            <?php 
                                // $args = [
                                //     'post_type' => 'project-news',
                                //     'posts_per_page' => -1,
                                //     'meta_query' => [
                                //         [
                                //             'key' => 'projet_lie',
                                //             'value' => get_the_id(),
                                //             'compare' => 'LIKE'
                                //         ]
                                //     ]
                                // ];
                                // $newsLinkedQuery = new WP_Query($args);

                                // while($newsLinkedQuery->have_posts()) : $newsLinkedQuery->the_post();
                                //     ?>
                                //         <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
                                //     <?php 
                                // endwhile;
                                // wp_reset_postdata();

                            ?>
                        </div>
                    </div>
                    <?php  get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; endif; ?> -->


<div class='header-workshop'>
</div>
<!-- container -->
<div class="container">
    <div class="row">
        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title"><?= get_the_title(); ?></h1>

                <p class="go-back">
                    <a class="btn btn-success" href="<?= get_home_url(); ?>">
                        <i class="fas fa-long-arrow-alt-left"> </i>
                        Retour
                    </a>
                </p>
            </header>
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="workshop-caps panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center"><?php the_title(); ?> </h3>

                        <hr>
                        <!-- <img src="<?php  the_post_thumbnail_url(); ?>"/> -->
                        <p class="text-center text-muted"><?php the_content() ?></p>
                        <div class="workshop-wrapp ">

                    </div>
                </div>
            </div>
        </article>
    </div>
    <?php
            // Si le commentaires sont ouverts ou s'il y a au moins 1 commentaire afficher les.
        if ( comments_open() || get_comments_number() ) :
            //var_dump(comments_open());
            comments_template();
        endif;
    ?>
    <!-- /Article -->
</div> <!-- /container -->






    </div>
<?php get_footer(); ?>