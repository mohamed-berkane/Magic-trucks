<?php
    get_header();
?>

<?php

    // WARNING WP theme ne pas oublier de charger les données du post
    the_post();

    // affichage de l'image de mise en avant de l'article
    $imageURL = get_the_post_thumbnail_url();
?>


<div class="container">
    <div class="row">
        <div class="col-offset-2 col-md-8 col-offset-2">
            <div class="panel panel-default" style="margin-top: 100px;">
                <div class="panel-body">
                    <article class="section narrow-content">
                        
                        <h1 class="section__title">
                            <?=get_the_title();?>
                        </h1>

                        <img src="<?= $imageURL; ?>"/>

                        <p class="section__content">
                            <?= get_the_content(); ?>
                        </p>


                        <!-- aside contenu "additionnel" au contenu principal //-->
                        <aside>
                            <span>
                                <?php
                                    // IMPORTANT WP THEME template tags https://codex.wordpress.org/Template_Tags
                                    the_author();
                                ?>
                            <span>
                            <time>
                                <?php
                                    the_date();
                                ?>

                            </time>
                        </aside>

                    </article>

                    <div class="section narrow-content">
                        <?php

                            $previousPost = get_previous_post();
                            $nextPost = get_next_post();
                            
                            if ($previousPost) {
                                $previousPostUrl = get_post_permalink($previousPost);
                        ?>
                            <br><br>
                        
                        <div class="article-buttons">    
                                <span>
                                    <a class="btn btn-success" href="<?= $previousPostUrl ?>">Précédent</a>
                                </span>
                            <?php
                                }

                                if ($nextPost) {
                                    $nextPostUrl = get_post_permalink($nextPost);
                            ?>
                                <span>
                                    <a class="btn btn-default"href="<?= $nextPostUrl ?>">Suivant</a>
                                </span>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();
?>