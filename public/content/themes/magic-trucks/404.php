<?php get_header() ?>


<?php
    // STEP WP-CUSTOMIZER-06 utilisation d'une variable configurée via customizer
    // DOC WP-CUSTOMIZER récupération valeur : https://developer.wordpress.org/reference/functions/get_theme_mod/
    $selectedHeaderImage = get_theme_mod('header-background-image');
?>

<section class="section welcome" style="background-image: url(<?= $selectedHeaderImage;?>)">
    <h1 class="section__title">Page introuvable</h1>
    <p class="section__content">
        La page que vous avez demandé ne semble pas exister...
    </p>

    
    <div class="welcome__cta">
        <a href=".">Revenir à l'accueil</a>
        
    </div>
</section>

<?php get_footer() ?>