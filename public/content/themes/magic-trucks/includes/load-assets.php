<?php

// ===========================================================================================
// Chargement des assets
// ===========================================================================================

function load_assets()
{
    // nous disons à wp de charger le fichier assets/css/styles.css
    // get_theme_file_uri permet de récupérer l'url racine de notre thème
    // WARNING faire très attention à ne pas mettre plusieurs fois le même nom à différents assets
    wp_enqueue_style(
        'main',  // "nom du fichier css
        get_theme_file_uri('assets/css/main.css') // chemin fichier pour dire à quel endroit est stocké le fichier
    );

}

add_action('wp_enqueue_scripts', 'load_assets');