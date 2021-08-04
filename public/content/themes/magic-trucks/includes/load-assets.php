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

    wp_enqueue_script( 'bootstrap', 'http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js' );
    wp_enqueue_script( 'headroom', get_stylesheet_directory_uri() . '/assets/js/headroom.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'headroomjQuery', get_stylesheet_directory_uri() . '/assets/js/jQuery.headroom.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'template', get_stylesheet_directory_uri() . '/assets/js/template.js', array('jquery'), '1.0.0', true );
    


}

add_action('wp_enqueue_scripts', 'load_assets');