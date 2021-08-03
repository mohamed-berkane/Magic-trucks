<?= get_the_title(); ?> titre
<?= get_post_type_archive_link('workshop') ?> retour
<?php the_title(); ?> 2e titre
<?= the_field('lieux'); ?> - du <?= the_field('date_begin'); ?> au <?= the_field('date_end'); ?>
<?= the_post_thumbnail_url(); ?> image
<?php the_content() ?> contenu
<?php the_field('max_participants'); ?>
<?php the_field('lieux'); ?>
<?php the_field('hour_begin'); ?> à <?php the_field('hour_end'); ?>
<?php the_field('prix'); ?>


<?php
                            // récupération de la url du site
                            $url = substr(get_site_url(), 0, -2);

                            // récupération de ID du post
                            $atelier_id = get_the_ID();
                            ?>
                            <span class="button-workshop"><a href="<?= $url . 'user/register/' . $atelier_id; ?>"></a></span>